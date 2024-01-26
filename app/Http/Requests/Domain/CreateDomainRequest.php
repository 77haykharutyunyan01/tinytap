<?php

namespace App\Http\Requests\Domain;

use App\Traits\Auth\AuthIdTrait;
use Illuminate\Foundation\Http\FormRequest;

class CreateDomainRequest extends FormRequest
{
    use AuthIdTrait;

    const DOMAIN = 'domain';
    const DEFAULT = 'default';

    public function rules(): array
    {
        return [
            self::DOMAIN => [
                'required',
                'string'
            ],
            self::DEFAULT => [
                'nullable',
                'bool'
            ],
        ];
    }

    public function getDomain(): string
    {
        return $this->get(self::DOMAIN);
    }

    public function getDefault(): bool
    {
        return (bool)$this->get(self::DEFAULT);
    }
}
