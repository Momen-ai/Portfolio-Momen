#!/bin/sh
set -e # Exit on error

# Start PHP-FPM in the background
echo "Starting PHP-FPM..."
php-fpm -D

# Clear caches and run discovery
echo "Discovering packages..."
php artisan package:discover --ansi

echo "Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Ensure storage links exist
echo "Creating storage link..."
php artisan storage:link --force || true

# Run migrations if database is ready
echo "Running migrations..."
php artisan migrate --force

# Start Nginx in the foreground
echo "Starting Nginx..."
nginx -g "daemon off;"
