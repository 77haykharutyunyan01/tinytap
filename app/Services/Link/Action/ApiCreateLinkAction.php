<?php

namespace App\Services\Link\Action;

use Throwable;
use App\Models\Link\Link;
use App\Models\User\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Services\Domain\CreateDomainAction;
use App\Services\Link\Dto\ApiCreateLinkDto;
use App\Http\Resources\Company\LinkResource;
use App\Repositories\Read\User\UserReadRepositoryInterface;
use App\Repositories\Write\Link\LinkWriteRepositoryInterface;
use App\Repositories\Read\Domain\DomainReadRepositoryInterface;
use App\Repositories\Write\Domain\DomainWriteRepositoryInterface;

class ApiCreateLinkAction
{
    private User $user;
    private Link $link;
    private ?string $imagePath = null;
    private string $shortLink;

    public function __construct(
        protected CreateDomainAction $createDomainAction,
        protected UserReadRepositoryInterface $userReadRepository,
        protected LinkWriteRepositoryInterface $linkWriteRepository,
        protected DomainReadRepositoryInterface $domainReadRepository,
        protected DomainWriteRepositoryInterface $domainWriteRepository,
    ) {}

    public function run(ApiCreateLinkDto $dto): array
    {
        try {
            $this->user = $this->userReadRepository->getByApiKey($dto->apiKey);

            if ($dto->domain) {
                if (!$this->checkDomainExistence($dto)) {
                    $this->createDomainAndSetDefault($dto);
                }
            }

            if ($dto->imageUrl) {
                $this->downloadAndSaveImage($dto->imageUrl);
            }

            $this->generateShortLink();

            $this->createLink($dto);
        } catch (Throwable $exception) {
            return [
                'status' => false,
                'data' => $exception->getMessage()
            ];
        }

        return [
            'status' => true,
            'data' => new LinkResource($this->link)
        ];
    }

    private function checkDomainExistence(ApiCreateLinkDto $dto): bool
    {
        $existingDomain = $this->domainReadRepository->checkDomainExistence($dto->domain);

        if ($existingDomain) {
            $dto->linkDto->domainId = $existingDomain->id;
            return true;
        }

        return false;
    }

    private function createDomainAndSetDefault(ApiCreateLinkDto $dto): void
    {
        foreach($this->user->companies->first()->domains as $item) {
            if ($item->default) {
                $item->default = false;
                $this->domainWriteRepository->save($item);
            }
        }

        $createdDomain = $this->createDomainAction->run($this->user->id, $dto->domain, true);
        $dto->linkDto->domainId = $createdDomain->id;
    }

    private function downloadAndSaveImage(string $imageUrl): void
    {
        $this->imagePath = Link::LINK_IMAGES . '/' . $this->user->id . '/' . Str::random(40) . '.jpg';
        $imageContent = file_get_contents($imageUrl);
        Storage::put($this->imagePath, $imageContent);
    }

    private function generateShortLink(): void
    {
        $this->shortLink = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6);
    }

    private function createLink(ApiCreateLinkDto $dto): void
    {
        $company = $this->user->companies->first();
        $this->link = Link::staticCreate(
            $dto->linkDto,
            $this->imagePath,
            $this->shortLink,
            $company->id
        );

        $this->linkWriteRepository->save($this->link);
    }
}
