<?php

namespace App\Services\Link\Action;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Read\Link\LinkReadRepositoryInterface;
use App\Repositories\Read\User\UserReadRepositoryInterface;

class GetLinkAction
{
    public function __construct(
        protected UserReadRepositoryInterface $userReadRepository,
        protected LinkReadRepositoryInterface $linkReadRepository
    ) {}

    public function run(string $userId): Collection
    {
        $user = $this->userReadRepository->getById($userId);

        return $this->linkReadRepository->getByCompanyId($user->companies->first()->id);
    }
}
