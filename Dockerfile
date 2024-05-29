FROM php:8.3-fpm-alpine

RUN apk update && apk add --no-cache libpng-dev libzip-dev zlib-dev
RUN docker-php-ext-install pdo pdo_mysql gd zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .
RUN cp .env.example .env

RUN composer install --optimize-autoloader --no-dev

CMD ["php-fpm"]
