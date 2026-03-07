# Build stage for assets
FROM node:20-alpine AS build
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# Final stage for PHP
FROM php:8.3-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    nginx \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    oniguruma-dev \
    postgresql-client \
    icu-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql pgsql mbstring zip bcmath intl opcache

# Copy composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy application files
COPY . .
COPY --from=build /app/public/build ./public/build

# Install dependencies (ignoring scripts during build to prevent discovery errors)
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copy Nginx config
COPY deployment/nginx.conf /etc/nginx/http.d/default.conf

# Deployment script
COPY deployment/deploy.sh /usr/local/bin/deploy
RUN chmod +x /usr/local/bin/deploy

EXPOSE 80

CMD ["/usr/local/bin/deploy"]
