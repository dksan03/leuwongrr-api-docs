# LeuwongRR User API — Final User-Only Patch

Patch ini sudah memasukkan fitur check saldo user via API.

## Endpoint baru

```http
GET /api/v1/me/balance
```

## Perubahan file utama

```txt
docs.json
README.md
introduction.mdx
quickstart.mdx
balance.mdx
api-reference/openapi.json
BACKEND_BALANCE_ENDPOINT.md
snippets/laravel-user-balance-route.php
snippets/laravel-user-balance-controller-method.php
snippets/laravel-add-balance-to-users-migration.php
```

## Keamanan

- Tidak ada endpoint admin/internal.
- Tidak ada endpoint `/users/{id}/balance`.
- Tidak ada parameter `user_id`.
- Saldo wajib diambil dari pemilik User API Token.
- Mintlify Playground tetap memakai Bearer token.
- `proxy: true` tetap aktif agar test Playground tidak mudah kena CORS.

## Cara merge aman

```bash
cp -R leuwongrr-api-docs-user-only-final/* /path/to/leuwongrr-api-docs/
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
git commit -m "docs: add user balance API endpoint"
git push origin main
```
