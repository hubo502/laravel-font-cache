<?php

namespace Xdarko\LaravelFontCache;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class LaravelFontCache implements FontCacheInterface
{
    public function cacheFont()
    {
        $strings = '';
        $urls = self::resolvePageUrls();

        $urls->each(function ($url) use (&$strings) {
            $strings .= self::fetchChnStrings($url);
        });

        $strings = self::characterUnique($strings);
        info('chinese characters:', ['text' => $strings, 'length' => strlen($strings)]);
        self::renderCache($strings);
        self::renderCss();
    }

    public static function renderCss()
    {
        $fontFamilies = config('font-cache.fontFamilies');
        $css = view('font-cache::css', compact('fontFamilies'))->render();
        Storage::disk('local')->put('font-cache/fonts.css', $css);
    }

    public static function renderCache($strings)
    {
        $fontFamilies = config('font-cache.fontFamilies');
        $fontPath = config('font-cache.fontPath', resource_path('fonts'));
        $html = view('font-cache::index', compact('strings', 'fontFamilies', 'fontPath'))->render();
        Storage::disk('local')->put('font-cache/fonts.html', $html);
    }

    public static function characterUnique($strings)
    {
        return implode('', array_unique(preg_split('/(?<!^)(?!$)/u', $strings)));
    }

    public static function resolvePageUrls()
    {
        $urls = collect();
        $sitemaps = config('font-cache.sitemaps');

        info('resolve page urls..');

        foreach ($sitemaps as $sitemap) {
            $urls = $urls->merge(self::resolveSitemapUrls($sitemap));
        }

        return $urls;
    }

    public static function resolveSitemapUrls($sitemap = null)
    {
        if (! $sitemap) {
            return [];
        }

        info("read {$sitemap}..");
        $resp = Http::get(url($sitemap));
        $data = self::parseXML($resp->body());

        $data = data_get($data, 'url');

        if (isset($data['loc'])) {
            return [$data['loc']];
        }

        return collect($data)->transform(function ($row) {
            return data_get($row, 'loc');
        })->values();
    }

    public static function parseXML($string)
    {
        $xml = simplexml_load_string($string);
        $json = json_encode($xml);

        return json_decode($json, true);
    }

    public static function fetchChnStrings($url)
    {
        info('fetch chn strings - '.$url);
        $resp = Http::get($url);
        $matched = null;
        preg_match_all('/[\x{4e00}-\x{9fff}]+/u', $resp->body(), $matched);

        return implode('', $matched[0]);
    }
}
