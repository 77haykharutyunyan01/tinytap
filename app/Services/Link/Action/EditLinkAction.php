<?php

namespace App\Services\Link\Action;

use App\Models\Link\Link;
use App\Repositories\Read\Link\LinkReadRepositoryInterface;

class EditLinkAction
{
    public function __construct(
        protected LinkReadRepositoryInterface $linkReadRepository
    ) {}

    public function run(string $linkId): Link
    {
        return $this->linkReadRepository->getById($linkId);
    }
}
