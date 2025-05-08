FROM composer:latest AS build

COPY ./src /machtec
WORKDIR /machtec

RUN composer install
RUN composer update
RUN composer dump-autoload

FROM php:8.3-apache AS app

RUN a2enmod rewrite

COPY --from=build /machtec /var/www/html

EXPOSE 80