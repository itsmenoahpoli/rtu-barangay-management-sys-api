<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\ResidentRecordRepository;
use App\Repositories\Interfaces\ResidentRecordRepositoryInterface;

use App\Repositories\ResidentCertificateRepository;
use App\Repositories\Interfaces\ResidentCertificateRepositoryInterface;

use App\Repositories\ComplaintRecordRepository;
use App\Repositories\Interfaces\ComplaintRecordRepositoryInterface;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            ResidentRecordRepositoryInterface::class,
            ResidentRecordRepository::class
        );
        $this->app->bind(
            ResidentCertificateRepositoryInterface::class,
            ResidentCertificateRepository::class
        );
        $this->app->bind(
            ComplaintRecordRepositoryInterface::class,
            ComplaintRecordRepository::class
        );
    }
}
