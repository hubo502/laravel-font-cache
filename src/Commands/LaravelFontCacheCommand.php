<?php

namespace Xdarko\LaravelFontCache\Commands;

use Illuminate\Console\Command;
use Xdarko\LaravelFontCache\FontCacheInterface;

class LaravelFontCacheCommand extends Command
{
    public $signature = 'font:cache';

    public $description = '缓存生成字体文件';

    public function handle(): int
    {
        app(FontCacheInterface::class)->cacheFont();
        $this->comment('操作完成');
        return self::SUCCESS;
    }
}
