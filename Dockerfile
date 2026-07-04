FROM richarvey/nginx-php-fpm:3.1.6

COPY . /var/www/html

# Esto creará las carpetas limpias automáticamente en el servidor
RUN mkdir -p /var/www/html/storage/framework/views \
             /var/www/html/storage/framework/cache \
             /var/www/html/storage/framework/sessions \
    && chmod -R 775 /var/www/html/storage

ENV WEBROOT /var/www/html/public
ENV APP_ENV production
ENV RE_RUN_COMPOSER true

EXPOSE 80