<?php

namespace App\Http\Requests\Link\Link;

use App\Traits\Auth\AuthIdTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

class CreateLinkRequest extends FormRequest
{
    use AuthIdTrait;

    const NAME = 'name';
    const TITLE = 'title';
    const STATUS = 'status';
    const DESCRIPTION = 'description';
    const ORIGINAL_LINK = 'original_link';
    const DOMAIN_ID = 'domain_id';
    const IMAGE = 'image';

    public function rules(): array
    {
        return [
            self::NAME => [
                'required',
                'string'
            ],
            self::TITLE => [
                'nullable',
                'string'
            ],
            self::STATUS => [
                'required',
                'string'
            ],
            self::DESCRIPTION => [
                'nullable',
                'string'
            ],
            self::ORIGINAL_LINK => [
                'required',
                'string'
            ],
            self::DOMAIN_ID => [
                'nullable',
                'string'
            ],
            self::IMAGE => [
                'nullable',
                'mimes:png,jpg,jpeg,gif,webp'
            ]
        ];
    }

    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getTitle(): ?string
    {
        return $this->get(self::TITLE);
    }

    public function getDescription(): ?string
    {
        return $this->get(self::DESCRIPTION);
    }

    public function getStatus(): string
    {
        return $this->get(self::STATUS);
    }

    public function getOriginalLink(): string
    {
        return $this->get(self::ORIGINAL_LINK);
    }

    public function getDomainId(): ?string
    {
        return $this->get(self::DOMAIN_ID);
    }

    public function getImage(): ?UploadedFile
    {
        return $this->file(self::IMAGE);
    }
}
