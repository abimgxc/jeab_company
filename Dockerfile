FROM richarvey/nginx-php-fpm:3.1.6

COPY . /var/www/html

# 1. Instalamos Node.js y npm dentro del servidor para poder usar Vite
RUN apk add --no-cache nodejs npm

# 2. Creamos las carpetas de almacenamiento y base de datos con permisos
RUN mkdir -p /var/www/html/storage/framework/views \
             /var/www/html/storage/framework/cache \
             /var/www/html/storage/framework/sessions \
             /var/www/html/database \
    && touch /var/www/html/database/database.sqlite \
    && chmod -R 777 /var/www/html/storage /var/www/html/database

# 3. Instalar paquetes de estilos y compilarlos (Tailwind / Vite)
RUN cd /var/www/html && npm install && npm run build

ENV WEBROOT /var/www/html/public
ENV APP_ENV production
ENV RE_RUN_COMPOSER true
ENV RUN_MIGRATIONS true

EXPOSE 80