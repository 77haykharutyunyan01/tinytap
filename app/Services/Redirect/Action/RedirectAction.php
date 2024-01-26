<?php

namespace App\Services\Redirect\Action;

use App\Models\Link\Link;
use App\Repositories\Read\Link\LinkReadRepositoryInterface;

class RedirectAction
{
    public function __construct(
        protected LinkReadRepositoryInterface $linkReadRepository
    ) {}

    public function run(string $shortLink): ?Link
    {
        return $this->linkReadRepository->getByShortLink($shortLink);
    }
}
