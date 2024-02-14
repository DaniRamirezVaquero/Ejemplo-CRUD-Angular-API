FROM php:8.3.3RC1-apache-bookworm
RUN docker-php-ext-install mysqli
