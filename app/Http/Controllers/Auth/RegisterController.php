<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Company\Dto\CompanyDto;
use App\Services\Register\Action\RegisterAction;
use App\Services\Register\Dto\RegisterDto;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class RegisterController extends Controller
{
    /**
     * @throws UnknownProperties
     */
    public function __invoke(
        RegisterRequest $request,
        RegisterAction $registerAction
    ) {
        $dto = RegisterDto::fromRequest($request);
        $companyDto = CompanyDto::fromRequest($request);

        $registerAction->run($dto,$companyDto);

        return redirect('login');
    }
}
