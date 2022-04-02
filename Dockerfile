FROM fontebasso/php-nginx:latest

ADD ./deploy/nginx.conf /etc/nginx/nginx.conf
ADD ./deploy/php_custom_params.ini /usr/local/etc/php/conf.d/docker-php-ext-x-03-custom-params.ini
