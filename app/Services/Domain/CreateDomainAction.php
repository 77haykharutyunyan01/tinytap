<?php

namespace App\Services\Domain;

use App\Models\Domain\Domain;
use App\Repositories\Read\User\UserReadRepositoryInterface;
use App\Repositories\Write\Domain\DomainWriteRepositoryInterface;
use App\Repositories\Write\DomainCompanies\DomainCompaniesWriteRepositoryInterface;

class CreateDomainAction
{
    public function __construct(
        protected UserReadRepositoryInterface $userReadRepository,
        protected DomainWriteRepositoryInterface $domainWriteRepository,
        protected DomainCompaniesWriteRepositoryInterface $domainCompaniesWriteRepository
    ) {}

    public function run(string $userId, string $domain, bool $default): Domain
    {
        $user = $this->userReadRepository->getById($userId);

        if ($default) {
            foreach($user->companies->first()->domains as $item) {
                if ($item->default) {
                    $item->default = false;
                    $this->domainWriteRepository->save($item);
                }
            }
        }

        $domain = Domain::staticCreate($domain, $userId, $default);

        $this->domainWriteRepository->save($domain);
        $this->domainCompaniesWriteRepository->insert($domain->id, $user->companies->first()->id);

        return $domain;
    }
}
