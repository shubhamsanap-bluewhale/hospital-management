# Smart Hospital (CodeIgniter 3.1.6) - container image for Railway.
# PHP 7.4 is used on purpose: this CodeIgniter version does not run on PHP 8.
FROM php:7.4-apache

# PHP extensions the app uses (same set as the working local PHP 7.4 install).
# Debian 11 (the base of the PHP 7.4 image) may have moved to archive.debian.org;
# if the normal mirror fails, fall back to the archive.
RUN set -eux; \
    if ! apt-get update; then \
        sed -i -e 's|deb.debian.org|archive.debian.org|g' \
               -e '/security.debian.org/d' -e '/bullseye-updates/d' /etc/apt/sources.list; \
        apt-get -o Acquire::Check-Valid-Until=false update; \
    fi; \
    apt-get install -y --no-install-recommends \
        libpng-dev libjpeg62-turbo-dev libfreetype6-dev libzip-dev; \
    docker-php-ext-configure gd --with-freetype --with-jpeg; \
    docker-php-ext-install -j"$(nproc)" mysqli pdo_mysql gd zip bcmath exif calendar; \
    rm -rf /var/lib/apt/lists/*

# Apache: enable .htaccess rewrites (clean URLs like /site/login) and silence the ServerName warning.
RUN a2enmod rewrite headers \
    && sed -ri 's!AllowOverride None!AllowOverride All!g' /etc/apache2/apache2.conf \
    && echo 'ServerName localhost' > /etc/apache2/conf-enabled/servername.conf

COPY docker/php.ini /usr/local/etc/php/conf.d/smart-hospital.ini
COPY docker/railway-entrypoint.sh /usr/local/bin/railway-entrypoint.sh

WORKDIR /var/www/html
COPY . /var/www/html/

# Keep a copy of the shipped uploads so an empty Railway volume can be seeded on first start.
RUN sed -i 's/\r$//' /usr/local/bin/railway-entrypoint.sh \
    && chmod +x /usr/local/bin/railway-entrypoint.sh \
    && cp -a /var/www/html/uploads /opt/uploads-seed \
    && chown -R www-data:www-data /var/www/html

EXPOSE 8080
CMD ["railway-entrypoint.sh"]
