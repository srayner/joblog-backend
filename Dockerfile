FROM php:8.0-apache

RUN apt-get update
RUN apt-get upgrade -y
RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT /var/www/html

COPY . /var/www/html
RUN mkdir /var/www/html/var
RUN chown www-data:www-data /var/www/html/var
COPY apache.conf /etc/apache2/sites-enabled/joblog.conf
RUN rm /etc/apache2/sites-enabled/000-default.conf
