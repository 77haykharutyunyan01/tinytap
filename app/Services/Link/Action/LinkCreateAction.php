<?php

namespace App\Services\Link\Action;

use App\Models\Link\Link;
use App\Services\Link\Dto\CreateLinkDto;
use App\Repositories\Read\User\UserReadRepositoryInterface;
use App\Repositories\Write\Link\LinkWriteRepositoryInterface;

class LinkCreateAction
{
    public function __construct(
        protected LinkWriteRepositoryInterface $linkWriteRepository,
        protected UserReadRepositoryInterface $userReadRepository
    ) {}

    public function run(CreateLinkDto $dto): Link
    {
        $user = $this->userReadRepository->getById($dto->userId);
        $imagePath = $dto->image?->store(Link::LINK_IMAGES . '/' . $dto->userId);
        $shortLink = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6);
        $company = $user->companies->first();

        $link = Link::staticCreate($dto, $imagePath, $shortLink, $company->id);

        $this->linkWriteRepository->save($link);

        return $link;
    }
}
