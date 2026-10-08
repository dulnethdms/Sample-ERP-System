# Deployment

Use Apache/Nginx with `/public` as document root. Never expose `.env`, `app`, `config`, `database` or `storage` directly. Use HTTPS. Create a least-privilege MySQL account. Run migrations through a controlled deployment process. Back up MySQL and `public/uploads` separately, encrypt backups where appropriate, and regularly test restoration.
