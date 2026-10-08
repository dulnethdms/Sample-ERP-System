# Database

The schema is normalized around organizations, users/RBAC, CRM, products, inventory, purchasing, sales, finance, HR and system tables. Money uses DECIMAL(15,2). Quantities use DECIMAL(15,3). Foreign keys and indexes are defined in `database/schema.sql`.

Do not edit production data manually. Add numbered non-destructive migrations for future changes.
