FROM php:7.2.3-cli-stretch

LABEL author="Ventsislav Ivanov"

COPY . /var/www
WORKDIR /var/www

RUN php composer.phar install




