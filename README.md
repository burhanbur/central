## Requirement
This application requires PHP 8 and MySQL to run.

## Installation

Clone apps and install the dependencies

```sh
git clone https://burhanburdev@bitbucket.org/burhanburdev/suitcareer.git
cd src
composer update
```

Rename file .env.example to .env

## Impot Database Manual
- Create database suitcareer in MySQL
- Open folder schema and import file suitcareer.sql

## Create Database Automatic
```sh
cd src
php artisan migrate
php artisan db:seed
```

## Database Schema
![Alt text](/schema/schema.png?raw=true "Database Schema")