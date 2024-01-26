<?php

namespace App\Services\Link\Dto;

use App\Http\Requests\ApiCreateLinkRequest;
use Spatie\DataTransferObject\DataTransferObject;

class ApiCreateLinkDto extends DataTransferObject
{
   public ?string $domain;
   public ?string $imageUrl;
   public string $apiKey;
   public CreateLinkDto $linkDto;

    public static function fromApiRequest(ApiCreateLinkRequest $request): ApiCreateLinkDto
    {
        return new self(
            linkDto: CreateLinkDto::fromRequest($request),
            domain: $request->getDomain(),
            imageUrl: $request->getImageUrl(),
            apiKey: $request->getApiKey()
        );
    }
}
