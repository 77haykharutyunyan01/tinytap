<?php

namespace App\Repositories\Read\Role;

use App\Models\Role\Role;
use Illuminate\Database\Eloquent\Collection;

interface RoleReadRepositoryInterface
{
    public function index(): Collection;

    public function getByRoles(array $roles);

    public function getByName(string $name): Role;
}
