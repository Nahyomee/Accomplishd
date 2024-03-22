<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

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
        Password::defaults(function () {
            return Password::min(8)
                           ->symbols();
        });
        Relation::morphMap([
            'tag' => 'App\Models\Tag',
            'category' => 'App\Models\Category',
            'user' => 'App\Models\User',
        ]);
    }
}
