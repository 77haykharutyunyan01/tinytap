<?php

namespace App\Repositories\Write\Domain;

use App\Exceptions\SavingErrorException;
use App\Models\Domain\Domain;
use Illuminate\Database\Eloquent\Builder;
use Exception;

class DomainWriteRepository implements DomainWriteRepositoryInterface
{

    private function query(): Builder
    {
        return Domain::query();
    }public function save(Domain $domain): bool
    {
        if (!$domain->save()) {
            throw new SavingErrorException();
        }

        return true;
    }
    public function delete(string $domainId): bool
    {
        if (!$this->query()->find($domainId)->delete())
        {
            throw new Exception();
        }

        return true;
    }
}
