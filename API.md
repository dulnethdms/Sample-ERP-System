# API

The API layer is reserved for module-by-module implementation. Phase 1 intentionally keeps authentication and core user management server-rendered so the foundation can be verified before adding a broad API surface.

Target convention:
GET /api/resource
GET /api/resource/{id}
POST /api/resource
PUT /api/resource/{id}
DELETE /api/resource/{id}

Responses will use `{success,message,data}` and validation failures will use `{success:false,message,errors}`.
