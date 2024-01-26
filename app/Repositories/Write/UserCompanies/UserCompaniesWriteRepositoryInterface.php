<?php

namespace App\Repositories\Write\UserCompanies;


interface UserCompaniesWriteRepositoryInterface
{
    public function insert(string $userid, string $companyId): bool;

    public function deleteByUserId(string $userId): bool;

}
