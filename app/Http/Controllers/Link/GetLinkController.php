<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use App\Services\Link\Action\GetLinkAction;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GetLinkController extends Controller
{
    public function __invoke(
        Request $request,
        GetLinkAction $getLinkAction
    ): View {
        $links = $getLinkAction->run($request->user()->id);

        return view('Link/LinkList', ['links' => $links, 'owner' => $request->user()]);
    }
}
