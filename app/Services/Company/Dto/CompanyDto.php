<?php

namespace App\Services\Company\Dto;

use App\Http\Requests\Auth\RegisterRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CompanyDto extends DataTransferObject
{
    public string $name;
    public string $status;
    public ?string $ownerId;

    public static function fromRequest(RegisterRequest $request): CompanyDto
    {
        return new self(

            name: $request->getCompaniesName(),
            status: 'active',
            ownerId : null
        );
    }
}
