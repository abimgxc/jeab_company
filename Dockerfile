FROM richarvey/nginx-php-fpm:3.1.6

COPY . /var/www/html

# 1. Instalamos Node.js para que Render pueda compilar tu diseño
RUN apk add --no-cache nodejs npm

# 2. Creamos la base de datos y damos permisos
RUN mkdir -p /var/www/html/storage/framework/views \
             /var/www/html/storage/framework/cache \
             /var/www/html/storage/framework/sessions \
             /var/www/html/database \
    && touch /var/www/html/database/database.sqlite \
    && chmod -R 777 /var/www/html/storage /var/www/html/database

# 3. Compilamos Tailwind CSS y Vite mágicamente
RUN cd /var/www/html && npm install && npm run build

ENV WEBROOT /var/www/html/public
ENV APP_ENV production
ENV RE_RUN_COMPOSER true

EXPOSE 80