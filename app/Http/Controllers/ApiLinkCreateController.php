<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\ApiCreateLinkRequest;
use App\Services\Link\Dto\ApiCreateLinkDto;
use App\Services\Link\Action\ApiCreateLinkAction;

class ApiLinkCreateController extends Controller
{
    public function __invoke(
        ApiCreateLinkRequest $request,
        ApiCreateLinkAction  $apiCreateLinkAction
    ): JsonResponse {
        $dto = ApiCreateLinkDto::fromApiRequest($request);

        $result = $apiCreateLinkAction->run($dto);

        return response()->json([
            'status' => $result['status'],
            'data' => $result['data']
        ]);
    }
}
