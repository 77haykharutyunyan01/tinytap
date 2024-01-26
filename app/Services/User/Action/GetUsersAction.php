<?php

namespace App\Services\User\Action;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Read\User\UserReadRepositoryInterface;
use App\Repositories\Read\Company\CompanyReadRepositoryInterface;

class GetUsersAction
{
    public function __construct(
        protected CompanyReadRepositoryInterface $companyReadRepository,
        protected UserReadRepositoryInterface $userReadRepository
    ) {}

    public function run(string $userId): Collection
    {
        $user = $this->userReadRepository->getById($userId);

        $company = $this->companyReadRepository->getByOwnerId($user->companies->first()->owner_id);

        return $company->users;
    }
}
