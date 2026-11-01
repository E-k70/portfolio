<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Access\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('create-outfit', function (User $user) {
            $likes = $user->likedOutfits()->count(); // query, geen teller-kolom

            return $likes >= 3
                ? Response::allow()
                : Response::deny("You must like 3 outfits before posting one yourself. You have currently liked {$likes}.");
        });
    }
}
