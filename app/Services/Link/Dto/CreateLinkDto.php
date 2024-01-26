<?php

namespace App\Services\Link\Dto;

use App\Http\Requests\Link\Link\CreateLinkRequest;
use App\Models\Domain\Domain;
use Illuminate\Http\UploadedFile;
use Spatie\DataTransferObject\DataTransferObject;

class CreateLinkDto extends DataTransferObject
{
    public string $name;
    public ?string $title;
    public ?string $description;
    public string $status;
    public string $originalLink;
    public ?string $domainId;
    public ?UploadedFile $image;
    public string $userId;

    public static function fromRequest(CreateLinkRequest $request): CreateLinkDto
    {
        return new self(
            name: $request->getName(),
            title: $request->getTitle(),
            description: $request->getDescription(),
            status: $request->getStatus(),
            originalLink: $request->getOriginalLink(),
            domainId: $request->getDomainId() ?? Domain::DEFAULT_DOMAIN_ID,
            image: $request->getImage(),
            userId: $request->getUserId()
        );
    }
}
