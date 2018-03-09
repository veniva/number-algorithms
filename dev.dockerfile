# Run this command inside the container to install dependencies if necessary
#php composer.phar install

FROM php:7.2.3-cli-stretch

LABEL author="Ventsislav Ivanov"

COPY .docker/php.ini /usr/local/etc/php/

# use below code if needing to setup PHP with extensions necessary to install composer dependencies
#RUN apt-get update && \
#        apt-get install -y --no-install-recommends \
#            libzip-dev \
#            git
#RUN pecl install zip && docker-php-ext-enable zip







