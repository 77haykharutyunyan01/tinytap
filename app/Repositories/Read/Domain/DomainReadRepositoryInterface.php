<?php

namespace App\Repositories\Read\Domain;


use App\Models\Domain\Domain;
use Illuminate\Database\Eloquent\Collection;

interface DomainReadRepositoryInterface
{
    public function getByUserId(string $userId): Collection;
    public function getByDomainName(string $domain): Domain;
    public function checkDomainExistence(string $domain): ?Domain;
}
