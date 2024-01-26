<?php

namespace App\Services\Company\Dto;

use App\Http\Requests\Auth\Company\CreateCompanyRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CreateCompanyDto extends DataTransferObject
{
    public string $name;
    public string $status;
    public ?string $ownerId;

    public static function fromRequest(CreateCompanyRequest $request): CreateCompanyDto
    {
        return new self(
            name: $request->getCompanyName(),
            status: $request->getCompanyStatus()
        );
    }
}
