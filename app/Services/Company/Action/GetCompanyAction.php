<?php

namespace App\Services\Company\Action;

use App\Repositories\Read\Company\CompanyReadRepositoryInterface;
use App\Services\Company\Dto\GetCompanyDto;
use Illuminate\Database\Eloquent\Collection;

class GetCompanyAction
{
    public function __construct(
        protected CompanyReadRepositoryInterface $companyReadRepository
    ) {}

    public function run(GetCompanyDto $dto): Collection
    {
        return $this->companyReadRepository->index($dto->status);
    }
}
