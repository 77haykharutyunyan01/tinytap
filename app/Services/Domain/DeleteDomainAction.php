<?php

namespace App\Services\Domain;

use App\Repositories\Write\Domain\DomainWriteRepositoryInterface;
use App\Repositories\Write\DomainCompanies\DomainCompaniesWriteRepositoryInterface;

class DeleteDomainAction
{
    public function __construct(
        protected DomainWriteRepositoryInterface $domainWriteRepository,
        protected DomainCompaniesWriteRepositoryInterface $domainCompaniesWriteRepository
    ) {}

    public function run(string $domainId): bool
    {
        $this->domainCompaniesWriteRepository->delete($domainId);

        return $this->domainWriteRepository->delete($domainId);
    }
}
