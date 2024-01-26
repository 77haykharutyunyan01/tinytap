<?php

namespace App\Repositories\Write\User;



interface ModelHasRolesWriteRepositoryInterface
{
    public function delete(string $userId): bool;
}
