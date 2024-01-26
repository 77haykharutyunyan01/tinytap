<?php

namespace App\Http\Controllers\Link;

use App\Services\Domain\GetDomainAction;
use App\Services\Link\Action\LinkCreateAction;
use App\Http\Requests\Link\Link\CreateLinkRequest;
use App\Services\Link\Dto\CreateLinkDto;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CreateLinkController extends Controller
{
    public function __invoke(
        CreateLinkRequest $request,
        LinkCreateAction $linkCreateAction,
        GetDomainAction $getDomainAction
    ): View {
        $dto = CreateLinkDto::fromRequest($request);

        $link = $linkCreateAction->run($dto);

        $domains = $getDomainAction->run($dto->userId);

        return view('Link/UpdateLink', [
            'link' => $link,
            'current_domain' => $link->domain,
            'domains' => $domains,
            'owner' => $request->user()
        ]);
    }
}
