# 🎬 CineTrack - Velvet Cinema Management System

**CineTrack** adalah aplikasi manajemen daftar film berbasis website yang dirancang untuk memudahkan admin dalam mengelola koleksi film di Velvet Cinema. Project ini dibuat menggunakan framework **Laravel 10** dengan desain antarmuka mewah bertema *Maroon & Cream*.

---

👤 Identitas Pengembang
Nama: Naylla Azhiza Zipa
NIM: 2307002
Prodi: Sistem Informasi
Tujuan: Proyek Ujian Akhir Semester (UAS) - Pemrograman Berbasis Website

## 🛠️ Tech Stack
* **Framework:** Laravel 10
* **Language:** PHP 8.1+
* **Database:** MySQL
* **Styling:** Tailwind CSS & FontAwesome
* **Template Engine:** Blade (Laravel)

---

## ✨ Fitur Utama
* **Role-Based Access Control:** Login khusus untuk Admin.
* **Dashboard Admin:** Ringkasan statistik konten film.
* **CRUD Movie Management:**
    * **Create:** Menambah data film baru (Judul, Genre, Rating).
    * **Read:** Menampilkan daftar film dalam tabel yang elegan.
    * **Update:** Mengubah informasi film.
    * **Delete:** Menghapus film dari database.
* **UI/UX Mewah:** Desain eksklusif dengan kombinasi warna Maroon dan Cream.

---

## 🚀 Cara Instalasi

Ikuti langkah-langkah berikut untuk menjalankan project di perangkat lokal Anda:

1.  **Clone Repository**
    ```bash
    git clone [https://github.com/username/2307002-velvetcinema.git](https://github.com/username/2307002-velvetcinema.git)
    cd 2307002-velvetcinema
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    npm install && npm run dev
    ```

3.  **Konfigurasi Environment**
    Salin file `.env.example` menjadi `.env` dan sesuaikan pengaturan database Anda.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Migrasi Database**
    ```bash
    php artisan migrate --seed
    ```

5.  **Jalankan Server**
    ```bash
    php artisan serve
    ```
    Buka `http://127.0.0.1:8000` di browser Anda.

---

## 📂 Struktur Folder View (Penting!)
Pastikan struktur folder Anda sesuai agar tidak terjadi error *View Not Found*:
```text
resources/views/
└── admin/
    ├── manage-movies.blade.php
    ├── add-movie.blade.php
    └── edit-movie.blade.php