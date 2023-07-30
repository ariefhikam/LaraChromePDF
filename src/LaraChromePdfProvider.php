<?php

namespace Ariefhikam\LaraChromePdf;

use Ariefhikam\LaraChromePdf\Pdf;
use Illuminate\Support\ServiceProvider;

class LaraChromePdfProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/chrome-pdf.php' => config_path('chrome-pdf.php'),
        ]);
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/chrome-pdf.php', 'chrome-pdf'
        );
    }
}
