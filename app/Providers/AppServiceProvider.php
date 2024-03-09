<?php

namespace App\Providers;

use App\Models\Support;
use App\Observers\SupportObserver;
use Illuminate\Support\ServiceProvider;
use App\Repositories\SupportEloquentORM;

use App\Repositories\Eloquent\ReplySupportRepository;
use App\Repositories\Contracts\ReplyRepositoryInterface;
use App\Repositories\Contracts\SupportRepositoryInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
                // Abstract Class
            SupportRepositoryInterface::class,
                // Concrete Class
            SupportEloquentORM::class
        );

        // Abstract Class
        $this->app->bind(
            ReplyRepositoryInterface::class,
                // Concrete Class
                ReplySupportRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Turn on Observable
        Support::observe(SupportObserver::class);
    }
}
