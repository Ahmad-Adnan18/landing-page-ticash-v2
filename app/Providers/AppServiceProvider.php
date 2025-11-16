<?php

namespace App\Providers;

use App\Helpers\UrlHelper;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register the UrlHelper
        $this->app->singleton(UrlHelper::class, function () {
            return new UrlHelper();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // WhatsApp URL helper
        Blade::directive('whatsappUrl', function ($expression) {
            return "<?php echo app('App\\Helpers\\UrlHelper')->generateWhatsAppUrl($expression); ?>";
        });
    }
}
