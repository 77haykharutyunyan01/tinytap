<?php

namespace App\Repositories\Write\User;

use App\Exceptions\SavingErrorException;
use App\Models\User\User;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use League\Flysystem\UnableToDeleteFile;

class UserWriteRepository implements UserWriteRepositoryInterface
{
    private function query(): Builder
    {
        return User::query();
    }

    /**
     * @throws SavingErrorException
     */
    public function save(User $user): User
    {
        if (!$user->save()) {
            throw new SavingErrorException();
        }

        return $user;
    }
    public function deleteByUserId(string $userId): bool
    {
        if (!$this->query()->where('id', $userId)->delete()) {
            throw new UnableToDeleteFile('Failed to remove from users');
        }

        return true;
    }
}
