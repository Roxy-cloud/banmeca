FROM php:8.2-fpm

WORKDIR /var/www/html

COPY . .

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql pdo_pgsql


CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
