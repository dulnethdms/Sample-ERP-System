# Installation

1. Install PHP 8.2+, MySQL 8+ and Composer.
2. Clone/copy this project.
3. `cp .env.example .env` and set DB values.
4. `composer install`.
5. Import `database/schema.sql`, then `database/seeders/seed.sql`.
6. Ensure `storage/` and `public/uploads/` are writable only as required by the web server.
7. Run `php -S localhost:8000 -t public` for development.
