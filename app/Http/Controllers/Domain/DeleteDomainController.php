<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Domain\DeleteDomainAction;
use App\Http\Requests\Domain\DeleteDomainRequest;

class DeleteDomainController extends Controller
{
    public function __invoke(

        DeleteDomainRequest $request,
        DeleteDomainAction  $deleteDomainAction
    ): RedirectResponse {
        $deleteDomainAction->run($request->getDomainId());

        return redirect()->back();
    }
}
