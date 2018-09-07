FROM php:7.2-fpm

MAINTAINER grizmar <grizmar5@gmail.com>

RUN apt-get update && apt-get install -y --no-install-recommends apt-utils \
curl \
wget \
git \
libfreetype6-dev \
libjpeg62-turbo-dev \
libxslt-dev \
libicu-dev \
libpng-dev \
libxml2-dev \
&& docker-php-ext-install -j$(nproc) mysqli pdo_mysql \
&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
&& docker-php-ext-install -j$(nproc) gd \
&& docker-php-ext-configure intl && docker-php-ext-install intl \
&& docker-php-ext-install xsl \
&& docker-php-ext-install soap

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && cat /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini >> /usr/local/etc/php/php.ini \
    && rm /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini

WORKDIR /var/www/

CMD ["php-fpm"]