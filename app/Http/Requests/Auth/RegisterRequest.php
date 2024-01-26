<?php

namespace App\Http\Requests\Auth;

use App\Traits\Auth\AuthIdTrait;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    use AuthIdTrait;
    public const COMPANY_NAME = 'companyName';
    public const NAME = 'name';
    public const EMAIL = 'email';
    public const PASSWORD = 'password';

    public function rules(): array
    {
        return [
            self::COMPANY_NAME => [
                'required',
                'min:5',
                'max:20',
                'string',
            ],
            self::NAME => [
                'required',
                'min:5',
                'max:20',
                'string',
            ],

            self::EMAIL => [
                'required',
                'email',
                'unique:users',
                'string',
            ],

            self::PASSWORD => [
                'required',
                'string',
                'min:5',
            ],
        ];
    }

    public function getCompaniesName(): string
    {
        return $this->get(self::COMPANY_NAME);
    }
    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getEmail(): string
    {
        return $this->get(self::EMAIL);
    }

    public function getPassword(): string
    {
        return $this->get(self::PASSWORD);
    }

}
