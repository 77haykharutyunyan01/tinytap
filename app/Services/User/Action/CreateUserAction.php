<?php

namespace App\Services\User\Action;

use App\Models\User\User;
use App\Repositories\Read\User\UserReadRepositoryInterface;
use App\Repositories\Write\User\UserWriteRepositoryInterface;
use App\Repositories\Write\UserCompanies\UserCompaniesWriteRepositoryInterface;
use App\Services\User\Dto\CreateUserDto;

class CreateUserAction
{
    public function __construct(
        protected UserCompaniesWriteRepositoryInterface $userCompaniesWriteRepository,
        protected UserWriteRepositoryInterface $userWriteRepository,
        protected UserReadRepositoryInterface $userReadRepository
    ) {}

    public function run(CreateUserDto $dto): void
    {
        $user = User::staticCreate($dto);
        $owner = $this->userReadRepository->getById($dto->userId);

        $this->userWriteRepository->save($user);

        $this->userCompaniesWriteRepository->insert($user->id, $owner->companies->first()->id);
    }
}
