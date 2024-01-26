<?php

namespace App\Repositories\Write\UserCompanies;

use App\Exceptions\SavingErrorException;
use App\Models\Company\UserCompany;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use League\Flysystem\UnableToDeleteFile;

class UserCompaniesWriteRepository implements UserCompaniesWriteRepositoryInterface
{
    private function query(): Builder
    {
        return UserCompany::query();
    }

    /**
     * @throws SavingErrorException
     */
    public function insert(string $userid, string $companyId): bool
    {
        $result = $this->query()->insert([
            'user_id' => $userid,
            'company_id' => $companyId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        if (!$result) {
            throw new SavingErrorException();
        }

        return $result;
    }
    public function deleteByUserId(string $userId): bool
    {
        if (!$this->query()->where('user_id', $userId)->delete())
        {
            throw new UnableToDeleteFile('Failed to remove from user_companies');
        }

        return true;
    }
}
