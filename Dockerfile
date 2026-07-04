FROM richarvey/nginx-php-fpm:3.1.6

COPY . /var/www/html

# 1. Creamos las carpetas y un archivo vacío para la base de datos SQLite
RUN mkdir -p /var/www/html/storage/framework/views \
             /var/www/html/storage/framework/cache \
             /var/www/html/storage/framework/sessions \
             /var/www/html/database \
    && touch /var/www/html/database/database.sqlite \
    && chmod -R 777 /var/www/html/storage /var/www/html/database

ENV WEBROOT /var/www/html/public
ENV APP_ENV production
ENV RE_RUN_COMPOSER true

# 2. Obligamos a ejecutar las migraciones al arrancar
ENV RUN_MIGRATIONS true

EXPOSE 80