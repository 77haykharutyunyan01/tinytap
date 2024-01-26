<?php

namespace App\Services\User\Action;


use App\Repositories\Write\User\ModelHasRolesWriteRepositoryInterface;
use App\Repositories\Write\User\UserWriteRepositoryInterface;
use App\Repositories\Write\UserCompanies\UserCompaniesWriteRepositoryInterface;
use App\Repositories\Read\User\UserReadRepository;
class DeleteUserAction
{
    public function __construct(
        protected UserWriteRepositoryInterface $userWriteRepository,
        protected UserCompaniesWriteRepositoryInterface $userCompaniesWriteRepository,
        protected ModelHasRolesWriteRepositoryInterface $modelHasRolesWriteRepository,
        protected UserReadRepository $userReadRepository
    ) {}

    public function run(string $userId): bool
    {
     $user = $this->userReadRepository->getById($userId);

        if ($userId !== $user->companies->first()->owner_id) {
            $this->modelHasRolesWriteRepository->delete($userId);
            $this->userCompaniesWriteRepository->deleteByUserId($userId);
            return $this->userWriteRepository->deleteByUserId($userId);
        }
       return false;
    }
}
