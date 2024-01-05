# Giga IT Technical Test

## Requirements

-   PHP 8.2 (The 8.3 version breaks some packages, make sure you're on 8.2)
-   Nodejs ^20.10.0 (Probably works on lower versions too, but was tested using this one)

## Installation

-   Clone the repo using either ssh `git clone git@github.com:cedaesca/gigatest.git` or http `git clone https://github.com/cedaesca/gigatest.git`
-   Copy the `.env.example` file into `.env` with `cp .env.example .env`
-   Update the database variables in your `.env` file
-   Install the composer dependencies: `composer install`
-   Install the npm dependencies: `npm install`
-   Compile the css and js assets: `npm run build`
-   Serve the application with whatever server you use.

## Scripts

-   Run tests: `php artisan test`
-   Run static code analysis: `composer run code-analysis`
