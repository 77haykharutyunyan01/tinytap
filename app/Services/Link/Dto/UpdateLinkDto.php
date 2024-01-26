<?php

namespace App\Services\Link\Dto;

use App\Http\Requests\Link\Link\UpdateLinkRequest;
use Spatie\DataTransferObject\DataTransferObject;

class UpdateLinkDto extends DataTransferObject
{
    public string $id;
    public string $companyId;
    public CreateLinkDto $linkDto;

    public static function fromRequest(UpdateLinkRequest $request): UpdateLinkDto
    {
        return new self(
            id: $request->getId(),
            companyId: $request->getCompanyId(),
            linkDto: CreateLinkDto::fromRequest($request)
        );
    }

}
