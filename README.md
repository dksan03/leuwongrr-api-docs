<div align="center">

# LeuwongRR API

### Integrasi Robux, Invoice, dan Order Automation Jadi Lebih Cepat

Bangun integrasi website, bot, atau dashboard kamu dengan **LeuwongRR REST API**.  
Cek invoice, pantau order, dan hubungkan sistem kamu ke LeuwongRR dengan alur yang aman, ringan, dan mudah dipakai.

<p>
  <a href="https://docs.leuwongrr.online"><img src="https://img.shields.io/badge/API%20Docs-Online-7eff2f?style=for-the-badge" alt="API Docs"></a>
  <a href="https://leuwongrr.online"><img src="https://img.shields.io/badge/Main%20Website-LeuwongRR-111827?style=for-the-badge" alt="Website"></a>
  <img src="https://img.shields.io/badge/REST%20API-v1-22c55e?style=for-the-badge" alt="REST API v1">
  <img src="https://img.shields.io/badge/User%20Token-Ready-16a34a?style=for-the-badge" alt="User Token Ready">
</p>

<p>
  <a href="https://docs.leuwongrr.online"><strong>🚀 Buka Dokumentasi</strong></a>
  ·
  <a href="https://leuwongrr.online/user/api-access"><strong>🔑 Buat User API Token</strong></a>
  ·
  <a href="https://leuwongrr.online"><strong>🌐 Website Utama</strong></a>
</p>

</div>

---

## Kenapa Pakai LeuwongRR API?

Kalau kamu punya **website**, **bot Discord**, **bot Telegram**, atau **dashboard sendiri**, LeuwongRR API membantu kamu membuat sistem yang lebih otomatis.

Tidak perlu cek manual terus-menerus.  
Tidak perlu buka dashboard berkali-kali.  
Cukup hubungkan sistem kamu ke API, lalu status invoice dan order bisa dicek langsung dari sistem kamu sendiri.

---

## Cocok Untuk Siapa?

| Pengguna | Manfaat |
|---|---|
| Owner website | Bisa tampilkan status invoice/order otomatis |
| Bot developer | Bisa buat command cek invoice di Discord/Telegram |
| Reseller / partner | Bisa pantau transaksi lebih cepat |
| Admin internal | Bisa integrasi dashboard operasional |
| Developer | Bisa bangun automation dengan REST API v1 |

---

## Yang Bisa Kamu Bangun

Dengan LeuwongRR API, kamu bisa membuat:

- Bot cek invoice otomatis
- Dashboard status order
- Sistem monitoring pembayaran
- Integrasi website reseller
- Notifikasi status transaksi
- Automation untuk operasional Robux order
- Panel ringan untuk user sendiri

---

## Live Documentation

Dokumentasi lengkap tersedia di:

```txt
https://docs.leuwongrr.online
```

Di dalamnya tersedia panduan:

- Quickstart
- Authentication
- User API Access
- Error Response
- API Reference
- Contoh penggunaan token

---

## Fitur Utama

### REST API v1

API inti yang fokus ke transaksi penting:

```txt
GET  /api/v1/health
POST /api/v1/orders
GET  /api/v1/orders/{invoice}
GET  /api/v1/invoices/{invoice}
GET  /api/v1/invoices/{invoice}/status
POST /api/v1/payment/callback/{provider}
```

### User API Access

Member bisa membuat token sendiri dan hanya bisa membaca data miliknya sendiri.

```txt
GET /api/v1/me
GET /api/v1/me/orders
GET /api/v1/me/orders/{invoice}
GET /api/v1/me/invoices/{invoice}
GET /api/v1/me/invoices/{invoice}/status
```

---

## Mulai Dalam 3 Langkah

### 1. Buat API Token

User bisa membuat token dari:

```txt
https://leuwongrr.online/user/api-access
```

### 2. Kirim Request Dengan Bearer Token

```http
Authorization: Bearer YOUR_API_TOKEN
Accept: application/json
```

### 3. Cek Data Kamu

```bash
curl -H "Authorization: Bearer YOUR_API_TOKEN" \
https://leuwongrr.online/api/v1/me
```

Kalau token valid, API akan mengembalikan data user sesuai akun pemilik token.

---

## Contoh Use Case Bot

Misalnya user mengetik command di Discord:

```txt
/cek_invoice INV20260429113629619
```

Bot kamu bisa request ke LeuwongRR API:

```bash
curl -H "Authorization: Bearer USER_API_TOKEN" \
https://leuwongrr.online/api/v1/me/invoices/INV20260429113629619/status
```

Lalu bot menampilkan hasil seperti:

```txt
Invoice: INV20260429113629619
Status: paid
Type: order
```

---

## Aman Untuk User

LeuwongRR API memakai sistem token yang dipisahkan:

| Token | Akses |
|---|---|
| Admin API Token | Untuk sistem internal |
| User API Token | Hanya untuk data user sendiri |

User token tidak bisa membaca invoice/order milik user lain.

Jika token bocor, user bisa:

- Revoke token
- Regenerate token
- Membuat token baru dari dashboard

---

## Best Practice

Agar integrasi tetap aman:

- Simpan token di backend/server/bot
- Jangan taruh token di JavaScript frontend
- Jangan kirim token lewat URL query
- Jangan commit token ke GitHub publik
- Gunakan HTTPS
- Regenerate token jika dicurigai bocor

---

## Link Penting

| Resource | URL |
|---|---|
| Website utama | https://leuwongrr.online |
| Dokumentasi API | https://docs.leuwongrr.online |
| User API Access | https://leuwongrr.online/user/api-access |

---

## Repository Ini Untuk Apa?

Repository ini digunakan sebagai sumber dokumentasi **Mintlify** untuk LeuwongRR API.

Setiap perubahan pada dokumentasi akan otomatis tersinkron ke:

```txt
https://docs.leuwongrr.online
```

---

<div align="center">

## Siap Integrasi?

Gunakan **LeuwongRR API** untuk membuat sistem kamu lebih otomatis, rapi, dan cepat dipakai.

<a href="https://docs.leuwongrr.online"><strong>🚀 Mulai dari Dokumentasi</strong></a>

</div>
