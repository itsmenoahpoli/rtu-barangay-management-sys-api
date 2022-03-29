<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\ResidentRecordRepository;
use App\Repositories\Interfaces\ResidentRecordRepositoryInterface;

use App\Repositories\ResidentRequestFileRepository;
use App\Repositories\Interfaces\ResidentRequestFileRepositoryInterface;

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
            ResidentRequestFileRepositoryInterface::class,
            ResidentRequestFileRepository::class
        );
    }
}
