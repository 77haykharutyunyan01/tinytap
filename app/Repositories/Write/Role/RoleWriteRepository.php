<?php

namespace App\Repositories\Write\Role;

use App\Exceptions\SavingErrorException;
use App\Models\Role\Role;
use Illuminate\Database\Eloquent\Builder;

class RoleWriteRepository implements RoleWriteRepositoryInterface
{
    private function query(): Builder
    {
        return Role::query();
    }

    /**
     * @throws SavingErrorException
     */
    public function save(array $roles): bool
    {
        if (!$this->query()->insert($roles)) {
            throw new SavingErrorException();
        }

        return true;
    }
}
