# ==========================================
# FRONTEND BUILD
# ==========================================

FROM node:22-alpine AS frontend

WORKDIR /app

COPY package.json package-lock.json ./

RUN npm ci

COPY . .

RUN npm run build


# ==========================================
# PHP + APACHE
# ==========================================

FROM php:8.4-apache

RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libpq-dev \
    default-mysql-client \
    && docker-php-ext-install \
    pdo_mysql \
    pdo_pgsql \
    mbstring \
    zip \
    exif \
    pcntl \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# Copy Vite production build
COPY --from=frontend /app/public/build ./public/build

RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

# Laravel permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Public storage symlink
RUN ln -sfn /var/www/html/storage/app/public \
    /var/www/html/public/storage

# Apache document root => Laravel public folder
RUN sed -i 's!/var/www/html!/var/www/html/public!g' \
    /etc/apache2/sites-available/000-default.conf

# Allow .htaccess rewrite
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' \
    /etc/apache2/apache2.conf

EXPOSE 10000

CMD sed -i "s/Listen 80/Listen ${PORT:-10000}/" /etc/apache2/ports.conf \
    && sed -i "s/:80>/:${PORT:-10000}>/" /etc/apache2/sites-available/000-default.conf \
    && php artisan config:cache \
    && php artisan view:cache \
    && apache2-foreground