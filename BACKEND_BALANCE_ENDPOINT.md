# Backend Patch — User Balance Endpoint

Dokumen ini adalah panduan backend opsional untuk menambahkan endpoint:

```http
GET /api/v1/me/balance
```

## Prinsip keamanan

Endpoint saldo harus memakai pola `me`:

```txt
✅ /api/v1/me/balance
```

Jangan membuat endpoint publik berbasis user id:

```txt
❌ /api/v1/users/{id}/balance
❌ /api/v1/balance?user_id=123
```

Alasannya: saldo harus selalu diambil dari API token user yang sedang dipakai, bukan dari input user.

## File snippet tersedia

```txt
snippets/laravel-user-balance-route.php
snippets/laravel-user-balance-controller-method.php
snippets/laravel-add-balance-to-users-migration.php
```

## Urutan aman pemasangan

1. Backup project Laravel.
2. Pastikan sistem User API Token sudah aktif.
3. Tambahkan route `GET /api/v1/me/balance` ke group middleware User API yang sudah ada.
4. Tambahkan method `balance()` ke controller API user.
5. Sesuaikan nama kolom saldo: `balance`, `saldo`, atau field wallet yang dipakai sistem.
6. Test dengan token user asli.
7. Baru update docs Mintlify.

## Test

```bash
curl -X GET "https://leuwongrr.online/api/v1/me/balance" \
  -H "Authorization: Bearer USER_API_TOKEN" \
  -H "Accept: application/json"
```

Expected:

```json
{
  "success": true,
  "message": "OK",
  "data": {
    "balance": {
      "amount": 25000,
      "formatted": "Rp25.000",
      "currency": "IDR"
    },
    "updated_at": "2026-04-29T09:30:00+07:00"
  }
}
```
