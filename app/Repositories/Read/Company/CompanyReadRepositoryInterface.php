<?php

namespace App\Repositories\Read\Company;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Collection;

interface CompanyReadRepositoryInterface
{
    public function index(?string $status): Collection;
    public function getByOwnerId(string $ownerId): Company;
}
