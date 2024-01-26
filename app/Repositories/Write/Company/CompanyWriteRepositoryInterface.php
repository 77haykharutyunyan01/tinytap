<?php

namespace App\Repositories\Write\Company;

use App\Models\Company\Company;

interface CompanyWriteRepositoryInterface
{
    public function save(Company $company): bool;

    public function update(array $data, string $id);


}
