<?php

namespace App\Repositories\Read\Link;

use App\Models\Link\Link;
use Illuminate\Database\Eloquent\Collection;

interface LinkReadRepositoryInterface
{
    public function getByCompanyId(string $companyId): Collection;
    public function getById(?string $linkId): ?Link;
    public function getByShortLink(string $shortLink): ?Link;
}
