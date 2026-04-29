# LeuwongRR User API

![API Status](https://img.shields.io/badge/API-v1%20Active-brightgreen)
![Access](https://img.shields.io/badge/Access-User%20Only-blue)
![Auth](https://img.shields.io/badge/Auth-Bearer%20Token-orange)
![Docs](https://img.shields.io/badge/Docs-Mintlify-purple)

## Integrasikan Akun LeuwongRR Kamu dengan Mudah

LeuwongRR User API adalah API khusus member untuk menghubungkan akun LeuwongRR ke website, bot, dashboard, atau sistem pribadi secara aman dan praktis.

Dengan API ini, user bisa membaca data akun sendiri seperti profil, saldo, order, invoice, status transaksi, deposit, dan mutasi saldo tanpa perlu membuka dashboard manual setiap saat.

[📘 Buka Dokumentasi](https://docs.leuwongrr.online) • [🔑 Buat API Token](https://leuwongrr.online/user/api-access) • [👤 Login Member](https://leuwongrr.online/login)

---

## Apa Itu LeuwongRR User API?

LeuwongRR User API adalah akses API khusus untuk user/member LeuwongRR.

API ini dibuat untuk kebutuhan integrasi ringan seperti:

- menampilkan saldo akun di website pribadi
- membuat bot Discord atau Telegram untuk cek saldo
- memantau invoice secara otomatis
- membaca daftar order milik akun sendiri
- mengecek status transaksi tanpa login dashboard
- membuat dashboard monitoring pribadi
- menghubungkan akun LeuwongRR ke sistem eksternal milik user

> API ini bersifat **user-only**. Token hanya bisa membaca data milik akun yang membuat token tersebut.

---

## Kenapa Pakai User API?

### Aman

Setiap request menggunakan **User API Token**. Token hanya memiliki akses ke data milik akun sendiri, bukan data user lain.

### Praktis

User tidak perlu membuka dashboard manual hanya untuk mengecek saldo, order, invoice, atau status transaksi.

### Mudah Diintegrasikan

Endpoint dibuat sederhana dan cocok digunakan di:

- website pribadi
- bot Discord
- bot Telegram
- dashboard monitoring
- tools internal sederhana
- sistem notifikasi invoice

### Bisa Langsung Dicoba

Dokumentasi menggunakan Mintlify dan mendukung API Playground, sehingga endpoint bisa langsung dites dari halaman docs.

---

## Fitur User API

### Akun

| Method | Endpoint | Deskripsi |
|---|---|---|
| `GET` | `/api/v1/me` | Mengambil informasi akun user |
| `GET` | `/api/v1/me/dashboard-summary` | Mengambil ringkasan dashboard user |

### Saldo

| Method | Endpoint | Deskripsi |
|---|---|---|
| `GET` | `/api/v1/me/balance` | Mengecek saldo akun user |
| `GET` | `/api/v1/me/balance/transactions` | Melihat riwayat mutasi saldo user |

### Order

| Method | Endpoint | Deskripsi |
|---|---|---|
| `GET` | `/api/v1/me/orders` | Mengambil daftar order milik user |
| `GET` | `/api/v1/me/orders/{invoice}` | Mengambil detail order berdasarkan invoice |

### Invoice

| Method | Endpoint | Deskripsi |
|---|---|---|
| `GET` | `/api/v1/me/invoices/{invoice}` | Mengambil detail invoice milik user |
| `GET` | `/api/v1/me/invoices/{invoice}/status` | Mengecek status invoice secara cepat |

### Deposit

| Method | Endpoint | Deskripsi |
|---|---|---|
| `GET` | `/api/v1/me/deposits` | Mengambil daftar deposit user |
| `GET` | `/api/v1/me/deposits/{invoice}` | Mengambil detail deposit berdasarkan invoice |

### Status API

| Method | Endpoint | Deskripsi |
|---|---|---|
| `GET` | `/api/v1/health` | Mengecek status API |

---

## Contoh Penggunaan

### Cek Saldo User

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


## Sandbox & Production API Key

User dapat membuat dua mode API key dari halaman User API Access:

- **Sandbox API Key** (`lrrs_v1_`) untuk uji coba integrasi bot/website. Invoice test memakai prefix `SBX-` dan tidak membuat charge payment gateway real.
- **Production API Key** (`lrrp_v1_`) untuk penggunaan live setelah integrasi sudah siap.

Gunakan Sandbox terlebih dahulu untuk development, lalu pindah ke Production ketika flow sudah valid.

## Authentication

Semua endpoint user membutuhkan **Bearer Token**.

Format header:

```http
Authorization: Bearer USER_API_TOKEN
Accept: application/json
```

Token bisa dibuat melalui halaman:

```txt
https://leuwongrr.online/user/api-access
```

> Simpan token dengan aman. Jangan membagikan token ke orang lain atau menaruh token di tempat publik.

---

## Mulai Dalam 3 Langkah

### 1. Login ke Akun LeuwongRR

Masuk ke akun member melalui:

```txt
https://leuwongrr.online/login
```

### 2. Buat User API Token

Buka halaman User API Access:

```txt
https://leuwongrr.online/user/api-access
```

Generate token baru dan simpan token tersebut.

### 3. Gunakan Token di Request API

Gunakan token pada header request:

```http
Authorization: Bearer USER_API_TOKEN
```

---

## Cocok Untuk

LeuwongRR User API cocok untuk user yang ingin membuat:

- dashboard saldo pribadi
- bot cek saldo
- bot cek invoice
- dashboard monitoring order
- sistem notifikasi transaksi
- integrasi website pribadi
- tools otomatisasi ringan

---

## Batasan Akses

User API hanya digunakan untuk membaca data milik akun sendiri.

API ini **tidak menyediakan**:

- endpoint admin
- endpoint internal
- akses data user lain
- webhook payment internal
- fitur edit data sensitif
- fitur ubah password
- fitur manajemen akun user lain

Semua endpoint publik di dokumentasi ini dirancang agar tetap aman untuk penggunaan user/member.

---

## Response Umum

### Success

```json
{
  "success": true,
  "message": "OK",
  "data": {}
}
```

### Unauthorized

```json
{
  "success": false,
  "message": "Unauthenticated."
}
```

### Too Many Requests

```json
{
  "success": false,
  "message": "Too many requests."
}
```

---

## Rate Limit

API memiliki rate limit untuk menjaga performa dan stabilitas layanan.

Gunakan API secara wajar dan hindari request berulang terlalu cepat.

Detail rate limit bisa dilihat di dokumentasi:

```txt
https://docs.leuwongrr.online
```

---

## Dokumentasi Lengkap

Dokumentasi lengkap tersedia di:

```txt
https://docs.leuwongrr.online
```

Di sana kamu bisa melihat:

- panduan mulai
- cara membuat token
- authentication
- daftar endpoint
- contoh request
- contoh response
- rate limits
- error response
- API Playground

---

## Keamanan Token

Agar akun tetap aman:

- jangan share token API ke orang lain
- jangan upload token ke GitHub
- jangan taruh token langsung di frontend publik
- gunakan token hanya di server/backend pribadi
- regenerate token jika token pernah terlihat publik
- hapus token yang sudah tidak digunakan

---

## Siap Mulai?

Gunakan LeuwongRR User API untuk menghubungkan akun kamu ke website, bot, atau dashboard pribadi dengan cara yang lebih praktis, aman, dan mudah.

[📘 Buka Dokumentasi](https://docs.leuwongrr.online)  
[🔑 Buat API Token](https://leuwongrr.online/user/api-access)  
[🌐 Kunjungi LeuwongRR](https://leuwongrr.online)

## User Order API

Endpoint transaksi user-only yang tersedia untuk testing:

```http
POST /api/v1/me/orders
```

Gunakan `payment_method: invoice` untuk pengujian aman. User diambil dari Bearer Token, sedangkan harga, validasi Roblox, invoice, dan status dibuat oleh server LeuwongRR.

