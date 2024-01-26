<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\Redirect\Action\RedirectAction;

class RedirectController extends Controller
{
    public function __invoke(
        Request $request,
        RedirectAction $redirectAction
    ): View {
        $shortLink = explode('/',$request->url())[3];

        $link = $redirectAction->run($shortLink);
        if (is_null($link)) {
            return  view('NotFound');
        }

        $url = $link->original_link;

        return view('RedirectPage', ['redirectData' => $link, 'redirectUrl' => $url]);
    }
}
