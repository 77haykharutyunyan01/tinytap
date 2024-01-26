<?php

namespace App\Services\Link\Action;

use App\Repositories\Write\Link\LinkWriteRepositoryInterface;

class DeleteLinkAction
{
    public function __construct(
        protected LinkWriteRepositoryInterface $linkWriteRepository
    ) {}

    public function run(string $linkId): bool
    {
        return $this->linkWriteRepository->delete($linkId);
    }
}
