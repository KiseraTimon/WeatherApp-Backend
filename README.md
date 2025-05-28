<h1 align="center">

    WEATHERAPP-BACKEND

*Empowering seamless weather insights, anytime, anywhere.*

![Last Commit](https://img.shields.io/github/last-commit/kiseratimon/weatherapp-backend)
![blade](https://img.shields.io/badge/blade-57.1%25-blue)
![Languages](https://img.shields.io/github/languages/count/kiseratimon/weatherapp-backend)

---
<p>
🚀 Built with the tools and technologies

![JSON](https://img.shields.io/badge/-JSON-black?logo=json)
![Markdown](https://img.shields.io/badge/-Markdown-000000?logo=markdown)
![npm](https://img.shields.io/badge/-npm-CB3837?logo=npm)
![Composer](https://img.shields.io/badge/-Composer-885630?logo=composer)
![JavaScript](https://img.shields.io/badge/-JavaScript-yellow?logo=javascript)
![XML](https://img.shields.io/badge/-XML-0060aa?logo=xml)
![PHP](https://img.shields.io/badge/-PHP-8892BF?logo=php)
![Vite](https://img.shields.io/badge/-Vite-646CFF?logo=vite)
![Axios](https://img.shields.io/badge/-Axios-5A29E4?logo=axios)
</p>
</h1>

---

## 📚 Table of Contents

- [Introduction](#introduction)
- [Prerequisites](#prerequisites)
- [Getting Started](#getting-started)
- [Project Structure](#project-structure)
- [Usage](#usage)
- [Future Possible Enhancements](#future-possible-enhancements)
- [Acknowledgements](#acknowledgements)
- [Assets](#assets)

## Introduction

This is a Laravel backend application in a decoupled structure. The frontend is implemented using NextJS.
Use the access link below to check it out:
[NextJS Frontend](https://github.com/KiseraTimon/WeatherApp-Frontend.git)

The project in general is an API service that fetches weather data from the OpenWeather resource.
The frontend, powered by NextJS, creates the necessary user interface to present retrieved information.
The backend, powered by Laravel - The PHP Framework, performs the API requests and prepares it for presentation.

For this repository, we will focus on the backend.

## Prerequisites

For the seamless running of this application, you will require:

- PHP
- Composer
- Laravel

Some of these packages require being added to your environment variables.
Therefore, make sure they are properly configured for your system before resuming with this project

## Getting Started

Setup the new project workspace in the directory of your choice

1. Installing Laravel Project

    You can change `backend` to fit the name you want for your project

    ```bash
    composer create-project laravel/laravel backend
    ```

    ```bash
    cd backend
    ```

2. Project Configuration

    This particular project implements Cross-Origin Resource Sharing (CORS).
    This technology works as a security feature implemented to prevent unwanted requests to the backend from unauthorized domains

    This is configured using the following command:

    ```bash
    php artisan config:publish cors
    ```

    The `cors.php` file will be located inside `config\cors.php`.
    Populate it correctly with the `cors.php` file provided in the `assets` section of this document

3. Pulling Repository

    With the laravel backend installed and the configuration complete, you can now pull this repository into your project

    In case you don't have the repository yet:

    ```bash
    git clone https://github.com/KiseraTimon/WeatherApp-Backend.git
    ```

    Then 'cd' into the directory

    In case you have cloned the repository already:

    ```bash
    git pull origin master
    ```

## Project Structure

By the end of the installation, your frontend directory should look like this:

```t
├── app/             # Laravel service providers
├── bootstrap/       # Bootstrap service provider
├── database/        # Laravel migrations
├── logs/            # Contains log files for errors during development
├── public/          # Contains globally accessible assets of your project
├── resources/       # General project assets (css, js, imgs etc)
├── routes/          # Contains endpoints for web pages and APIs
├── storage/         # Preinstalled package holding backend data
├── store/           # Can hold your reference/scrapped codes
├── tests/           # Laravel test environment
├── vendor/          # Pre-installed package
├── .editorconfig    # Code editor laravel configurations
├── .env             # Project secret keys
├── .env.example     # Secret key file template
├── .gitattributes   # Git attributes file
├── .gitinore        # Git ignore file
├── artisan          # Artisan terminal control file
├── composer.json    # Composer file
├── composer.lock    # Composer file
├── issue.txt        # Contains app issue details to the latest commit
├── package.json     # Dependencies file
├── phpunit.xml      # Test file
├── vite.config.js   # Vite configuration file
└── README.md        # Project documentation
```

## Usage

With installation complete, run the command below on your terminal, within the directory

1. Starting Laravel Server

    Laravel programs come well packaged. After setting up the project, you can immediately start the server

    ```bash
    php artisan serve
    ```

    If you wish to have the server run on a specific port, use:

    ```bash
    php artisan serve --port=9999
    ```

2. Application

    If you cloned/pulled the repository correctly, within `routes\api.php` you should be able to find the API logic.
    You can tweak this to your preference.

    All constants used in the file are declared in the `.env` file in the root directory

## Future Possible Enhancements

The current API procedure does not return a lot of data.
As a future update, the application will be able to retrieve a vast amount of data to complement the quality of information available to the program's users

## Acknowledgements

[OpenWeather](https://openweathermap.org/) For providing the API to get weather data

## Assets

`config\cors.php` file.

You can modify the allowed origins to restrict the laravel server to only receive requests from certain domains
```t
<?php

return [

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
```
