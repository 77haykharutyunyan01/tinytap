<?php

namespace App\Repositories\Read\Permission;

use App\Models\Permission\Permission;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class PermissionReadRepository implements PermissionReadRepositoryInterface
{
    private function query(): Builder
    {
        return Permission::query();
    }

    public function index(): Collection
    {
        return $this->query()->get();
    }

    public function getByPermissions(array $permissions): Collection
    {
        return $this->query()
            ->whereIn('name', $permissions)
            ->get();
    }
}
