<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use App\Services\Domain\GetDomainAction;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GetDomainController extends Controller
{
    public function __invoke(
        Request $request,
        GetDomainAction $domainAction
    ): View {
        $domains = $domainAction->run($request->user()->id);

        return view('Domain/DomainList', ['domains' => $domains, 'owner' => $request->user()]);
    }
}
