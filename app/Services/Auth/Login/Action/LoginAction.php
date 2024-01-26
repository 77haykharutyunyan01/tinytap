<?php

namespace App\Services\Auth\Login\Action;

use App\Repositories\Read\User\UserReadRepositoryInterface;
use App\Services\Auth\Login\Dto\LoginUserDto;
use Illuminate\Support\Facades\Auth;

class LoginAction
{
    public function __construct(
        protected UserReadRepositoryInterface $userReadRepository
    ) {}

    public function run(LoginUserDto $dto): bool
    {

        if (Auth::attempt(['email' => $dto->email, 'password' => $dto->password])) {
            return true;
        }


        return false;
    }
}
