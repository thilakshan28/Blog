<?php

namespace App\Providers;

use App\Heading;
use App\Expense;
use App\Observers\ExpenseObserver;
use App\Observers\HeadingObserver;
use Illuminate\Support\ServiceProvider;

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
        //
    }
}
