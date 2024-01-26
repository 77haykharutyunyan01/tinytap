<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use App\Http\Requests\Link\Link\UpdateLinkRequest;
use App\Services\Link\Action\UpdateLinkAction;
use App\Services\Link\Dto\UpdateLinkDto;
use Illuminate\Http\RedirectResponse;

class UpdateLinkController extends Controller
{
    public function __invoke(
        UpdateLinkRequest $request,
        UpdateLinkAction $updateLinkAction
    ): RedirectResponse {
        $dto = UpdateLinkDto::fromRequest($request);

        $updateLinkAction->run($dto);

        return redirect('/dash/link');
    }
}
