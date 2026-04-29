<div align="center">

# LeuwongRR API Docs

Dokumentasi resmi untuk integrasi **LeuwongRR REST API**  
Ringan, aman, dan siap dipakai untuk **website**, **bot**, dan **otomatisasi sistem**.

<p>
  <a href="https://docs.leuwongrr.online"><img src="https://img.shields.io/badge/Docs-Online-7eff2f?style=for-the-badge" alt="Docs Online"></a>
  <a href="https://leuwongrr.online"><img src="https://img.shields.io/badge/Website-LeuwongRR-0f172a?style=for-the-badge" alt="Website"></a>
  <img src="https://img.shields.io/badge/REST%20API-v1-16a34a?style=for-the-badge" alt="REST API v1">
  <img src="https://img.shields.io/badge/User%20API-Enabled-22c55e?style=for-the-badge" alt="User API">
</p>

<p>
  <a href="https://docs.leuwongrr.online">Live Docs</a>
  ·
  <a href="https://leuwongrr.online/user/api-access">User API Access</a>
  ·
  <a href="https://leuwongrr.online">Main Website</a>
</p>

</div>

---

## ✨ Tentang LeuwongRR API

**LeuwongRR REST API** dibuat untuk mempermudah integrasi antara sistem LeuwongRR dengan:

- Website user
- Bot Discord / Telegram
- Dashboard internal
- Sistem monitoring invoice
- Callback pembayaran
- Otomatisasi order dan status transaksi

API ini dirancang tetap **ringan untuk shared hosting**, namun tetap aman dan nyaman dipakai developer.

---

## 🌐 Live Documentation

Akses dokumentasi lengkap di:

```txt
https://docs.leuwongrr.online
```

---

## 🚀 Kenapa LeuwongRR API?

- **Mudah diintegrasikan** untuk website atau bot
- **Aman** dengan Bearer Token
- **Mendukung User API Token** untuk member
- **Dokumentasi online** yang rapi dan mudah dibaca
- **Cocok untuk shared hosting**
- **Endpoint fokus ke transaksi inti**, jadi lebih efisien

---

## 📚 Yang Tersedia di Dokumentasi

| Halaman | Keterangan |
|---|---|
| Introduction | Gambaran umum REST API LeuwongRR |
| Quickstart | Panduan mulai cepat |
| Authentication | Cara penggunaan Bearer Token |
| User API Access | Akses API untuk member |
| Errors | Format error dan respons |
| API Reference | Daftar endpoint utama |

---

## 🔑 Fitur Utama

### Admin / Internal API
- Create order
- Get order detail
- Get invoice detail
- Get invoice status
- Payment callback endpoint

### User API
- Get current user (`/api/v1/me`)
- List own orders
- Get own order detail
- Get own invoice detail
- Get own invoice status

---

## ⚡ Quick Start

### Base URL

```txt
https://leuwongrr.online
```

### Authentication Header

```http
Authorization: Bearer YOUR_API_TOKEN
Accept: application/json
```

### Contoh Request

```bash
curl -H "Authorization: Bearer YOUR_API_TOKEN" \
https://leuwongrr.online/api/v1/me
```

---

## 👤 User API Access

Member dapat membuat token sendiri dari halaman berikut:

```txt
https://leuwongrr.online/user/api-access
```

Dengan token ini, user hanya bisa mengakses **data miliknya sendiri** secara aman.

Endpoint user yang tersedia:

```txt
GET /api/v1/me
GET /api/v1/me/orders
GET /api/v1/me/orders/{invoice}
GET /api/v1/me/invoices/{invoice}
GET /api/v1/me/invoices/{invoice}/status
```

---

## 🤖 Cocok Untuk

LeuwongRR API cocok dipakai untuk:

- **Website user** yang ingin menampilkan status invoice otomatis
- **Bot Discord** untuk cek order / invoice
- **Bot Telegram** untuk monitoring transaksi
- **Panel internal** untuk operasional admin
- **Integrasi sistem pembayaran** melalui callback

---

## 🛡️ Catatan Keamanan

Untuk keamanan penggunaan API:

- Gunakan token hanya di **backend / server / bot**
- **Jangan simpan token di frontend/public JavaScript**
- Jangan kirim token lewat query string seperti `?token=`
- Gunakan fitur **revoke** / **regenerate** jika token dicurigai bocor
- Pisahkan token **admin** dan **user**

---

## 🔗 Link Penting

- **Website Utama**  
  https://leuwongrr.online

- **Live Documentation**  
  https://docs.leuwongrr.online

- **User API Access**  
  https://leuwongrr.online/user/api-access

---

## 📦 Repository Purpose

Repository ini digunakan sebagai sumber dokumentasi **Mintlify** untuk **LeuwongRR API**.

Setiap perubahan pada file dokumentasi akan otomatis terdeploy ke:

```txt
https://docs.leuwongrr.online
```

---

<div align="center">

## LeuwongRR API

**Lebih cepat diintegrasikan, lebih rapi didokumentasikan, dan siap dipakai untuk automation.**

</div>
