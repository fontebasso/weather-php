FROM fontebasso/php-nginx:latest

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
