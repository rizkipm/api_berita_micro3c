FROM php:8.2-apache

#install mysqli extension
RUN docker-php-ext-install mysqli pdo pdo_mysql

#aktifkan mode rewrite untuk apache
RUN a2enmod rewrite

#mengatur direktori kerja di dalam container
WORKDIR /var/www/html
