<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\DeleteUserRequest;
use App\Services\User\Action\DeleteUserAction;
use Illuminate\Http\RedirectResponse;

class DeleteUserController extends Controller
{
    public function __invoke(
        DeleteUserRequest $request,
        DeleteUserAction $deleteUserAction
    ): RedirectResponse {
        $deleteUserAction->run($request->getUserId());

        return redirect()->back();
    }
}
