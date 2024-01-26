<?php

namespace App\Services\Domain;

use App\Repositories\Read\Domain\DomainReadRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetDomainAction
{
    public function __construct(
        protected DomainReadRepositoryInterface $domainReadRepository
    ) {}

    public function run(string $userId): Collection
    {
        return $this->domainReadRepository->getByUserId($userId);
    }
}
