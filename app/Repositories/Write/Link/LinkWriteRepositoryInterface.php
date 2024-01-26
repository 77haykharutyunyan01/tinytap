<?php

namespace App\Repositories\Write\Link;

use App\Models\Link\Link;

interface LinkWriteRepositoryInterface
{
    public function save(Link $link): bool;
    public function delete(string $linkId): bool;
}
