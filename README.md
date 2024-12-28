    <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

    <p align="center">
    <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
    </p>

    ## Laravel Fleet Management System

    This project is a Laravel-based Fleet Management System that allows users to manage bus bookings, seats, and trips. It includes features for checking available seats, booking seats, and managing trips and stations.


    ## Features

    View available seats based on start and end stations.
    Book seats for trips.
    Manage trips, buses, and stations.
    User authentication for web and API.
    Integrated with MySQL for data storage.
    Dockerized for easy development and deployment

    ## Requirements
    PHP 8.2 or higher
    MySQL
    Composer
    Node.js & npm (for front-end assets)
    Docker (optional, for containerized deployment)

    ### Authentication
    his project includes authentication for both web and API:

    Web Authentication:

    Login and registration forms for users.
    Protect routes using middleware like auth.
    API Authentication:

    Register and login endpoints using Laravel Sanctum.
    Protected API routes require a valid token.



    ### Getting Started
    These instructions will help you get the project up and running on your local machine using Docker.

    1. Clone the repository

    git clone https://github.com/your-username/fleet-management.git
    cd fleet-management

    2. Install PHP dependencies

    Run Composer to install the required PHP dependencies:

    - composer install

    3. Install Node.js Dependencies (Optional, for Front-End)

    npm install
    npm run dev


    3. Set up environment configuration
    Duplicate the .env.example file to create a .env file. This file contains your environment-specific settings:

    - cp .env.example .env
    Then, update the .env file with your database credentials. For example:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=fleet_management
    DB_USERNAME=root
    DB_PASSWORD=

    4. Generate the application key
    Run the following Artisan command to generate your application key:
    - php artisan key:generate

    5. Set up the database
    Create the database and run migrations to set up the necessary tables:

    - php artisan migrate

    Optionally, you can seed the database with some initial data:
    - php artisan db:seed

    ### Running the Application
    Start the local development server:

    - php artisan serve
    By default, the application will be accessible at http://localhost:8000.
    ### API Authentication Setup
    Register
    Endpoint: POST /api/register
    Body:
    {
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
    }
    Login
    Endpoint: POST /api/login
    Body:
    {
    "email": "john@example.com",
    "password": "password123"
    }

    Logout
    Endpoint: POST /api/logout
    Header: Authorization: Bearer YOUR_API_TOKEN

    ### Docker Instructions

    To run the application using Docker, follow these steps:

    Build and start the Docker containers:
    docker-compose build

    Run migrations inside the app container:

    docker-compose exec app bash
    php artisan migrate

    Access the application at http://localhost:8000.

    ### Testing
    To run the tests for this application, use PHPUnit. To run all tests, use:

    - php artisan test

    For testing in Docker:  

    - docker-compose exec app bash
    - php artisan test

   
    ### Project Structure

    - **[app/](Contains the core application code (Controllers, Models, Services))**
    - **[config](Configuration files for the Laravel application)**
    - **[database](Database migrations and seeders)**
    - **[docker-compose.yml](Docker Compose configuration for services like the app and database)**
    - **[Dockerfile]( Defines the PHP environment and dependencies for the Laravel app)**
    - **[.env](Environment configuration file used by Laravel (e.g., database credentials))**
    - **[resources]( Views and resources (including assets like CSS, JavaScript))**
    - **[routes](Defines the routes of the application)**
    - **[tests](Contains the unit and feature tests.)**

    ## Testing

    Unit Tests
    To run the unit tests, make sure the containers are up and running, then execute the following command:
    - docker-compose exec app bash
    - php artisan test
    This will run all the unit tests and display the results in your terminal.

    Database Tests
    Ensure that the database is correctly set up before running tests. The php artisan migrate command will create the necessary tables for you.

    ## Acknowledgments

    Laravel Framework (https://laravel.com)
    Docker (https://www.docker.com)
    MySQL (https://www.mysql.com)
