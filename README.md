# ERP System — Phase 1

A modular ERP foundation using PHP 8.2+, MySQL 8+, PDO, Composer PSR-4 autoloading, MVC, repositories, services, middleware and RBAC. No PHP framework is used.

## Development credentials
- Email: `admin@example.com`
- Password: `Admin@12345`
- Change this password immediately outside development.

## Requirements
- PHP 8.2+
- MySQL 8+
- Composer
- PHP extensions: PDO, pdo_mysql, mbstring, json, openssl

## Installation
1. Create a MySQL database/user.
2. Copy `.env.example` to `.env` and configure credentials.
3. Run `mysql -u root -p < database/schema.sql`.
4. Run `mysql -u root -p < database/seeders/seed.sql`.
5. Run `composer install`.
6. Start: `php -S localhost:8000 -t public`.
7. Open `/login`.

## Architecture
Request -> Router -> Middleware -> Controller -> Service -> Repository -> PDO/MySQL.
Views are server-rendered and JavaScript modules can consume REST endpoints added in subsequent phases.

## Phase roadmap
1. Foundation/auth/RBAC/dashboard/users — current.
2. Organization + CRM.
3. Products + inventory.
4. Purchasing.
5. Sales + invoices + payments.
6. Accounting.
7. HR + attendance + leave + payroll.
8. Reports + notifications + audit UI.
9. REST API, tests, hardening and deployment.

## Production notes
Set `APP_ENV=production`, `APP_DEBUG=false`, use HTTPS, strong database credentials, restricted filesystem permissions, scheduled backups, and a real web server configuration that points the document root only to `/public`.
