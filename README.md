# IT Management System

## Getting Started

1. Clone or download the repository
2. Move into the project directory
3. Install laravel dependencies using ``composer install``
4. Install npm dependencies using ``npm install``
5. Copy ``.env.example `` file to ``.env`` on the root folder
6. Open your .env file and change the database name (DB_DATABASE) to your database name, username (DB_USERNAME) and password (DB_PASSWORD) field to correspond to your configuration.
7. Generate app encryption key using ``php artisan key:generate``
8. Run ``php storage:link``  to connect public folder to storage folder
9. Generate users and admin using ``php artisan db:seed``
 - email: admin@example.com
 - username: admin1
 - password: password
10. Run ``php artisan serve`` to display the project
11. Run ``npm run dev`` to compile CSS and JavaScript

## Application Features

- There is no registration form. Admin can only register users inside of the application
- Has Multi-Authentication...Admin Authentication and User Authentication

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

