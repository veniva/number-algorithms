FROM php:7.2.3-cli-stretch

LABEL author="Ventsislav Ivanov"

COPY .docker/php.ini /usr/local/etc/php/
COPY . /var/www
WORKDIR /var/www

RUN apt-get update && \
        apt-get install -y --no-install-recommends \
            libzip-dev \
            git
RUN pecl install zip
RUN php composer.phar install




