<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Link\Action\DeleteLinkAction;
use App\Http\Requests\Link\Link\EditLinkRequest;

class DeleteLinkController extends Controller
{
    public function __invoke(
        EditLinkRequest $request,
        DeleteLinkAction $deleteLinkAction
    ): RedirectResponse {
        $deleteLinkAction->run($request->getLinkId());

        return redirect()->back();
    }
}
