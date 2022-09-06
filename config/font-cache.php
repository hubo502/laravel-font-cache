<?php

// config for Xdarko/LaravelFontCache
return [
    'sitemaps' => ['sitemap.xml'],//从sitemap中抓取中文字符
    'fontPath' => resource_path('fonts'),//字体文件的根目录
    'fontFamilies' => [
        'light' => ['family' => 'alibaba', 'file' => 'Alibaba-PuHuiTi-Light.ttf', 'type' => 'truetype', 'weight' => 100],
        'regular' => ['family' => 'alibaba', 'file' => 'Alibaba-PuHuiTi-Regular.ttf', 'type' => 'truetype', 'weight' => 300],
        'medium' => ['family' => 'alibaba', 'file' => 'Alibaba-PuHuiTi-Medium.ttf', 'type' => 'truetype', 'weight' => 500],
        'bold' => ['family' => 'alibaba', 'file' => 'Alibaba-PuHuiTi-Bold.ttf', 'type' => 'truetype', 'weight' => 700],
        'black' => ['family' => 'alibaba', 'file' => 'Alibaba-PuHuiTi-Heavy.ttf', 'type' => 'truetype', 'weight' => 900],
    ],//字体文件配置,文件请按照{fontPath}/{family}/{file}的路径存放
];
