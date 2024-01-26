<?php

namespace App\Services\Register\Action;

use App\Models\Company\Company;
use App\Models\User\User;
use App\Repositories\Read\User\UserReadRepositoryInterface;
use App\Repositories\Write\Company\CompanyWriteRepositoryInterface;
use App\Repositories\Write\User\UserWriteRepositoryInterface;
use App\Repositories\Write\UserCompanies\UserCompaniesWriteRepositoryInterface;
use App\Services\Company\Dto\CompanyDto;
use App\Services\Company\Dto\CreateCompanyDto;
use App\Services\Register\Dto\RegisterDto;

class RegisterAction
{
    public function __construct(
        protected UserWriteRepositoryInterface $userWriteRepository,
        protected UserCompaniesWriteRepositoryInterface $userCompaniesWriteRepository,
        protected UserReadRepositoryInterface $userReadRepository,
        protected CompanyWriteRepositoryInterface $companyWriteRepository
    ) {
    }

    public function run(RegisterDto $dto, CompanyDto $companyDto): void
    {
        $user = User::staticCreateRegister($dto);
        $this->userWriteRepository->save($user);
        $companyDto->ownerId = $user->id;

        $company = Company::staticCreate($companyDto);
        $this->companyWriteRepository->save($company);

      $this->userCompaniesWriteRepository->insert($user->id, $company->id);

    }
}
