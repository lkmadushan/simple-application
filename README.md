# Getting started

## Installation

Please check the official Laravel 8 installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x/installation)

Switch to the repo folder

    cd simple-application

Install all backend the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Generate new passport encryption keys

    php artisan passport:keys

Create personal access client

    php artisan passport:client --personal

Update following section of the `.env` file to configure database connection

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your-database-name-here
    DB_USERNAME=database-username-here
    DB_PASSWORD=database-password-here

Run the database migrations and seeds (**Set the database connection in .env before migrating**)

    php artisan migrate --seed

Run test suite

    ./vendor/bin/phpunit
