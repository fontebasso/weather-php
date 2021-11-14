# Weather - PHP

This application is a weather data api write in PHP.

Works with drivers, native support to OpenWeather.

## Motivation

Have a fully functional PHP application to use as an example in the articles: [PHP+NGINX with Docker in production](https://blog.fontebasso.com.br/php-nginx-with-docker-in-production-20ffdb73ec5b).

## Installation

1. Clone the repository
   ```shell
    git clone git@github.com:fontebasso/weather-php.git
   ```

2. Access base code directory of the project and install dependencies
    ```shell
    cd weather-php/src
    composer install
    ```

3. Create the .env file and change the values of the environment variables as per your case
    ```shell
    cp .env.example .env
    ```

## How to use

1. Start the service
    ```shell
    php -S 0.0.0.0:8080 -t ./public
    ```
   
2. Access your favorite browser in address with params to query:
   
   `http://127.0.0.1:8080/query?city=São Paulo&state=SP&country=BR`

## Expected

Return JSON with weather forecast or error message.

## Licença

The MIT License (MIT). See the [license file](LICENSE) for more information.
