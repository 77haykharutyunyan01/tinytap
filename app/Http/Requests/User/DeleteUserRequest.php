<?php

namespace App\Http\Requests\User;


use Illuminate\Foundation\Http\FormRequest;

class DeleteUserRequest extends FormRequest
{
    const USER_ID = 'userId';

    public function rules(): array
    {
        return [
            self::USER_ID => [
                'required',
                'string'
            ]
        ];
    }

    public function getUserId(): string
    {
        return $this->get(self::USER_ID);
    }
}
