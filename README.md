<div align="center">

# LeuwongRR User API

### Hubungkan Website atau Bot Kamu dengan Akun LeuwongRR

Gunakan **LeuwongRR User API** untuk cek profil, order, invoice, dan status transaksi milik akun kamu sendiri secara aman.

<p>
  <a href="https://docs.leuwongrr.online"><img src="https://img.shields.io/badge/User%20API-Documentation-7eff2f?style=for-the-badge" alt="User API Docs"></a>
  <a href="https://leuwongrr.online/user/api-access"><img src="https://img.shields.io/badge/Get%20API%20Token-User%20Dashboard-22c55e?style=for-the-badge" alt="User API Token"></a>
  <a href="https://leuwongrr.online"><img src="https://img.shields.io/badge/Website-LeuwongRR-111827?style=for-the-badge" alt="LeuwongRR"></a>
</p>

<p>
  <a href="https://docs.leuwongrr.online"><strong>📚 Buka Dokumentasi</strong></a>
  ·
  <a href="https://leuwongrr.online/user/api-access"><strong>🔑 Buat API Token</strong></a>
  ·
  <a href="https://leuwongrr.online/login"><strong>👤 Login Member</strong></a>
</p>

</div>

---

## Apa Itu LeuwongRR User API?

**LeuwongRR User API** adalah akses API khusus untuk member LeuwongRR.

Dengan API ini, kamu bisa menghubungkan akun LeuwongRR ke:

- Website pribadi
- Bot Discord
- Bot Telegram
- Dashboard monitoring
- Sistem cek invoice otomatis
- Sistem tracking order milik akun kamu sendiri

API ini hanya bisa membaca **data milik akun pemilik token**.  
Token user tidak bisa membaca invoice atau order milik user lain.

---

## Cocok Untuk Siapa?

| Pengguna | Manfaat |
|---|---|
| Member LeuwongRR | Cek invoice dan order sendiri lewat API |
| Owner website | Tampilkan status order/invoice otomatis |
| Bot developer | Buat command cek invoice di Discord/Telegram |
| Reseller | Pantau status transaksi lebih cepat |
| Developer | Integrasi data akun sendiri ke sistem eksternal |

---

## Yang Bisa Kamu Lakukan

Dengan User API, kamu bisa:

- Cek data akun sendiri
- Melihat daftar order milik akun sendiri
- Cek detail order berdasarkan invoice
- Cek detail invoice milik akun sendiri
- Cek status pembayaran invoice
- Membuat bot cek invoice otomatis
- Membuat dashboard monitoring sederhana

---

## Live Documentation

Dokumentasi lengkap tersedia di:

```txt
https://docs.leuwongrr.online
```

---

## Cara Mulai

### 1. Login ke akun LeuwongRR

Masuk ke:

```txt
https://leuwongrr.online/login
```

### 2. Buka halaman User API Access

```txt
https://leuwongrr.online/user/api-access
```

### 3. Generate API Token

Klik tombol generate token, lalu simpan token tersebut dengan aman.

### 4. Gunakan Bearer Token

Setiap request API wajib memakai header:

```http
Authorization: Bearer YOUR_USER_API_TOKEN
Accept: application/json
```

---

## Base URL

```txt
https://leuwongrr.online
```

---

## Endpoint User API

Endpoint berikut tersedia untuk user/member:

```txt
GET /api/v1/me
GET /api/v1/me/orders
GET /api/v1/me/orders/{invoice}
GET /api/v1/me/invoices/{invoice}
GET /api/v1/me/invoices/{invoice}/status
```

---

## Contoh Request

### Cek profil API user

```bash
curl -H "Authorization: Bearer YOUR_USER_API_TOKEN" \
https://leuwongrr.online/api/v1/me
```

### Cek daftar order sendiri

```bash
curl -H "Authorization: Bearer YOUR_USER_API_TOKEN" \
https://leuwongrr.online/api/v1/me/orders
```

### Cek status invoice sendiri

```bash
curl -H "Authorization: Bearer YOUR_USER_API_TOKEN" \
https://leuwongrr.online/api/v1/me/invoices/INV20260429113629619/status
```

---

## Contoh Use Case Bot Discord

Misalnya kamu punya bot Discord dan ingin membuat command:

```txt
/cek_invoice INV20260429113629619
```

Bot kamu bisa request ke API:

```bash
curl -H "Authorization: Bearer YOUR_USER_API_TOKEN" \
https://leuwongrr.online/api/v1/me/invoices/INV20260429113629619/status
```

Lalu bot bisa menampilkan hasil seperti:

```txt
Invoice: INV20260429113629619
Status: paid
Type: order
```

---

## Keamanan Token

User API Token adalah akses pribadi ke data akun kamu.

Jangan simpan token di:

- HTML publik
- JavaScript frontend
- GitHub public repository
- URL query seperti `?token=`
- Chat publik
- File yang bisa diakses orang lain

Simpan token di:

- File `.env`
- Backend website
- Server bot
- Secret manager
- Environment variable hosting

---

## Jika Token Bocor

Kalau token dicurigai bocor:

1. Login ke akun LeuwongRR
2. Buka:

```txt
https://leuwongrr.online/user/api-access
```

3. Klik revoke / regenerate token
4. Update token baru di website atau bot kamu

---

## Best Practice Integrasi

Gunakan pola seperti ini:

```txt
Website / Bot User
        ↓
Backend / Server User
        ↓ Authorization: Bearer USER_API_TOKEN
LeuwongRR User API
```

Jangan gunakan pola seperti ini:

```txt
Frontend Browser
        ↓ token terlihat publik
LeuwongRR User API
```

Token harus dipakai dari sisi backend/server agar tidak mudah dicuri.

---

## Link Penting

| Resource | URL |
|---|---|
| Website LeuwongRR | https://leuwongrr.online |
| Login Member | https://leuwongrr.online/login |
| User API Access | https://leuwongrr.online/user/api-access |
| Dokumentasi API | https://docs.leuwongrr.online |

---

<div align="center">

## Siap Integrasi?

Buat API token dari dashboard member dan mulai hubungkan akun LeuwongRR kamu ke website atau bot pribadi.

<a href="https://leuwongrr.online/user/api-access"><strong>🔑 Buat User API Token</strong></a>

</div>
