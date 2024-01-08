# TODO App

This is a simple TODO app that allows users to register, log in, and manage their tasks. It includes user and task CRUD operations, and admin permissions using Spatie Laravel Permissions.

## Features

- User Registration
- User Login/Logout
- Admin Permissions
- User CRUD Operations
- Task CRUD Operations

## Requirements

- PHP 7.4 or higher
- Composer
- Laravel 10
- MySQL or any other compatible database

## Installation

```bash
# Clone the repository
git clone https://github.com/yourusername/todo-app.git

# Navigate to the project directory
cd todo-app

# Create a .env file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure your database in the .env file

# Install dependencies
composer install

# Run migrations and seed the database
php artisan migrate --seed

# Install Spatie Laravel Permissions
composer require spatie/laravel-permission

# Start the development server
php artisan serve --host=0.0.0.0 --port=8000

