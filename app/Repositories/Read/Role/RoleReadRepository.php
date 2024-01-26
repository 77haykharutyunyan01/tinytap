<?php

namespace App\Repositories\Read\Role;

use App\Models\Role\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class RoleReadRepository implements RoleReadRepositoryInterface
{
    private function query(): Builder
    {
        return Role::query();
    }

    public function index(): Collection
    {
        return $this->query()->get();
    }

    public function getByRoles(array $roles): Collection
    {
        return $this->query()
            ->whereIn('name', $roles)
            ->get();
    }

    public function getByName(string $name): Role
    {
        return $this->query()->where('name', $name)->first();
    }
}
