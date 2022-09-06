#Laravel中文字体缩减体积

## 原理
- 读取sitemap.xml中的url
- 读取各个url对应的页面，从中抽取中文字符
- 将中文字符缓存到fonts.html文件中
- 利用font-spider 对fonts.html进行瘦身


## 使用

```bash 
# 使用自带的scripts
php artisan vendor:publish --tag=font-cache-scripts

# 自定义设置
php artisan vendor:publish --tag=font-cache-config
```
