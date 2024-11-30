# Laravel API project

## Overview
 Laravel API project is a simple Laravel-based RESTful API that provides CRUD (Create, Read, Update, Delete) operations for managing video resources. This API is built using Laravel and utilizes Sanctum for authentication, making it secure and easy to use.

## Features
- **CRUD Operations**: Create, read, update, and delete video resources.
- **Authentication**: Secure API access using Laravel Sanctum.
- **RESTful Design**: Follows RESTful principles for API design.
- **Easy to Use**: Simple endpoints for managing video data.

## Requirements
- PHP >= 7.3
- Composer
- Laravel >= 8.x
- MySQL or any other supported database

## Installation

1. **Clone the Repository**
   ```bash
   git clone git@github.com:ahmedmohamedabdall/traverse-video.git
   cd traverse-video
2.Install Dependencies

bash

composer install

3.Set Up Environment File Copy the .env.example file to .env and configure your database settings.

bash

cp .env.example .env

4.Generate Application Key

bash

php artisan key:generate

5.Run Migrations

bash

php artisan migrate

6.Start the Development Server

bash

php artisan serve
