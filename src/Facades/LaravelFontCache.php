<?php

namespace Xdarko\LaravelFontCache\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Xdarko\LaravelFontCache\LaravelFontCache
 */
class LaravelFontCache extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Xdarko\LaravelFontCache\LaravelFontCache::class;
    }
}
