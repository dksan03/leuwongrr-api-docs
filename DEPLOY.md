# Deploy Patch LeuwongRR User API Docs

Patch ini berisi dokumentasi REST API v1 yang fokus ke **public safe endpoint** dan **User API**. Route operasional, credential provider, callback sistem, maintenance, debug, dan konfigurasi server tidak dimasukkan ke dokumentasi publik.

## 1. Replace / update files

Copy semua file ini ke root repo `leuwongrr-api-docs`.

Struktur final utama:

```txt
.
├── README.md
├── docs.json
├── introduction.mdx
├── quickstart.mdx
├── authentication.mdx
├── user-api-access.mdx
├── available-features.mdx
├── balance.mdx
├── create-order-api.mdx
├── sandbox-production-keys.mdx
├── rate-limits.mdx
├── errors.mdx
└── api-reference
    ├── introduction.mdx
    └── openapi.json
```

Folder `snippets/` hanya referensi lama, tidak wajib ikut deploy.

## 2. Validate JSON

```bash
node -e "JSON.parse(require('fs').readFileSync('docs.json','utf8')); console.log('docs.json OK')"
node -e "JSON.parse(require('fs').readFileSync('api-reference/openapi.json','utf8')); console.log('openapi.json OK')"
```

## 3. Validate Mintlify

```bash
mint validate
```

Atau preview lokal:

```bash
mint dev
```

## 4. Commit dan push

```bash
git add .
git commit -m "docs: publish user-only REST API reference"
git push origin main
```

## 5. Test Playground

Buka:

```txt
https://docs.leuwongrr.online
```

Test urutan:

1. `GET /api/v1/health` tanpa token
2. `POST /api/v1/auth/token/validate` dengan User API Token
3. `GET /api/v1/me` dengan User API Token
4. `GET /api/v1/me/balance` dengan User API Token
5. `GET /api/v1/me/invoices/{invoice}/status` dengan invoice milik token

## 6. CORS note

Default patch ini memakai:

```json
"proxy": true
```

Dengan mode ini request Playground dirutekan via Mintlify proxy, sehingga CORS browser biasanya tidak perlu dipatch.

Kalau ingin request langsung dari browser, ubah menjadi:

```json
"proxy": false
```

Lalu terapkan CORS allowlist untuk:

```txt
https://docs.leuwongrr.online
```

## 7. Anti bocor akses privileged

- Jangan menambahkan route operasional, credential provider, callback sistem, debug, maintenance, atau konfigurasi server ke `api-reference/openapi.json`.
- Jangan menampilkan path privileged di README, MDX, atau response endpoint discovery publik.
- Semua endpoint user sebaiknya memakai pola `/api/v1/me/...`.
- Jangan membuat endpoint publik berbasis `user_id`, email, role, harga, total, atau status.
