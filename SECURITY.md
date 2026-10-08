# Security

Implemented in Phase 1: password hashing with `password_hash`, password verification, session ID regeneration on login, HttpOnly/SameSite cookies, CSRF tokens, PDO prepared statements, RBAC middleware/policies, output escaping, production-safe error display configuration and soft deletion for users.

Before production: enforce HTTPS, add login throttling backed by the database/cache, security headers, secure upload service, centralized audit service, password reset flow, session persistence/rotation and automated security tests.
