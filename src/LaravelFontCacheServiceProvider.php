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
            ->hasViews()
            ->hasMigration('create_laravel-font-cache_table')
            ->hasCommand(LaravelFontCacheCommand::class);
    }
}
