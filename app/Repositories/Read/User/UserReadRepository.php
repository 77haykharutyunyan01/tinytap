<?php

namespace App\Repositories\Read\User;

use App\Exceptions\UserNotFoundException;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Builder;

class UserReadRepository implements UserReadRepositoryInterface
{
    private function query(): Builder
    {
        return User::query();
    }

    public function getById(string $id): User
    {
        $user = $this->query()->find($id);

        if (!$user) {
            throw new UserNotFoundException();
        }

        return $user;
    }

    public function getByEmail(string $email): User
    {
        $user = $this->query()
            ->where('email', $email)
            ->first();

        if (!$user) {
            throw new UserNotFoundException();
        }

        return $user;
    }

    public function getByApiKey(string $apiKey): User
    {
        $user = $this->query()
            ->where('api_key', $apiKey)
            ->first();

        if (!$user) {
            throw new UserNotFoundException();
        }

        return $user;
    }
}
