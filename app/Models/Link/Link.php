<?php

namespace App\Models\Link;

use App\Models\Domain\Domain;
use App\Services\Link\Dto\ApiCreateLinkDto;
use App\Services\Link\Dto\CreateLinkDto;
use App\Services\Link\Dto\UpdateLinkDto;
use App\Traits\Helper\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property uuid $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $status
 * @property string $original_link
 * @property string $short_link
 * @property string $image_path
 * @property uuid $domain_id
 * @property uuid $company_id
 */
class Link extends Model
{
    use HasFactory, Uuid;

    const LINK_IMAGES = 'LinkImages';

    protected $fillable = [
        'name',
        'title',
        'description',
        'original_link',
        'short_link',
        'image_path'
    ];

    public static function staticCreate(
        CreateLinkDto|ApiCreateLinkDto $dto,
        ?string $imagePath,
        string $shortLink,
        string $companyId
    ): static {
        $link = new static();
        $link->setName($dto->name);
        $link->setTitle($dto->title);
        $link->setDescription($dto->description);
        $link->setStatus($dto->status);
        $link->setOriginalLink($dto->originalLink);
        $link->setShortLink($shortLink);
        $link->setDomainId($dto->domainId);
        $link->setCompanyId($companyId);
        $link->setImagePath($imagePath);

        return $link;
    }

    public function staticUpdate(
        UpdateLinkDto $dto,
        ?string $shortLink,
        string $imagePath = null
    ): Link
    {
        $this->setName($dto->linkDto->name);
        $this->setTitle($dto->linkDto->title);
        $this->setDescription($dto->linkDto->description);
        $this->setStatus($dto->linkDto->status);
        $this->setOriginalLink($dto->linkDto->originalLink);
        $this->setShortLink($shortLink ?? $this->short_link);
        $this->setDomainId($dto->linkDto->domainId);
        $this->setCompanyId($dto->companyId);
        $this->setImagePath($imagePath);

        return $this;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function setOriginalLink(string $originalLink): void
    {
        $this->original_link = $originalLink;
    }

    public function setShortLink(string $shortLink): void
    {
        $this->short_link = $shortLink;
    }

    public function setDomainId(string $domainId): void
    {
        $this->domain_id = $domainId;
    }

    public function setCompanyId(string $companyId): void
    {
        $this->company_id = $companyId;
    }

    public function setImagePath(?string $imagePath): void
    {
        $this->image_path = $imagePath;
    }

    public function domain(): BelongsTo
    {
        return $this->belongsTo(
            Domain::class
        );
    }
}
