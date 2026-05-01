<div align="center">

# LeuwongRR User API

REST API v1 untuk integrasi akun LeuwongRR ke website, bot, dashboard, dan backend pribadi secara aman, ringan, dan user-only.

![API](https://img.shields.io/badge/API-v1%20Active-brightgreen)
![Access](https://img.shields.io/badge/Access-User%20Only-blue)
![Auth](https://img.shields.io/badge/Auth-Bearer%20Token-orange)
![Sandbox](https://img.shields.io/badge/Sandbox-Ready-purple)
![Production](https://img.shields.io/badge/Production-Ready-red)
![Docs](https://img.shields.io/badge/Docs-Mintlify-black)

[📘 Dokumentasi](https://docs.leuwongrr.online) • [🔑 Buat API Token](https://leuwongrr.online/user/api-access) • [👤 Login Member](https://leuwongrr.online/login)

</div>

---

## Apa Itu LeuwongRR User API?

**LeuwongRR User API** adalah API khusus untuk user/member LeuwongRR agar bisa menghubungkan data akun sendiri ke sistem eksternal seperti website pribadi, bot Discord, bot Telegram, dashboard monitoring, atau tools pribadi.

Dengan API ini, user bisa membaca profil, cek saldo, melihat invoice, memantau order, melihat deposit, mengecek status transaksi, mengambil katalog publik, membaca artikel publik, sampai membuat order melalui API secara aman.

> API ini bersifat **user-only**. Token hanya dapat mengakses data milik akun yang membuat token tersebut.

---

## Prinsip Keamanan

- Semua endpoint `/me` mengambil user dari **Bearer Token**, bukan dari `user_id` atau email yang dikirim client.
- Request tidak boleh menentukan harga, status, role, total transaksi, atau payload provider.
- Endpoint publik hanya berisi data aman: health, katalog, payment method aktif, dan artikel publik.
- Route operasional, credential provider, callback sistem, maintenance, debug, dan konfigurasi server tidak dimasukkan ke dokumentasi publik.
- Token harus disimpan di backend/server/bot, bukan di frontend browser.

---

## Base URL

```txt
https://leuwongrr.online
```

---

## Authentication

Endpoint user memakai Bearer Token:

```http
Authorization: Bearer USER_API_TOKEN
Accept: application/json
```

Token dibuat dari halaman:

```txt
https://leuwongrr.online/user/api-access
```

---

## Sandbox vs Production API Key

LeuwongRR User API menyediakan dua jenis token agar integrasi lebih aman.

| Mode | Prefix token | Fungsi |
|---|---|---|
| Sandbox | `lrrs_v1_` | Untuk testing bot, website, dan integrasi. Invoice test memakai prefix `SBX-`. |
| Production | `lrrp_v1_` | Untuk transaksi live/production setelah integrasi siap. |

> Gunakan Sandbox terlebih dahulu sebelum memakai Production.

---

## Endpoint Public Aman

| Method | Endpoint | Fungsi |
|---|---|---|
| `GET` | `/api/v1/health` | Cek status API |
| `GET` | `/api/v1/catalog/robux-packages` | Daftar paket Robux aktif |
| `GET` | `/api/v1/catalog/payment-methods` | Daftar metode pembayaran aktif yang aman ditampilkan |
| `GET` | `/api/v1/articles` | Daftar artikel publik |
| `GET` | `/api/v1/articles/{slug}` | Detail artikel publik |

---

## Endpoint Token Utility

| Method | Endpoint | Fungsi |
|---|---|---|
| `POST` | `/api/v1/auth/token/validate` | Validasi User API Token |

---

## Endpoint User-Only

| Method | Endpoint | Fungsi |
|---|---|---|
| `GET` | `/api/v1/me` | Cek profil user |
| `GET` | `/api/v1/me/dashboard-summary` | Cek ringkasan dashboard |
| `GET` | `/api/v1/me/balance` | Cek saldo user |
| `GET` | `/api/v1/me/balance/transactions` | Cek mutasi saldo |
| `GET` | `/api/v1/me/deposits` | Lihat daftar deposit |
| `GET` | `/api/v1/me/deposits/{invoice}` | Lihat detail deposit |
| `POST` | `/api/v1/me/orders` | Buat order lewat API |
| `GET` | `/api/v1/me/orders` | Lihat daftar order |
| `GET` | `/api/v1/me/orders/{invoice}` | Lihat detail order |
| `GET` | `/api/v1/me/invoices/{invoice}` | Lihat detail invoice |
| `GET` | `/api/v1/me/invoices/{invoice}/status` | Cek status invoice |

---

## Contoh Request: Cek Saldo

```bash
curl --request GET \
  --url https://leuwongrr.online/api/v1/me/balance \
  --header 'Authorization: Bearer USER_API_TOKEN' \
  --header 'Accept: application/json'
```

### Contoh Response

```json
{
  "success": true,
  "message": "OK",
  "data": {
    "balance": {
      "amount": 15666,
      "formatted": "Rp15.666",
      "currency": "IDR"
    },
    "updated_at": "2026-04-29 15:26:40"
  }
}
```

---

## Contoh Request: Validate Token

```bash
curl --request POST \
  --url https://leuwongrr.online/api/v1/auth/token/validate \
  --header 'Authorization: Bearer USER_API_TOKEN' \
  --header 'Accept: application/json'
```

---

## Contoh Request: Create Order

```bash
curl --request POST \
  --url https://leuwongrr.online/api/v1/me/orders \
  --header 'Authorization: Bearer USER_API_TOKEN' \
  --header 'Accept: application/json' \
  --header 'Content-Type: application/json' \
  --header 'Idempotency-Key: order-test-001' \
  --data '{
    "order_type": "gamepass",
    "roblox_username": "RobloxUsername",
    "place_id": 123456789,
    "roblox_pass_id": 987654321,
    "payment_method": "invoice",
    "client_reference": "bot-order-001"
  }'
```

### Contoh Response Create Order

```json
{
  "success": true,
  "message": "Order berhasil dibuat.",
  "data": {
    "invoice": {
      "invoice_code": "INV202605010001",
      "type": "order",
      "payment_status": "pending",
      "amount": 348,
      "formatted_amount": "Rp348",
      "currency": "IDR"
    },
    "environment": "sandbox",
    "idempotent": false
  }
}
```

---

## Flow Bot Saat Membuat Order

```txt
User kirim command order
        ↓
Bot/backend kirim request ke LeuwongRR User API
        ↓
LeuwongRR validasi token user
        ↓
LeuwongRR validasi data Roblox dan payment method
        ↓
LeuwongRR hitung harga dari server
        ↓
LeuwongRR buat invoice/order
        ↓
Bot tampilkan hasil ke user
```

Bot hanya bertugas mengirim input. Semua validasi penting tetap diproses oleh server LeuwongRR.

---

## Yang Tidak Boleh Dikirim dari Bot

Untuk keamanan, bot atau website tidak boleh mengirim data seperti:

```json
{
  "user_id": 1,
  "email": "user@example.com",
  "price": 1000,
  "total_amount": 1000,
  "status": "paid",
  "payment_status": "paid",
  "balance": 999999
}
```

Data seperti harga, status, user, saldo, dan total transaksi selalu ditentukan oleh server LeuwongRR.

---

## Cocok Untuk

LeuwongRR User API cocok untuk:

- developer bot Discord
- developer bot Telegram
- pemilik website reseller pribadi
- user yang ingin membuat dashboard sendiri
- sistem monitoring invoice
- tools otomatisasi transaksi
- integrasi backend pribadi

---

## Batasan Akses

LeuwongRR User API tidak menyediakan akses untuk:

- Data user lain
- Credential provider
- Route operasional/privileged
- Konfigurasi server
- Maintenance/debug route
- Fitur ubah password lewat API publik
- Fitur manipulasi harga
- Fitur manipulasi status transaksi

Semua endpoint dirancang agar tetap aman untuk user/member.

---

## Keamanan Token

Agar akun tetap aman:

- Jangan bagikan API token ke orang lain
- Jangan upload token ke GitHub
- Jangan taruh token langsung di frontend publik
- Gunakan token dari backend/server pribadi
- Gunakan Sandbox untuk testing
- Gunakan Production hanya jika integrasi sudah siap
- Regenerate token jika pernah terlihat publik

---

## Deploy Singkat

```bash
node -e "JSON.parse(require('fs').readFileSync('docs.json','utf8')); console.log('docs.json OK')"
node -e "JSON.parse(require('fs').readFileSync('api-reference/openapi.json','utf8')); console.log('openapi.json OK')"
mint validate
```

---

## Dokumentasi Lengkap

```txt
https://docs.leuwongrr.online
```

[📘 Buka Dokumentasi](https://docs.leuwongrr.online)  
[🔑 Buat API Token](https://leuwongrr.online/user/api-access)  
[🌐 Kunjungi LeuwongRR](https://leuwongrr.online)
