FROM php:8-fpm

RUN docker-php-ext-install \
     pdo \
     pdo_mysql \
     mysqli
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

RUN apt-get update
RUN apt-get install -y git zip unzip