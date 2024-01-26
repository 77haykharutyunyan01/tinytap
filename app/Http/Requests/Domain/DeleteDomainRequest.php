<?php

namespace App\Http\Requests\Domain;


use Illuminate\Foundation\Http\FormRequest;

class DeleteDomainRequest extends FormRequest
{
    const DOMAIN_ID = 'domainId';

    public function rules(): array
    {
        return [
            self::DOMAIN_ID => [
                'required',
                'string'
            ]
        ];
    }

    public function getDomainId(): string
    {
        return $this->get(self::DOMAIN_ID);
    }
}
