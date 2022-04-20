<?php

namespace App\Providers;

use App\Repositories\AuthorRepository;
use App\Repositories\PublisherRepository;
use App\Repositories\BookRepository;
use App\Repositories\Interfaces\AuthorRepositoryInterface;
use App\Repositories\Interfaces\PublisherRepositoryInterface;
use App\Repositories\Interfaces\BookRepositoryInterface;
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
        $this->app->bind(AuthorRepositoryInterface::class,AuthorRepository::class);
        $this->app->bind(BookRepositoryInterface::class,BookRepository::class);
        $this->app->bind(PublisherRepositoryInterface::class,PublisherRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
