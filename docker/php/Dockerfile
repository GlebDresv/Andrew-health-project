FROM php:8-fpm

WORKDIR /app
RUN apt-get update && apt-get upgrade -y && \
    apt-get install -y nodejs \
    npm
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get install zip
RUN apt-get install unzip
RUN apt-get install git
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
