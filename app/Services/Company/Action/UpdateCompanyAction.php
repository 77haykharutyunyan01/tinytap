<?php

namespace App\Services\Company\Action;

use App\Repositories\Write\Company\CompanyWriteRepositoryInterface;
use App\Services\Company\Dto\UpdateCompanyDto;

class UpdateCompanyAction
{
    public function __construct(
        protected CompanyWriteRepositoryInterface $companyWriteRepository
    ) {
    }

    public function run(UpdateCompanyDto $dto): void
    {
        $this->companyWriteRepository->update(['status' => $dto->status], $dto->id);
    }
}
