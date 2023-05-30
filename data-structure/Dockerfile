FROM php:8.2-fpm

RUN apt-get update && apt-get upgrade -y

# RUN pecl config-set php_ini  /usr/local/etc/php/php.ini
# RUN pecl config-set php_ini  /usr/local/etc/php/php.ini-development
# RUN pecl config-set php_ini  /usr/local/etc/php/conf.d/docker-fpm.ini

RUN pecl install ds && docker-php-ext-enable ds

# RUN echo "extension=ds.so" > /usr/local/etc/php/php.ini

WORKDIR /var/www/html

EXPOSE 8080