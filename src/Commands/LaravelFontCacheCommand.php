<?php

namespace Xdarko\LaravelFontCache\Commands;

use Illuminate\Console\Command;

class LaravelFontCacheCommand extends Command
{
    public $signature = 'laravel-font-cache';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
