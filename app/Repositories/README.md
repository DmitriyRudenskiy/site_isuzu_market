## Composer
docker run --rm -v /Users/user/PhpstormProjects/site_isuzu_market:/app -w /app composer/composer:1.0-php5-alpine /bin/sh

## Run server
docker restart work-mysql

docker run --name work-php \
    --link  work-mysql:db -p 8085:8085  \
    -v '/Users/user/PhpstormProjects/site_isuzu_market:/app' \
    -w '/app' \
    --rm -i -t -d my/php php -S 0.0.0.0:8085 -t public/

docker exec -it work-php sh

## Check format code
cd test
../bin/phing

phpcs --standard=LaravelCodeSniffer/Standards/Laravel/  /path/to/your/project/files
vendor/bin/phpcs --standard=vendor/pragmarx/laravelcs/Standards/Laravel/ ./app

vendor/bin/phpcbf --standard=vendor/pragmarx/laravelcs/Standards/Laravel/ ./app

## Tests
php vendor/bin/phpunit

## Start
php artisan key:generate
php artisan migrate
php artisan create:user

php artisan db:seed --class=BanksTableSeeder
php artisan db:seed --class=CarTypesTableSeeder
php artisan db:seed --class=CarCategoriesTableSeeder
php artisan db:seed --class=CarBasesTableSeeder
php artisan db:seed --class=CarPricesTableSeeder

