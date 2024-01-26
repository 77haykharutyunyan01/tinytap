<?php

namespace App\Http\Requests\Link\Link;

class UpdateLinkRequest extends CreateLinkRequest
{
    const ID = 'id';
    const COMPANY_ID = 'company_id';

    public function rules(): array
    {
        return [
            self::ID => [
                'required',
                'string'
            ],
            self::COMPANY_ID => [
                'required',
                'string'
            ]
        ];
    }

    public function getId(): string
    {
        return $this->get(self::ID);
    }

    public function getCompanyId(): string
    {
        return $this->get(self::COMPANY_ID);
    }
}
