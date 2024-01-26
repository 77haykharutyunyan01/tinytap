<?php

namespace App\Http\Requests\Link\Link;

use App\Traits\Auth\AuthIdTrait;
use Illuminate\Foundation\Http\FormRequest;

class EditLinkRequest extends FormRequest
{
    use AuthIdTrait;

    const LINK_ID = 'linkId';

    public function rules(): array
    {
        return [
            self::LINK_ID => [
                'required',
                'string'
            ]
        ];
    }

    public function getLinkId(): string
    {
        return $this->get(self::LINK_ID);
    }
}
