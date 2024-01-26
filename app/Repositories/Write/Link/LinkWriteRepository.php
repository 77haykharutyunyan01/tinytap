<?php

namespace App\Repositories\Write\Link;

use App\Exceptions\SavingErrorException;
use App\Models\Link\Link;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;

class LinkWriteRepository implements LinkWriteRepositoryInterface
{
    private function query(): Builder
    {
        return Link::query();
    }

    public function save(Link $link): bool
    {
        if(!$link->save()) {
            throw new SavingErrorException();
        }

        return true;
    }

    public function delete(string $linkId): bool
    {
        if (!$this->query()->where('id', $linkId)->delete())
        {
            throw new Exception();
        }

        return true;
    }
}
