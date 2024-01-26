<?php

namespace App\Repositories\Write\Company;

use App\Exceptions\SavingErrorException;
use App\Models\Company\Company;

use Illuminate\Database\Eloquent\Builder;

class CompanyWriteRepository implements CompanyWriteRepositoryInterface
{
    private function query(): Builder
    {
        return Company::query();
    }

    /**
     * @throws SavingErrorException
     */
    public function save(Company $company): bool
    {

        if (!$company->save()) {
            throw new SavingErrorException();

        }

        return true;
    }

    public function update(array $data, string $id): int
    {
        return $this->query()->where('id', $id)->update($data);
    }

}
