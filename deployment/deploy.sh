#!/bin/sh

# Start PHP-FPM in the background
php-fpm -D

# Run migrations if database is ready
echo "Running migrations..."
php artisan migrate --force

# Optimize Laravel
echo "Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start Nginx in the foreground
echo "Starting Nginx..."
nginx -g "daemon off;"
