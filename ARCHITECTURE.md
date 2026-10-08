# Architecture

## Layers
- Core: request, response, router, database, auth, CSRF, service container.
- Controllers: HTTP orchestration only.
- Services: business workflows.
- Repositories: parameterized SQL and persistence.
- Middleware: authentication and CSRF boundaries.
- Policies: permission checks.
- Views: presentation only.

## Extension rule
New modules should add tables/migrations, repositories, services, controllers, policies, routes, views and JavaScript without modifying unrelated modules. Multi-step business workflows must use `Database::transaction()`.
