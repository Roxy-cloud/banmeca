# Usa PHP 8.2 con FPM
FROM php:8.2-fpm

# Define el directorio de trabajo
WORKDIR /var/www/html

# Instala Composer antes de copiar archivos del proyecto
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instala dependencias del sistema necesarias para Laravel y PostgreSQL
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql pdo_pgsql zip


# Copia los archivos del proyecto al contenedor
COPY . .

# Instala las dependencias de Laravel en modo producción
RUN composer install --no-dev --optimize-autoloader


# Asegura permisos correctos en las carpetas necesarias
RUN chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

# Comando para iniciar el servidor de Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

