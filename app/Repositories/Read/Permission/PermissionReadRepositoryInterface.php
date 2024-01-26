<?php

namespace App\Repositories\Read\Permission;

use Illuminate\Database\Eloquent\Collection;

interface PermissionReadRepositoryInterface
{
    public function index(): Collection;

    public function getByPermissions(array $permissions);
}
