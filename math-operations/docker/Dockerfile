FROM php:8.1.0-apache

RUN apt-get update && apt-get install -y \
       libmcrypt-dev \
       iproute2 \
       libxml2-dev \
       libmemcached-dev \
       zlib1g-dev \
    && pecl install redis \
    && pecl install memcached-3.1.5 \
	&& pecl install xdebug-3.1.0 \
	&& docker-php-ext-install -j$(nproc) \
        opcache \
        mysqli \
        pdo_mysql \
        soap \
	&& docker-php-ext-enable \
	    redis \
	    opcache \
	    xdebug \
	    memcached 

COPY apache/apache2.conf /etc/apache2/conf/extra/apache2.conf 
COPY apache/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY custom-entrypoint.sh /usr/local/bin/custom-entrypoint

RUN a2enmod rewrite \
    && a2enmod ssl \
    && service apache2 restart \
    && chmod +x /usr/local/bin/custom-entrypoint


# mac / linux
ARG OS
ENV SO $OS
CMD ["sh", "-c", "custom-entrypoint $SO"]
