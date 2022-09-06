php artisan font:cache
font-spider storage/app/font-cache/fonts.html
rm -rf ./public/fonts
mkdir ./public/fonts
cp -r ./resources/fonts ./public
cp storage/app/font-cache/fonts.css ./public/fonts
rm -rf ./public/fonts/*/.font-spider
