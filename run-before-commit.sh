#!/usr/bin/env bash

artisan="
php artisan ide-helper:generate
./vendor/bin/pint
"
docker compose exec -u laravel app bash -c "$artisan"
