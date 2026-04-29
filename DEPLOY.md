# Deploy Patch LeuwongRR User API Docs

## 1. Replace / update files

Copy semua file ini ke root repo `dksan03/leuwongrr-api-docs`.

Struktur final:

```txt
.
├── README.md
├── docs.json
├── introduction.mdx
├── quickstart.mdx
├── authentication.mdx
├── user-api-access.mdx
├── rate-limits.mdx
├── errors.mdx
└── api-reference
    ├── introduction.mdx
    └── openapi.json
```

Folder `snippets/` hanya referensi, tidak wajib ikut deploy.

## 2. Validate JSON

```bash
node -e "JSON.parse(require('fs').readFileSync('docs.json','utf8')); console.log('docs.json OK')"
node -e "JSON.parse(require('fs').readFileSync('api-reference/openapi.json','utf8')); console.log('openapi.json OK')"
```

## 3. Validate Mintlify

```bash
mint validate
```

Atau jalankan preview lokal:

```bash
mint dev
```

## 4. Commit dan push

```bash
git add .
git commit -m "docs: user-only API reference and playground"
git push origin main
```

## 5. Test Playground

Buka:

```txt
https://docs.leuwongrr.online
```

Lalu cek group:

```txt
Endpoint User API
```

Test urutan:

1. `GET /api/v1/health` tanpa token
2. `GET /api/v1/me` dengan User API Token
3. `GET /api/v1/me/invoices/{invoice}/status` dengan invoice milik token

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

## Validasi Endpoint Saldo

Setelah deploy backend dan docs, test endpoint berikut:

```bash
curl -X GET "https://leuwongrr.online/api/v1/me/balance" \
  -H "Authorization: Bearer USER_API_TOKEN" \
  -H "Accept: application/json"
```

Pastikan response hanya menampilkan saldo milik token yang dipakai, bukan saldo user lain.

## Anti Bentrok

- File docs di patch ini adalah full replacement untuk repo docs Mintlify.
- Snippet Laravel di folder `snippets/` hanya contoh, jangan disalin mentah kalau nama middleware/controller berbeda.
- Jangan menambahkan endpoint admin/internal ke `api-reference/openapi.json`.
- Jalankan `mint validate` sebelum push.
