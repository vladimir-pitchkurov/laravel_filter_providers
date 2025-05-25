#!/bin/bash

set -e

cd /var/www

composer install --no-interaction --prefer-dist --optimize-autoloader

if [ ! -f .env ]; then
    cp .env.example .env
fi

php artisan key:generate --force

echo "Waiting MySQL..."
until php artisan db:connect; do
    sleep 5
done

php artisan migrate --force
php artisan db:seed --force

