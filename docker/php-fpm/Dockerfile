FROM alpine:3.8

RUN apk add --update \
    php7-fpm \
    php7-apcu \
    php7-ctype \
    php7-curl \
    php7-dom \
    php7-gd \
    php7-iconv \
    php7-json \
    php7-intl \
    php7-mcrypt \
    php7-opcache \
    php7-openssl \
    php7-mbstring \
    php7-pdo \
    php7-pdo_mysql \
    php7-mysqli \
    php7-xml \
    php7-zlib \
    php7-phar \
    php7-tokenizer \
    php7-session \
    php7-simplexml \
    php7-xdebug \
    php7-pear \
    php7-dev \
    php7-zip \
    libsodium-dev \
    make \
    php7-xmlwriter \
    g++ \
    curl

RUN pecl install libsodium

RUN rm -rf /var/cache/apk/* && rm -rf /tmp/* && \
    curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer

ADD symfony.ini /etc/php7/php-fpm.d/
ADD symfony.ini /etc/php7/cli/conf.d/
ADD xdebug.ini  /etc/php7/conf.d/
ADD libsodium.ini  /etc/php7/conf.d/

ADD symfony.pool.conf /etc/php7/php-fpm.d/

CMD ["php-fpm7", "-F"]

WORKDIR /app
EXPOSE 9000