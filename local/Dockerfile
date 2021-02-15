FROM php:7.4.11-fpm-alpine3.12

WORKDIR /app

RUN apk --update upgrade \
    && apk add --no-cache autoconf automake make gcc g++ icu-dev openssh-client \
    && pecl install xdebug-2.9.8 \
    && docker-php-ext-install -j$(nproc) \
        bcmath \
        opcache \
        intl \
    && docker-php-ext-enable \
        opcache

COPY local/php/ /usr/local/etc/php/

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

