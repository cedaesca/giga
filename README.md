# Giga IT Technical Test

## Requirements

-   PHP 8.2 (The 8.3 version breaks some packages, make sure you're on 8.2)
-   MySQL (Tested on 8.0, probably works on lower versions)
-   Nodejs ^20.10.0 (Probably works on lower versions too, but was tested using this one)
-   You must have the `pdo_sqlite` extension enabled in your `php.ini` to run the tests.

## Installation

-   Clone the repo using either ssh `git clone git@github.com:cedaesca/gigatest.git` or http `git clone https://github.com/cedaesca/gigatest.git`
-   Copy the `.env.example` file into `.env` with `cp .env.example .env`
-   Update the database connection variables in your `.env` file to match your local configuration
-   Install the composer dependencies: `composer install`
-   Install the npm dependencies: `npm install`
-   Compile the css and js assets: `npm run build`
-   Serve the application with `php artisan serve` or the server of your preference.

## Scripts

-   Run tests: `php artisan test`
-   Run static code analysis: `composer run code-analysis`
