FROM php:8.2-cli AS vendor
RUN apt-get update && apt-get install -y --no-install-recommends \
        libicu-dev libzip-dev git unzip \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install -j$(nproc) intl zip
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY . /app
WORKDIR /app
RUN composer install --no-dev --no-interaction --prefer-dist --no-progress

FROM php:8.2-apache
RUN apt-get update && apt-get install -y --no-install-recommends \
        libfreetype6-dev libjpeg62-turbo-dev libpng-dev libwebp-dev libzip-dev libicu-dev libonig-dev libxml2-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd intl mysqli pdo pdo_mysql mbstring zip fileinfo opcache
COPY --from=vendor /app/vendor /var/www/html/vendor
COPY . /var/www/html
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
ARG SITE_BASE=http://192.168.178.117:8086/
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf \
    && sed -i "s|base: .*|base: '$SITE_BASE'|" /var/www/html/config/sites/main/config.yaml \
    && a2enmod rewrite \
    && mkdir -p /var/www/html/var /var/www/html/public/typo3temp /var/www/html/public/fileadmin \
    && chown -R www-data:www-data /var/www/html/var /var/www/html/public/typo3temp /var/www/html/public/fileadmin