<?php

namespace App\Services\Link\Action;

use App\Models\Link\Link;
use App\Repositories\Read\Link\LinkReadRepositoryInterface;
use App\Repositories\Write\Link\LinkWriteRepositoryInterface;
use App\Services\Link\Dto\UpdateLinkDto;
use Illuminate\Support\Facades\Storage;

class UpdateLinkAction
{
    public function __construct(
        protected LinkReadRepositoryInterface $linkReadRepository,
        protected LinkWriteRepositoryInterface $linkWriteRepository
    ) {}

    public function run(UpdateLinkDto $dto): void
    {
        $link = $this->linkReadRepository->getById($dto->id);
        $shortLink = null;
        $imagePath = null;

        if (!is_null($dto->linkDto->image)) {
            Storage::delete($link->image_path);

            $imagePath = $dto->linkDto->image?->store(Link::LINK_IMAGES . '/' . $dto->linkDto->userId);
        }

        if (!($link->original_link === $dto->linkDto->originalLink)) {
            $shortLink = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6);
        }

        $link = $link->staticUpdate($dto, $shortLink, $imagePath);

        $this->linkWriteRepository->save($link);
    }
}
