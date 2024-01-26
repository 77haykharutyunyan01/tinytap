<?php

namespace App\Providers;

use App\Repositories\Read\Company\CompanyReadRepository;
use App\Repositories\Read\Company\CompanyReadRepositoryInterface;
use App\Repositories\Read\Domain\DomainReadRepository;
use App\Repositories\Read\Domain\DomainReadRepositoryInterface;
use App\Repositories\Read\Link\LinkReadRepository;
use App\Repositories\Read\Link\LinkReadRepositoryInterface;
use App\Repositories\Read\Permission\PermissionReadRepository;
use App\Repositories\Read\Permission\PermissionReadRepositoryInterface;
use App\Repositories\Read\Role\RoleReadRepository;
use App\Repositories\Read\Role\RoleReadRepositoryInterface;
use App\Repositories\Read\User\UserReadRepository;
use App\Repositories\Read\User\UserReadRepositoryInterface;
use App\Repositories\Write\Company\CompanyWriteRepository;
use App\Repositories\Write\Company\CompanyWriteRepositoryInterface;
use App\Repositories\Write\Domain\DomainWriteRepository;
use App\Repositories\Write\Domain\DomainWriteRepositoryInterface;
use App\Repositories\Write\DomainCompanies\DomainCompaniesWriteRepository;
use App\Repositories\Write\DomainCompanies\DomainCompaniesWriteRepositoryInterface;
use App\Repositories\Write\Link\LinkWriteRepository;
use App\Repositories\Write\Link\LinkWriteRepositoryInterface;
use App\Repositories\Write\Permission\PermissionWriteRepository;
use App\Repositories\Write\Permission\PermissionWriteRepositoryInterface;
use App\Repositories\Write\Role\RoleWriteRepository;
use App\Repositories\Write\Role\RoleWriteRepositoryInterface;
use App\Repositories\Write\User\ModelHasRolesWriteRepository;
use App\Repositories\Write\User\ModelHasRolesWriteRepositoryInterface;
use App\Repositories\Write\User\UserWriteRepository;
use App\Repositories\Write\User\UserWriteRepositoryInterface;
use App\Repositories\Write\UserCompanies\UserCompaniesWriteRepository;
use App\Repositories\Write\UserCompanies\UserCompaniesWriteRepositoryInterface;
use Carbon\Laravel\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            RoleWriteRepositoryInterface::class,
            RoleWriteRepository::class
        );

        $this->app->bind(
            RoleReadRepositoryInterface::class,
            RoleReadRepository::class
        );

        $this->app->bind(
            PermissionReadRepositoryInterface::class,
            PermissionReadRepository::class
        );

        $this->app->bind(
            PermissionWriteRepositoryInterface::class,
            PermissionWriteRepository::class
        );

        $this->app->bind(
            CompanyWriteRepositoryInterface::class,
            CompanyWriteRepository::class
        );

        $this->app->bind(
            CompanyReadRepositoryInterface::class,
            CompanyReadRepository::class
        );

        $this->app->bind(
            UserWriteRepositoryInterface::class,
            UserWriteRepository::class
        );
        $this->app->bind(
            ModelHasRolesWriteRepositoryInterface::class,
            ModelHasRolesWriteRepository::class
        );

        $this->app->bind(
            UserReadRepositoryInterface::class,
            UserReadRepository::class
        );

        $this->app->bind(
            UserCompaniesWriteRepositoryInterface::class,
            UserCompaniesWriteRepository::class
        );

        $this->app->bind(
            DomainWriteRepositoryInterface::class,
            DomainWriteRepository::class
        );

        $this->app->bind(
            DomainCompaniesWriteRepositoryInterface::class,
            DomainCompaniesWriteRepository::class
        );

        $this->app->bind(
            DomainReadRepositoryInterface::class,
            DomainReadRepository::class
        );

        $this->app->bind(
            LinkWriteRepositoryInterface::class,
            LinkWriteRepository::class
        );

        $this->app->bind(
            LinkReadRepositoryInterface::class,
            LinkReadRepository::class
        );
    }
}
