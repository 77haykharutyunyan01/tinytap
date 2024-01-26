<?php

namespace App\Http\Requests;

use App\Http\Requests\Link\Link\CreateLinkRequest;

class ApiCreateLinkRequest extends CreateLinkRequest
{
    const DOMAIN = 'domain';
    const IMAGE_URL = 'image_url';
    const API_KEY = 'api_key';

    public function rules(): array
    {
        return [
            self::DOMAIN => [
                'nullable',
                'string'
            ],
            self::IMAGE_URL => [
                'nullable',
                'string'
            ],
            self::API_KEY => [
                'required',
                'string'
            ]
        ];
    }

    public function getDomain(): ?string
    {
        return $this->get(self::DOMAIN);
    }

    public function getImageUrl(): ?string
    {
        return $this->get(self::IMAGE_URL);
    }

    public function getApiKey(): string
    {
        return $this->get(self::API_KEY);
    }
}
