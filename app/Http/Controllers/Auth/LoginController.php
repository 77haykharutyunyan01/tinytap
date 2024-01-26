<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\Login\Dto\LoginUserDto;
use App\Services\Auth\Login\Action\LoginAction;

class LoginController extends Controller
{
    public function __invoke(
        LoginRequest $request,
        LoginAction $loginAction
    ) {
        $dto = LoginUserDto::fromRequest($request);

        $result = $loginAction->run($dto);

        if ($result) {
            return redirect('dash/user');
        }

        return redirect()->back();
    }
}
