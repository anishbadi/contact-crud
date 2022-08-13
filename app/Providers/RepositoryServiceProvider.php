<?php

namespace App\Providers;

use App\Repository\ContactRepository;
use App\Repository\Interfaces\ContactRepositoryInterface;
use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(ContactRepositoryInterface::class,ContactRepository::class);
    }
}
