<?php

namespace App\Services\Company\Action;

use App\Models\Company\Company;
use App\Models\User\User;
use App\Repositories\Write\Company\CompanyWriteRepositoryInterface;
use App\Repositories\Write\User\UserWriteRepositoryInterface;
use App\Services\Company\Dto\CreateCompanyDto;
use App\Services\User\Dto\CreateUserDto;

class CreateCompanyAction
{
    public function __construct(
        protected CompanyWriteRepositoryInterface $companyWriteRepository,
        protected UserWriteRepositoryInterface $userWriteRepository
    ) {}

    public function run(CreateUserDto $userDto, CreateCompanyDto $companyDto): void
    {
        $user = User::staticCreate($userDto);
        $this->userWriteRepository->save($user);

        $companyDto->ownerId = $user->id;
        $companyDto->status = 'active';


        $company = Company::staticCreate($companyDto);
        $this->companyWriteRepository->save($company);

        $company->users()->sync([$user->id]);
    }
}
