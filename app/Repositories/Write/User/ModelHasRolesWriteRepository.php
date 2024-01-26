<?php

namespace App\Repositories\Write\User;
use App\Models\User\ModelHasRoles;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use League\Flysystem\UnableToDeleteFile;

class ModelHasRolesWriteRepository implements  ModelHasRolesWriteRepositoryInterface
{
    private function query(): Builder
    {
        return ModelHasRoles::query();
    }
    public function delete(string $userId): bool
    {
        if (!$this->query()->where('model_id', $userId)->delete())
        {
            throw new UnableToDeleteFile('Failed to remove from model_has_roles');
        }

        return true;
    }
}
