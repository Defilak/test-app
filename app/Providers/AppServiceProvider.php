<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            '' => 'App\Models\Company',
            'name' => 'App\Models\Company',
            'inn' => 'App\Models\Company',
            'description' => 'App\Models\Company',
            'director' => 'App\Models\Company',
            'address' => 'App\Models\Company',
            'phone_number' => 'App\Models\Company',
        ]);
    }
}
