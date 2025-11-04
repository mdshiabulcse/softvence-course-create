FROM php:8.1-fpm-alpine

WORKDIR /var/www/html

# Install only what's needed
RUN apk add --no-cache postgresql-dev libzip-dev zip unzip curl \
    && docker-php-ext-install pdo pdo_pgsql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Fix permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 9000
CMD ["php-fpm"]
