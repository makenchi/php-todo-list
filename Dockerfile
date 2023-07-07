FROM php:apache

RUN docker-php-ext-install mysqli
RUN a2enmod rewrite
COPY config/php.ini /usr/local/etc/php/
