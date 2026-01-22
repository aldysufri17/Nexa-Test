# 🚀 Nexa-Test – Task Manager Application

Nexa-Test adalah aplikasi web sederhana untuk mengelola daftar tugas (Task Manager) dengan sistem autentikasi.  
Aplikasi ini dibuat sebagai implementasi **Laravel 12** dan **Vue.js 3** dengan penerapan autentikasi menggunakan **JWT (JSON Web Token)**.

---

## ✨ Fitur Aplikasi

Aplikasi ini memiliki beberapa fitur utama:

1. Login pengguna  
2. Register pengguna  
3. Membuat daftar tugas  
4. Mengedit tugas  
5. Menghapus tugas  
6. Filter task berdasarkan status dan tanggal deadline  

---

## ⚙️ Teknologi yang Digunakan

- **Backend** : Laravel 12 + JWT Authentication  
- **Frontend** : Vue.js 3  
- **Database** : MySQL  
- **Tools** : Git, GitHub, Postman  

---

## 🚀 Langkah Menjalankan Sistem (Tanpa Docker)

### 🔹 Backend
```bash
# Masuk ke folder backend
cd backend

# Install dependency
composer install

# Copy file environment
cp .env.example .env

# Generate application key
php artisan key:generate

# Setting database di file .env
DB_DATABASE=db_nexa
DB_USERNAME=root
DB_PASSWORD=

# Jalankan migrasi database
php artisan migrate

# Jalankan server backend
php artisan serve --port=8099
```

### 🔹 Frontend
```bash
# Masuk ke folder frontend
cd frontend

# Install dependency
npm install

# Jalankan frontend
npm run dev
```


---


###  🐳 Menjalankan dengan Docker (Direkomendasikan)

Pastikan Docker dan Docker Compose sudah terinstall di sistem Anda.

```bash
# Jalankan seluruh container (backend, frontend, database)
docker compose up --build

# Masuk ke container nexa-api-app (backend) 
# Lakukan instalasi aplikasi backend seperti Langkah Menjalankan Sistem (Tanpa Docker)
docker exec -it nexa-api-app sh

# Masuk ke container nexa-api-app (frontend) 
# Lakukan instalasi aplikasi backend seperti Langkah Menjalankan Sistem (Tanpa Docker)
docker exec -it nexa-web sh
```


---


## 🔐 Informasi Login Dummy
Email    : test@example.com  
Password : password  


---


## 🗄️ Struktur Database

**Tabel Users**
| Field      | Type      |
| ---------- | --------- |
| id         | bigint    |
| name       | string    |
| email      | string    |
| password   | string    |
| created_at | timestamp |
| updated_at | timestamp |

**Tabel Tasks**
| Field       | Type      | Keterangan             |
| ----------- | --------- | ---------------------- |
| id          | bigint    | Primary key            |
| user_id     | bigint    | Relasi ke users        |
| title       | string    | Judul task             |
| description | text      | Deskripsi task         |
| status      | enum      | todo / progress / done |
| deadline    | date      | Tanggal deadline       |
| created_at  | timestamp |                        |
| updated_at  | timestamp |                        |


---


## 📷 Screenshot
<img width="623" height="546" alt="Screenshot from 2026-01-22 18 07 52" src="https://github.com/user-attachments/assets/83e46039-3273-4e6e-bfe3-4e397233580b" />
<img width="1340" height="771" alt="Screenshot from 2026-01-22 18 08 33" src="https://github.com/user-attachments/assets/f43b6184-3326-44a3-9a94-a62c33098d68" />
<img width="467" height="474" alt="Screenshot from 2026-01-22 18 08 06" src="https://github.com/user-attachments/assets/8742fc69-0911-4142-834a-db3f6a63c31e" />

