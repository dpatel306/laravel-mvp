composer install
php artisan optimize:clear
# php artisan optimize
php artisan migrate
php-fpm -R