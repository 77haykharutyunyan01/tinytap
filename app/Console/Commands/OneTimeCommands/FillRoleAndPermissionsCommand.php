<?php

namespace App\Console\Commands\OneTimeCommands;

use App\Models\Permission\Consts\PermissionConst;
use App\Models\Role\Consts\RoleConst;
use App\Repositories\Read\Permission\PermissionReadRepositoryInterface;
use App\Repositories\Read\Role\RoleReadRepositoryInterface;
use App\Repositories\Write\Permission\PermissionWriteRepositoryInterface;
use App\Repositories\Write\Role\RoleWriteRepositoryInterface;
use App\Traits\Helper\Uuid;
use Illuminate\Console\Command;

class FillRoleAndPermissionsCommand extends Command
{
    protected $signature = 'role-permissions:fill';

    protected $description = 'Fill role-permissions';

    protected array $rolesData;
    protected array $permissionsData;

    public function handle(
        RoleReadRepositoryInterface $roleReadRepository,
        RoleWriteRepositoryInterface $roleWriteRepository,
        PermissionReadRepositoryInterface $permissionReadRepository,
        PermissionWriteRepositoryInterface $permissionWriteRepository
    ): bool {
        $currentRoles = $roleReadRepository
            ->getByRoles(RoleConst::ROLES)
            ->pluck('name');

        $currentPermissions = $permissionReadRepository
            ->getByPermissions(PermissionConst::PERMISSIONS)
            ->pluck('name');

        $allRoles = collect(RoleConst::ROLES);
        $allPermissions = collect(PermissionConst::PERMISSIONS);

        $diffRoles = $allRoles->diff($currentRoles);
        $diffPermissions = $allPermissions->diff($currentPermissions);

        if ($diffRoles->isNotEmpty()) {
            foreach ($diffRoles as $role) {
                $this->rolesData[] = [
                    'name' => $role,
                    'guard_name' => RoleConst::GUARD_API,
                ];
            }

            $roleWriteRepository->save($this->rolesData);
        }

        if ($diffPermissions->isNotEmpty()) {
            foreach ($diffPermissions as $permission) {
                $this->permissionsData[] = [
                    'name' => $permission,
                    'guard_name' => PermissionConst::GUARD_API,
                ];
            }

            $permissionWriteRepository->save($this->permissionsData);
        }

        $roles = $roleReadRepository->index();
        $permissions = $permissionReadRepository->index();

        foreach ($roles as $role) {
            $permission = match ($role->name) {
                RoleConst::ROLE_USER => $permissions
                    ->whereIn('name', PermissionConst::USER_PERMISSIONS),
                RoleConst::ROLE_ADMIN => $permissions
                    ->whereIn('name', PermissionConst::ADMIN_PERMISSIONS),
                RoleConst::ROLE_ROOT => $permissions
                    ->whereIn('name', PermissionConst::ROOT_PERMISSIONS),
            };

            $role->syncPermissions($permission);
        }

        return true;
    }
}
