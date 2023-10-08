#!/usr/bin/env bash

mc="
mc alias set client http://minio:9000 ${AWS_ACCESS_KEY_ID:-laravel} ${AWS_SECRET_ACCESS_KEY:-password};
mc mb client/${AWS_BUCKET:-local-bucket};
mc policy set public client/${AWS_BUCKET:-local-bucket};
"

artisan="
composer install
php artisan telescope:install
php artisan horizon:install
php artisan migrate
"

docker compose up -d
docker compose exec -u laravel app bash -c "$mc"
docker compose exec -u laravel app bash -c "$artisan"
