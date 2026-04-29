# LeuwongRR User API

### Hubungkan Website atau Bot Kamu dengan Akun LeuwongRR

Gunakan **LeuwongRR User API** untuk cek profil, saldo, order, invoice, dan status transaksi milik akun kamu sendiri secara aman.

[📚 Buka Dokumentasi](https://docs.leuwongrr.online) · [🔑 Buat API Token](https://leuwongrr.online/user/api-access) · [👤 Login Member](https://leuwongrr.online/login)

---

## Apa Itu LeuwongRR User API?

**LeuwongRR User API** adalah akses API khusus member LeuwongRR untuk menghubungkan akun pribadi ke sistem eksternal seperti website, bot, atau dashboard.

API ini cocok untuk kamu yang ingin:

- Menampilkan saldo user di website atau bot pribadi
- Menampilkan status invoice di website sendiri
- Membuat bot Discord atau Telegram untuk cek invoice
- Memantau order tanpa membuka dashboard manual
- Membuat dashboard monitoring sederhana
- Menghubungkan data akun sendiri ke backend pribadi

> User API hanya bisa membaca data milik akun pemilik token. Token user tidak bisa membaca invoice atau order milik user lain.

---

## Kenapa Pakai User API?

| Benefit | Keterangan |
|---|---|
| Cepat | Cek invoice/order langsung dari sistem kamu |
| Aman | Token hanya membaca data milik akun sendiri |
| Fleksibel | Bisa dipakai untuk website, bot, atau dashboard |
| Developer friendly | REST API, JSON response, Bearer Token |
| Siap integrasi | Cocok untuk workflow otomatis user |

---

## Endpoint User API

```txt
GET /api/v1/health
GET /api/v1/me
GET /api/v1/me/balance
GET /api/v1/me/orders
GET /api/v1/me/orders/{invoice}
GET /api/v1/me/invoices/{invoice}
GET /api/v1/me/invoices/{invoice}/status
```

Base URL:

```txt
https://leuwongrr.online
```

---

## Mulai Dalam 4 Langkah

### 1. Login ke LeuwongRR

```txt
https://leuwongrr.online/login
```

### 2. Buka User API Access

```txt
https://leuwongrr.online/user/api-access
```

### 3. Generate API Token

Buat token dari dashboard member, lalu simpan token dengan aman.

### 4. Kirim Request Pertama

```bash
curl -H "Authorization: Bearer YOUR_USER_API_TOKEN" \
  -H "Accept: application/json" \
  https://leuwongrr.online/api/v1/me
```

---

## Contoh Cek Saldo

```bash
curl -H "Authorization: Bearer YOUR_USER_API_TOKEN" \
  -H "Accept: application/json" \
  https://leuwongrr.online/api/v1/me/balance
```

Contoh hasil:

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

---

## Contoh Cek Status Invoice

```bash
curl -H "Authorization: Bearer YOUR_USER_API_TOKEN" \
  -H "Accept: application/json" \
  https://leuwongrr.online/api/v1/me/invoices/INV20260429113629619/status
```

Contoh hasil:

```json
{
  "success": true,
  "message": "OK",
  "data": {
    "invoice": {
      "invoice_code": "INV20260429113629619",
      "type": "order",
      "payment_status": "paid"
    }
  }
}
```

---

## Use Case Bot Discord

User menjalankan command:

```txt
/cek_invoice INV20260429113629619
```

Bot kamu request ke LeuwongRR User API, lalu menampilkan:

```txt
Invoice: INV20260429113629619
Status: paid
Type: order
```

---

## Keamanan Token

Jangan simpan token di:

- HTML publik
- JavaScript frontend
- GitHub public repository
- URL query seperti `?token=`
- Chat publik
- Screenshot publik

Simpan token di:

- File `.env`
- Backend website
- Server bot
- Secret manager
- Environment variable hosting

Pola yang benar:

```txt
Website / Bot User
        ↓
Backend / Server User
        ↓ Authorization: Bearer USER_API_TOKEN
LeuwongRR User API
```

---

## Dokumentasi Lengkap

Buka dokumentasi resmi:

```txt
https://docs.leuwongrr.online
```

Di sana kamu bisa membaca panduan lengkap, melihat daftar endpoint, dan mencoba request melalui Mintlify Playground.

---

## Siap Integrasi?

Buat User API Token dari dashboard member dan mulai hubungkan akun LeuwongRR kamu ke website atau bot pribadi.

[🚀 Buat User API Token](https://leuwongrr.online/user/api-access)
