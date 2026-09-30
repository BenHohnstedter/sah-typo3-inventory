FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --no-scripts --no-progress

FROM php:8.2-apache
RUN apt-get update && apt-get install -y --no-install-recommends \
        libfreetype6-dev libjpeg62-turbo-dev libpng-dev libwebp-dev libzip-dev libicu-dev libonig-dev libxml2-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd intl mysqli pdo pdo_mysql mbstring zip fileinfo opcache
COPY --from=vendor /app/vendor /var/www/html/vendor
COPY . /var/www/html
ARG SITE_BASE=http://192.168.178.117:8086/
RUN sed -i "s|base: .*|base: '$SITE_BASE'|" /var/www/html/config/sites/main/config.yaml \
    && a2enmod rewrite \
    && mkdir -p /var/www/html/var /var/www/html/public/typo3temp /var/www/html/public/fileadmin \
    && chown -R www-data:www-data /var/www/html/var /var/www/html/public/typo3temp /var/www/html/public/fileadmin