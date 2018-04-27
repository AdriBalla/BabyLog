FROM php:7.1-fpm

RUN apt-get update

RUN apt-get install -y git

RUN apt-get install -y zip unzip

ADD ./scripts /scripts

RUN sh /scripts/install_composer.sh

RUN apt-get install -y \
    libmcrypt-dev && \
    docker-php-ext-install pdo_mysql mcrypt