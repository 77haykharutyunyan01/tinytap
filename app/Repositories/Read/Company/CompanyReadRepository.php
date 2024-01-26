<?php

namespace App\Repositories\Read\Company;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class CompanyReadRepository implements CompanyReadRepositoryInterface
{
    private function query(): Builder
    {
        return Company::query();
    }

    public function index(?string $status): Collection
    {
        $query = $this->query();

        if (!is_null($status)) {
            $query->where('status', $status);
        }

        return $query->with('owner')->get();
    }

    public function getByOwnerId(string $ownerId): Company
    {
        $company = $this->query()
            ->where('owner_id', $ownerId)
            ->with('users')
            ->first();

        if (is_null($company)) {
            throw new NotFoundResourceException();
        }

        return $company;
    }

}
