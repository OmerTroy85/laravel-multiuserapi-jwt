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

####Register Routes
* Route: /user-register. Request type: POST. Form-data: 
* /companies-register (post)

####Login Routes
* /user-login (post)
* /companies-login (post)

####Products Routes (CRUD)
* /users/add (post)
* /users/view/{id} (post)
* /users/update/{id} (post)
* /users/delete/{id} (post)
* /companies/add/{id} (post)
* /companies/update/{id} (post)
* /companies/delete/{id} (post)


## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc
