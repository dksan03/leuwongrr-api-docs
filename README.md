<div align="center">

# LeuwongRR User API

Integrasikan akun LeuwongRR ke website, bot, dashboard, atau sistem pribadi dengan API yang aman, ringan, dan mudah digunakan.

![API](https://img.shields.io/badge/API-v1%20Active-brightgreen)
![Access](https://img.shields.io/badge/Access-User%20Only-blue)
![Auth](https://img.shields.io/badge/Auth-Bearer%20Token-orange)
![Sandbox](https://img.shields.io/badge/Sandbox-Supported-purple)
![Production](https://img.shields.io/badge/Production-Ready-red)
![Docs](https://img.shields.io/badge/Docs-Mintlify-black)

[📘 Dokumentasi](https://docs.leuwongrr.online) • [🔑 Buat API Token](https://leuwongrr.online/user/api-access) • [👤 Login Member](https://leuwongrr.online/login)

</div>

---

## Apa Itu LeuwongRR User API?

**LeuwongRR User API** adalah API khusus untuk user/member LeuwongRR agar bisa menghubungkan data akun sendiri ke sistem eksternal seperti website, bot Discord, bot Telegram, dashboard monitoring, atau tools pribadi.

Dengan API ini, user bisa membaca data akun, cek saldo, melihat invoice, memantau order, melihat deposit, mengecek status transaksi, sampai membuat order melalui API secara aman.

> API ini bersifat **user-only**. Token hanya dapat mengakses data milik akun yang membuat token tersebut.

---

## Kenapa Menggunakan LeuwongRR User API?

### Aman untuk User

Setiap request menggunakan **Bearer Token**. Token hanya bisa membaca dan memproses data milik akun sendiri, bukan data user lain.

### Cocok untuk Bot dan Website

API ini cocok untuk kamu yang ingin membuat:

- bot Discord untuk cek saldo dan order
- bot Telegram untuk monitoring invoice
- dashboard transaksi pribadi
- website reseller atau tools internal
- sistem otomatis untuk cek status order
- integrasi akun LeuwongRR ke backend pribadi

### Bisa Dicoba Langsung

Dokumentasi menggunakan **Mintlify Playground**, jadi endpoint bisa langsung dites dari browser tanpa setup rumit.

### Support Sandbox dan Production

LeuwongRR User API mendukung dua jenis API key:

| Mode | Fungsi |
|---|---|
| `Sandbox` | Untuk testing bot, website, dan integrasi sebelum live |
| `Production` | Untuk transaksi dan penggunaan nyata |

---

## Fitur yang Bisa Dilakukan API Ini

### 1. Cek Status API

Gunakan endpoint health untuk memastikan API aktif dan bisa diakses.

```http
GET /api/v1/health
```

Cocok untuk:

- monitoring uptime
- test koneksi bot
- validasi API sebelum request lain

---

### 2. Cek Profil Akun

User bisa membaca informasi akun sendiri berdasarkan token.

```http
GET /api/v1/me
```

Cocok untuk:

- menampilkan profil user di dashboard
- validasi token user
- memastikan token masih aktif

---

### 3. Cek Saldo Akun

User bisa melihat saldo akun secara real-time.

```http
GET /api/v1/me/balance
```

Contoh penggunaan:

- bot cek saldo
- dashboard saldo user
- validasi saldo sebelum membuat order
- monitoring dana akun pribadi

---

### 4. Lihat Mutasi Saldo

User bisa melihat riwayat perubahan saldo.

```http
GET /api/v1/me/balance/transactions
```

Cocok untuk:

- audit saldo
- cek riwayat pemakaian
- memantau deposit dan transaksi
- dashboard histori saldo

---

### 5. Lihat Ringkasan Dashboard

User bisa mengambil ringkasan data akun dalam satu request.

```http
GET /api/v1/me/dashboard-summary
```

Cocok untuk dashboard cepat yang menampilkan:

- saldo
- total order
- status transaksi
- informasi akun penting

---

### 6. Lihat Daftar Order

User bisa membaca daftar order milik akun sendiri.

```http
GET /api/v1/me/orders
```

Cocok untuk:

- dashboard order
- bot cek order
- monitoring status pesanan
- integrasi riwayat transaksi

---

### 7. Lihat Detail Order

User bisa melihat detail order berdasarkan invoice.

```http
GET /api/v1/me/orders/{invoice}
```

Cocok untuk:

- cek detail pesanan
- menampilkan invoice tertentu
- tracking status order

---

### 8. Buat Order Lewat API

User bisa membuat order melalui API menggunakan token sendiri.

```http
POST /api/v1/me/orders
```

Endpoint ini cocok untuk:

- bot order otomatis
- website reseller pribadi
- sistem checkout internal
- integrasi order dari aplikasi pihak ketiga
- testing order melalui Sandbox API Key

> Order API tetap mengikuti validasi backend LeuwongRR. Bot atau website tidak menentukan harga, status, atau data sensitif secara manual.

---

### 9. Cek Invoice

User bisa melihat detail invoice milik akun sendiri.

```http
GET /api/v1/me/invoices/{invoice}
```

Cocok untuk:

- menampilkan invoice ke user
- cek nominal transaksi
- cek detail pembayaran

---

### 10. Cek Status Invoice

User bisa mengecek status invoice secara cepat.

```http
GET /api/v1/me/invoices/{invoice}/status
```

Cocok untuk:

- bot status transaksi
- auto-refresh pembayaran
- dashboard monitoring invoice

---

### 11. Lihat Riwayat Deposit

User bisa melihat daftar deposit akun sendiri.

```http
GET /api/v1/me/deposits
```

Cocok untuk:

- histori top up
- dashboard deposit
- validasi saldo masuk

---

### 12. Lihat Detail Deposit

User bisa melihat detail deposit berdasarkan invoice.

```http
GET /api/v1/me/deposits/{invoice}
```

Cocok untuk:

- tracking deposit tertentu
- cek status pembayaran deposit
- menampilkan bukti transaksi di dashboard

---

## Sandbox vs Production API Key

LeuwongRR User API menyediakan dua jenis token agar integrasi lebih aman.

### Sandbox API Key

Gunakan Sandbox untuk testing.

```txt
lrrs_v1_xxxxxxxxx
```

Cocok untuk:

- test bot
- test website
- test create order
- test flow invoice
- debugging integrasi

Invoice sandbox ditandai dengan prefix:

```txt
SBX-
```

Sehingga mudah dibedakan dari transaksi production.

---

### Production API Key

Gunakan Production untuk transaksi live.

```txt
lrrp_v1_xxxxxxxxx
```

Cocok untuk:

- bot yang sudah siap dipakai
- website yang sudah live
- transaksi nyata
- integrasi production

> Gunakan Sandbox terlebih dahulu sebelum memakai Production.

---

## Contoh Request

### Cek Saldo

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

## Contoh Create Order

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
    "place_id": "123456789",
    "roblox_pass_id": "987654321",
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
      "invoice_code": "SBX-INV20260429194907487",
      "type": "order",
      "payment_status": "pending",
      "amount": 348,
      "formatted_amount": "Rp348",
      "currency": "IDR"
    }
  }
}
```

---

## Flow Bot Saat Membuat Order

Struktur terbaik untuk bot adalah:

```txt
User kirim command order
        ↓
Bot kirim request ke LeuwongRR API
        ↓
LeuwongRR validasi token user
        ↓
LeuwongRR validasi data order
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
  "price": 1000,
  "total_amount": 1000,
  "status": "paid",
  "role": "admin"
}
```

Data seperti harga, status, user, dan total transaksi selalu ditentukan oleh server LeuwongRR.

---

## Authentication

Semua endpoint user menggunakan Bearer Token.

```http
Authorization: Bearer USER_API_TOKEN
Accept: application/json
```

Token bisa dibuat dari halaman:

```txt
https://leuwongrr.online/user/api-access
```

---

## Mulai Dalam 3 Langkah

### 1. Login ke Akun LeuwongRR

Masuk ke akun member:

```txt
https://leuwongrr.online/login
```

### 2. Buat API Token

Buka halaman User API Access:

```txt
https://leuwongrr.online/user/api-access
```

Pilih token:

- Sandbox untuk testing
- Production untuk live

### 3. Test di Dokumentasi

Buka dokumentasi:

```txt
https://docs.leuwongrr.online
```

Gunakan Mintlify Playground untuk mencoba endpoint secara langsung.

---

## Endpoint Utama

| Method | Endpoint | Fungsi |
|---|---|---|
| `GET` | `/api/v1/health` | Cek status API |
| `GET` | `/api/v1/me` | Cek profil user |
| `GET` | `/api/v1/me/balance` | Cek saldo user |
| `GET` | `/api/v1/me/balance/transactions` | Cek mutasi saldo |
| `GET` | `/api/v1/me/dashboard-summary` | Cek ringkasan dashboard |
| `GET` | `/api/v1/me/orders` | Lihat daftar order |
| `POST` | `/api/v1/me/orders` | Buat order lewat API |
| `GET` | `/api/v1/me/orders/{invoice}` | Lihat detail order |
| `GET` | `/api/v1/me/invoices/{invoice}` | Lihat detail invoice |
| `GET` | `/api/v1/me/invoices/{invoice}/status` | Cek status invoice |
| `GET` | `/api/v1/me/deposits` | Lihat daftar deposit |
| `GET` | `/api/v1/me/deposits/{invoice}` | Lihat detail deposit |

---

## Cocok Untuk

LeuwongRR User API cocok untuk:

- developer bot Discord
- developer bot Telegram
- pemilik website reseller
- user yang ingin membuat dashboard sendiri
- sistem monitoring invoice
- tools otomatisasi transaksi
- integrasi backend pribadi

---

## Batasan Akses

LeuwongRR User API tidak menyediakan:

- endpoint admin
- akses data user lain
- endpoint internal
- webhook payment internal
- fitur ubah password
- fitur ubah role
- fitur manipulasi harga
- fitur manipulasi status transaksi

Semua endpoint dirancang agar tetap aman untuk user/member.

---

## Keamanan Token

Agar akun tetap aman:

- jangan bagikan API token ke orang lain
- jangan upload token ke GitHub
- jangan taruh token langsung di frontend publik
- gunakan token dari backend/server pribadi
- gunakan Sandbox untuk testing
- gunakan Production hanya jika integrasi sudah siap
- regenerate token jika pernah terlihat publik

---

## Dokumentasi Lengkap

Dokumentasi lengkap tersedia di:

```txt
https://docs.leuwongrr.online
```

Di dalam dokumentasi tersedia:

- panduan mulai
- cara membuat token
- Sandbox dan Production Key
- authentication
- daftar endpoint
- contoh request
- contoh response
- error response
- rate limit
- API Playground

---

## Siap Mulai?

Bangun bot, dashboard, atau website yang terhubung langsung dengan akun LeuwongRR menggunakan API yang aman, praktis, dan mudah digunakan.

[📘 Buka Dokumentasi](https://docs.leuwongrr.online)  
[🔑 Buat API Token](https://leuwongrr.online/user/api-access)  
[🌐 Kunjungi LeuwongRR](https://leuwongrr.online)
