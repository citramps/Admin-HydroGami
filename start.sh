#!/bin/bash

php artisan migrate --force

# Gunain default port dari Railway
php -S 0.0.0.0:$PORT -t public
