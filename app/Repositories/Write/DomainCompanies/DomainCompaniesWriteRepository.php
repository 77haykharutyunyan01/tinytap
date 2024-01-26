<?php

namespace App\Repositories\Write\DomainCompanies;

use App\Exceptions\SavingErrorException;
use App\Models\Domain\DomainCompanies;
use Exception;
use Illuminate\Database\Eloquent\Builder;

class DomainCompaniesWriteRepository implements DomainCompaniesWriteRepositoryInterface
{
    private function query(): Builder
    {
        return DomainCompanies::query();
    }

    public function insert(string $domainId, string $companyId): bool
    {
        $domainCompanies = $this->query()->insert([
            'domain_id' => $domainId,
            'company_id' => $companyId,
        ]);

        if (!$domainCompanies)  {
            throw new SavingErrorException();
        }

        return true;
    }
    public function delete(string $domainId): bool
    {
        if (!$this->query()->where('domain_id', $domainId)->delete()) {
            throw new Exception();
        }

        return true;
    }
}
