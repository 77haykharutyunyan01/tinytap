<?php

namespace App\Repositories\Read\User;

use App\Models\User\User;

interface UserReadRepositoryInterface
{
    public function getById(string $id): User;
    public function getByEmail(string $email): User;
    public function getByApiKey(string $apiKey): User;
}
