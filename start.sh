#!/bin/bash

PORT=${PORT:-9000}
php artisan migrate --force
php -S 0.0.0.0:$PORT -t public
