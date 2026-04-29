# LeuwongRR API Docs

Dokumentasi resmi untuk integrasi **LeuwongRR REST API**.  
Dibuat untuk membantu developer, website owner, dan bot owner agar bisa terhubung dengan sistem **order**, **invoice**, **payment callback**, dan **User API Access** dengan lebih mudah.

## 🌐 Live Documentation

Akses dokumentasi lengkap di:

```txt
https://docs.leuwongrr.online
🚀 Kenapa LeuwongRR API?

LeuwongRR API dirancang untuk integrasi yang ringan, aman, dan mudah digunakan, termasuk untuk kebutuhan:

Website user
Bot Discord / Telegram
Dashboard internal
Cek invoice otomatis
Monitoring status order
Integrasi callback pembayaran
📚 Yang Tersedia di Dokumentasi

Dokumentasi ini mencakup:

Introduction
Quickstart
Authentication
User API Access
Error Response
API Reference
🔑 Fitur Utama
REST API v1
Admin API Token
User API Token
Endpoint khusus user: /api/v1/me/*
Dokumentasi online yang mudah diakses
Struktur aman untuk shared hosting
⚡ Quick Start

Gunakan base URL berikut:

https://leuwongrr.online

Contoh autentikasi dengan Bearer Token:

Authorization: Bearer YOUR_API_TOKEN
Accept: application/json

Contoh request:

curl -H "Authorization: Bearer YOUR_API_TOKEN" \
https://leuwongrr.online/api/v1/me
👤 Untuk User / Member

User dapat membuat token sendiri melalui dashboard member untuk mengakses data miliknya sendiri secara aman.

Halaman user API access:

https://leuwongrr.online/user/api-access
🔗 Link Penting
Website utama: https://leuwongrr.online
API Docs: https://docs.leuwongrr.online
User API Access: https://leuwongrr.online/user/api-access
🛡️ Catatan Keamanan
Jangan simpan token di frontend/public JavaScript
Gunakan token hanya di backend / server / bot
Jangan bagikan token ke pihak lain
Gunakan fitur regenerate / revoke bila token dicurigai bocor
📌 Repository Purpose

Repository ini digunakan sebagai sumber dokumentasi Mintlify untuk LeuwongRR API.
Setiap perubahan pada file dokumentasi akan otomatis terdeploy ke dokumentasi online.

LeuwongRR API — integrasi lebih cepat, dokumentasi lebih rapi, dan siap dipakai untuk automation.
