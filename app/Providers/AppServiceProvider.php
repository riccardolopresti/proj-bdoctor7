<?php

namespace App\Providers;

// use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();
        // Braintree_Configuration::environment(env('sandbox'));
        // Braintree_Configuration::merchantId(env('mgjfy8g8gjhqydyp'));
        // Braintree_Configuration::publicKey(env('r6jf82xsksbzcjc9'));
        // Braintree_Configuration::privateKey(env('10b08150aa57076ade29e66f5870821a'));
    }
}
