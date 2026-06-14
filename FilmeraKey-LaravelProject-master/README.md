<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
  </a>
</p>

<h2 align="center">🎬 FilmeraKey - Laravel API Project</h2>
<p align="center">Sistem manajemen data film berbasis Laravel dengan dukungan API Key dan antarmuka Blade</p>

---

## 📌 Tentang Proyek

**FilmeraKey** adalah aplikasi berbasis Laravel yang dirancang untuk menyediakan sistem pengelolaan data film melalui RESTful API, dengan dukungan **API Key** untuk otorisasi. Aplikasi ini juga memiliki antarmuka pengguna (UI) berbasis Blade untuk interaksi CRUD yang mudah digunakan.

---

## ✨ Fitur Utama

- 🔑 Generate dan manajemen **API Key** per pengguna
- 📡 **CRUD Film** melalui endpoint API (GET, POST, PUT, DELETE)
- 💻 Tampilan responsif menggunakan **Blade Templating**
- 🔐 Middleware otentikasi API Key
- 🔎 Fitur pencarian film
- 🛡️ Validasi input & sanitasi data

---

## 🔌 API Endpoint

Berikut adalah daftar endpoint API yang tersedia dalam aplikasi **FilmeraKey**:

| Endpoint                      | Method | Deskripsi                           |
|------------------------------|--------|-------------------------------------|
| `/api/films`                 | GET    | Ambil semua data film               |
| `/api/films/{id}`            | GET    | Ambil detail film berdasarkan ID    |
| `/api/films`                 | POST   | Tambah film baru                    |
| `/api/films/{id}`            | PUT    | Perbarui data film                  |
| `/api/films/{id}`            | DELETE | Hapus film berdasarkan ID           |
| `/api/films/search?q=judul` | GET    | Cari film berdasarkan judul         |

> 📌 **Semua permintaan ke endpoint harus menyertakan API Key sebagai header otorisasi:**
>
> ```http
> Authorization: Bearer {X_API_KEY}
> ```

---

## 🛠️ Teknologi yang Digunakan

- Laravel 9.52.20
- Blade Templating Engine
- Laravel Routing & Validation
- PHP 8.2.12
- phpMyAdmin / MySQL

---

## 🚀 Instalasi dan Setup

1. **Clone Repository**
   ```bash
   git clone https://github.com/prudenciaelvt/FilmeraKey-LaravelProject.git
   cd FilmeraKey-LaravelProject

📬 Kontak
Developer: @prudenciaelvt prudenciaputrii@gmail.com

