<?php

namespace App\Repositories\Write\Permission;

interface PermissionWriteRepositoryInterface
{
    public function save(array $permissions);
}
