<?php

namespace Xdarko\LaravelFontCache;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Xdarko\LaravelFontCache\Commands\LaravelFontCacheCommand;

class LaravelFontCacheServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-font-cache')
            ->hasConfigFile()
            ->hasViews('font-cache')
            ->hasCommand(LaravelFontCacheCommand::class);
    }

    public function registeringPackage()
    {
        $this->app->singleton(FontCacheInterface::class, function ($app) {
            return new LaravelFontCache();
        });
    }

    public function packageBooted()
    {
        $this->publishes([
            $this->package->basePath('../scripts') => base_path('/'),
        ], "{$this->package->shortName()}-scripts");
    }
}
