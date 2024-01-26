<?php

namespace App\Repositories\Write\DomainCompanies;

interface DomainCompaniesWriteRepositoryInterface
{
    public function insert(string $domainId, string $companyId): bool;
    public function delete(string $domainId): bool;
}
