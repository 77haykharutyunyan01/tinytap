<?php

namespace App\Repositories\Read\Domain;

use App\Models\Domain\Domain;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class DomainReadRepository implements DomainReadRepositoryInterface
{
    private function query(): Builder
    {
        return Domain::query();
    }

    public function getByUserId(string $userId): Collection
    {
        return $this->query()->where('user_id', $userId)->get();
    }

    public function getByDomainName(string $domain): Domain
    {
        $domain = $this->query()->where('name', 'like', $domain)->first();

        if (is_null($domain)) {
            throw new NotFoundResourceException();
        }

        return $domain;
    }

    public function checkDomainExistence(string $domain): ?Domain
    {
        return $this->query()->where('name', 'like', $domain)->first();
    }
}
