<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Contracts\PaymentGateway;
use App\Services\RazorpayPaymentService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentGateway::class,RazorpayPaymentService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
