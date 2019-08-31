# Multi User Authentication Api with JWT and CRUD API Operations * Laravel 5.8

A simple multi guard authentication api with JWT. Two types of accounts are created, Users & Companies. Custom guards can also be created by the same process. API functions are listed below

* Multi user login/register
* Add, update, view & delete

## Getting Started

Download ZIP or clone this repository to test api.

## Usage

Login to create JWT token for accessing restricted endpoints. Once authenticated, add token generated to header with form-data if required. Add token by selecting **Authorization** as key and value should be **Bearer token-generated** in header.

### Prerequisites

These things are required to run this project

* [Composer](https://getcomposer.org/) - Dependency Manager
* [Laravel](https://laravel.com/docs/5.8) - Laravel 5.8
* [Postman](https://www.getpostman.com/downloads/) - Test API

### Installing

Make sure composer and laravel is installed. Check laravel and Composer through these commands

```
composer
```

And for checking laravel version

```
php artisan --version
```

Run composer update to update all dependencies
```
composer update
```

## Setting up database

Enter database credentials in .env file in root directory

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database-name
DB_USERNAME=database-username
DB_PASSWORD=database-password
```


### Run migrations

Run migrate command to create required database tables

```
php artisan migrate
```

## Endpoints

#### Register Routes
* Route: /user-register. Request type: POST. Form-data: name, email, password.
* Route: /companies-register. Request type: POST. Form-data: name, email, password.

#### Login Routes
* Route: /user-login. Request type: POST. Form-data: email, password.
* Route: /companies-login. Request type: POST. Form-data: email, password.

#### Products Routes (CRUD)
* Route: /users/add. Request type: POST. Form-data: name, price.
* Route: /users/view/{id}. Request type: POST.
* Route: /users/update/{id}. Request type: POST. Form-data: name, price.
* Route: /users/delete/{id}. Request type: POST.
* Route: /companies/add. Request type: POST. Form-data: name, price.
* Route: /companies/view/{id}. Request type: POST.
* Route: /companies/update/{id}. Request type: POST. Form-data: name, price.
* Route: /companies/delete/{id}. Request type: POST.


## Acknowledgments

* [laravelcode article](https://laravelcode.com/post/how-to-set-multi-authentication-in-jwt)
* [Jino Antony medium article](https://medium.com/@JinoAntony/multi-user-api-authentication-using-laravel-jwt-8ae572b0c4cf)
