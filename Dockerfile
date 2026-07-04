FROM richarvey/nginx-php-fpm:3.1.6

COPY . /var/www/html

# 1. Crear las carpetas necesarias y preparar la base de datos
RUN mkdir -p /var/www/html/storage/framework/views \
             /var/www/html/storage/framework/cache \
             /var/www/html/storage/framework/sessions \
             /var/www/html/database \
             /var/www/html/scripts \
    && touch /var/www/html/database/database.sqlite \
    && chmod -R 777 /var/www/html/storage /var/www/html/database

# 2. Crear el script automático llamando específicamente a CompanySeeder
RUN echo '#!/bin/bash' > /var/www/html/scripts/00-setup.sh \
    && echo 'cd /var/www/html' >> /var/www/html/scripts/00-setup.sh \
    && echo 'php artisan migrate --force' >> /var/www/html/scripts/00-setup.sh \
    && echo 'php artisan db:seed --class=CompanySeeder --force' >> /var/www/html/scripts/00-setup.sh \
    && chmod +x /var/www/html/scripts/00-setup.sh

# 3. Variables de entorno
ENV WEBROOT /var/www/html/public
ENV APP_ENV production
ENV RE_RUN_COMPOSER true
ENV RUN_SCRIPTS 1

EXPOSE 80
