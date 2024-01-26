<?php

namespace App\Repositories\Write\Permission;

use App\Exceptions\SavingErrorException;
use App\Models\Permission\Permission;
use Illuminate\Database\Eloquent\Builder;

class PermissionWriteRepository implements PermissionWriteRepositoryInterface
{
    private function query(): Builder
    {
        return Permission::query();
    }

    /**
     * @throws SavingErrorException
     */
    public function save(array $permissions): bool
    {
        if (!$this->query()->insert($permissions)) {
            throw new SavingErrorException();
        }

        return true;
    }
}
