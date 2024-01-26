<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Domain\CreateDomainAction;
use App\Http\Requests\Domain\CreateDomainRequest;

class CreateDomainController extends Controller
{
    public function __invoke(
        CreateDomainRequest $request,
        CreateDomainAction $createDomainAction
    ): RedirectResponse {
        $createDomainAction->run(
            $request->getUserId(),
            $request->getDomain(),
            $request->getDefault()
        );

        return redirect('dash/domain');
    }
}
