# LeuwongRR User API — User-Only Docs Update

Patch ini merapikan dokumentasi LeuwongRR REST API v1 agar fokus ke public safe endpoint dan User API.

## Perubahan utama

- Menambahkan pembagian navigasi:
  - Endpoint Publik Aman
  - Endpoint User API
- Menambahkan dokumentasi token validation:

```http
POST /api/v1/auth/token/validate
```

- Menambahkan katalog dan artikel publik ke navigasi docs.
- Merapikan copywriting agar tidak menyebarkan route privileged, credential provider, callback sistem, maintenance, debug, atau konfigurasi server.
- Memperbaiki typo code fence di `quickstart.mdx`.
- Memperbaiki contoh header `X-RateLimit-Remaining`.
- Memperjelas bahwa `POST /api/v1/me/orders` tidak menerima `user_id`, email, harga, total, status, role, atau payload sensitif.

## Endpoint yang ditampilkan

### Public safe

```http
GET /api/v1/health
GET /api/v1/catalog/robux-packages
GET /api/v1/catalog/payment-methods
GET /api/v1/articles
GET /api/v1/articles/{slug}
```

### Token utility

```http
POST /api/v1/auth/token/validate
```

### User-only

```http
GET  /api/v1/me
GET  /api/v1/me/dashboard-summary
GET  /api/v1/me/balance
GET  /api/v1/me/balance/transactions
GET  /api/v1/me/deposits
GET  /api/v1/me/deposits/{invoice}
POST /api/v1/me/orders
GET  /api/v1/me/orders
GET  /api/v1/me/orders/{invoice}
GET  /api/v1/me/invoices/{invoice}
GET  /api/v1/me/invoices/{invoice}/status
```

## Cara merge aman

```bash
cp -R leuwongrr-api-docs-main/* /path/to/leuwongrr-api-docs/
cd /path/to/leuwongrr-api-docs

node -e "JSON.parse(require('fs').readFileSync('docs.json','utf8')); console.log('docs.json OK')"
node -e "JSON.parse(require('fs').readFileSync('api-reference/openapi.json','utf8')); console.log('openapi.json OK')"

mint validate
git diff
```

Review `git diff` sebelum commit.

## Commit yang disarankan

```bash
git add .
git commit -m "docs: publish user-only REST API reference"
git push origin main
```

## Patch tambahan — hardening user-only

- Menghapus dokumen/snippet backend opsional yang tidak diperlukan untuk publikasi docs user.
- Menambahkan halaman `security-user-only.mdx`.
- Menegaskan bahwa transaksi API memakai pola `/api/v1/me/*` dan token member/user.
- Endpoint legacy server-token tidak ditampilkan di dokumentasi publik.
