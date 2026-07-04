FROM richarvey/nginx-php-fpm:3.1.6

COPY . /var/www/html

ENV WEBROOT /var/www/html/public
ENV APP_ENV production
ENV RE_RUN_COMPOSER true

EXPOSE 80