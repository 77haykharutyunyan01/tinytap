<?php

namespace App\Http\Controllers\Link;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Domain\GetDomainAction;

class CreateLinkViewController extends Controller
{
    public function __invoke(
        Request $request,
        GetDomainAction $domainAction
    ): View {
        $domains = $domainAction->run($request->user()->id);

        return view('Link/CreateLink', ['domains' => $domains, 'owner' => $request->user()]);
    }
}
