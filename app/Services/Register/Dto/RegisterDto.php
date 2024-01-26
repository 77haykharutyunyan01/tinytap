<?php

namespace App\Services\Register\Dto;

use App\Http\Requests\Auth\RegisterRequest;
use App\Traits\Auth\AuthIdTrait;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class RegisterDto extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $password;
    public string $userId;

    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(RegisterRequest $request): RegisterDto
    {
        return new self(
            name: $request->getName(),
            email: $request->getEmail(),
            password: $request->getPassword(),
            userId: $request->getUserId(),
        );
    }


}
