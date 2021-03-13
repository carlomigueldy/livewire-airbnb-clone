<?php

namespace App\Providers;

use App\Repository\Contracts\EloquentRepositoryInterface;
use App\Repository\Contracts\ReservationRepositoryInterface;
use App\Repository\Contracts\RoomRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\ReservationRepository;
use App\Repository\Eloquent\RoomRepository;
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
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(ReservationRepositoryInterface::class, ReservationRepository::class);
        $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
    }
}
