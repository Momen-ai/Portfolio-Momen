#!/bin/sh

# Start PHP-FPM in the background
php-fpm -D

# Clear caches and run discovery (since we skipped it during build)
echo "Discovering packages..."
php artisan package:discover --ansi

echo "Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations if database is ready
echo "Running migrations..."
php artisan migrate --force

# Start Nginx in the foreground
echo "Starting Nginx..."
nginx -g "daemon off;"
