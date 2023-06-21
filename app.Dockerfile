FROM php:8.1-fpm

WORKDIR /var/www

#COPY ./docker-php-entrypoint /usr/local/bin/docker-php-entrypoint

#COPY ./src .

RUN apt-get update && apt-get install -y git openssl libonig-dev libzip-dev zip unzip libmcrypt-dev libxml2-dev \
    libmagickwand-dev librabbitmq-dev  --no-install-recommends supervisor -y

RUN docker-php-ext-install gd zip xml pdo mbstring pdo_mysql soap bcmath sockets

RUN docker-php-ext-configure soap --enable-soap

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer require predis/predis
 
 
#RUN composer install --prefer-dist --no-dev