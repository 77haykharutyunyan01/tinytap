<?php

namespace App\Repositories\Write\Domain;

use App\Models\Domain\Domain;

interface DomainWriteRepositoryInterface
{
    public function save(Domain $domain): bool;
    public function delete(string $domainId): bool;
}
