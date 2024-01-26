<?php

namespace App\Repositories\Read\Link;

use App\Exceptions\SavingErrorException;
use App\Models\Link\Link;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class LinkReadRepository implements LinkReadRepositoryInterface
{
    public function query(): Builder
    {
        return Link::query();
    }

    public function getByCompanyId(string $companyId): Collection
    {
        return $this->query()->where('company_id', $companyId)->get();
    }

    public function getById(?string $linkId): ?Link
    {
        if (is_null($linkId)) {
            return null;
        }

        $link = $this->query()->find($linkId);

        if (is_null($link)) {
            throw new Exception();
        }

        return $link;
    }

    public function getByShortLink(string $shortLink): ?Link
    {
        return $this->query()->where('short_link', $shortLink)->first();
    }
}
