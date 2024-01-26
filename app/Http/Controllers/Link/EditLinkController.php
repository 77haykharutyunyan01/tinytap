<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use App\Http\Requests\Link\Link\EditLinkRequest;
use App\Services\Domain\GetDomainAction;
use App\Services\Link\Action\EditLinkAction;
use Illuminate\View\View;

class EditLinkController extends Controller
{
    public function __invoke(
        EditLinkRequest $request,
        EditLinkAction $editLinkAction,
        GetDomainAction $getDomainAction
    ): View {
        $link = $editLinkAction->run($request->getLinkId());

        $domains = $getDomainAction->run($request->getUserId());

        return view('Link/UpdateLink', [
            'link' => $link,
            'current_domain' => $link->domain,
            'domains' => $domains,
            'owner' => $request->user()
        ]);
    }
}
