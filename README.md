# PROYEK PBL IF-16: HydroGami - Integration of IoT and Gamification on Hydroponic Plants

HydroGami Admin Panel adalah platform manajemen berbasis web yang dirancang khusus untuk administrator sistem HydroGami. Panel ini memungkinkan pengelolaan menyeluruh terhadap seluruh aspek sistem monitoring hidroponik berbasis IoT dengan fitur gamifikasi.

## Tim Pengembang (HydroGami Team)
- **Jihan Safinatunnaja** (3312301065) - App Development
- **Juan Jonathan Nainggolan** (3312301009) - App Development
- **Yoel Feliks Hutabarat** (3312301083) - Web Developer

## Fitur Utama
- Dashboard analitik pengguna
- Manajemen misi gamifikasi (CRUD)
- Manajemen panduan (CRUD)
- Manajemen reward (CRUD)
- Melihat leaderboard pengguna
- Manajemen profil admin

## Instalasi

### Prasyarat
- PHP 8.0 atau lebih baru
- Composer 2.0+
- MySQL 5.7+ atau MariaDB 10.2+
- Node.js 14.x+ & npm
- Web server (Apache)


### Langkah-langkah Instalasi
1. **Clone repository**
   ```bash
   git clone https://github.com/yourusername/hydrogami-admin.git
   cd hydrogami-admin

2. **Install dependencies**
   composer install
   npm install
   npm run build

3. **Konfigurasi environment**
   cp .env.example .env
   php artisan key:generate

4. **Setup database**
   php artisan migrate --seed

3. **Jalankan aplikasi**
   php artisan serve
   Akses panel di: http://localhost:8000


## Panduan Penggunaan
### 1. Registrasi Akun Baru
1. Akses /register
2. Isi formulir dengan:
   - Nama lengkap
   - Email valid
   - Password (minimal 8 karakter)
3. Klik "Register"


### 2. Login ke Aplikasi
1. Akses /login
2. Masukkan email dan password
3. Klik "Login"


### 3. Dashboard Utama
Halaman utama yang menampilkan:
- Leaderboard: Peringkat pengguna berdasarkan skor
- Grafik Pengguna: Visualisasi aktivitas pengguna
- Menu Navigasi cepat ke semua fitur admin


### 4. Manajemen Misi
#### Tambah Misi Baru:
1. Navigasi ke menu "Misi"
2. Klik "Tambah Misi"
3. Isi form:
   - Nama Misi
   - Jumlah Poin
   - Deskripsi
   - Status (Aktif/Tidak Aktif)
4. Klik "Tambah Misi"

#### Edit Misi:
1. Cari misi di daftar misi
2. Klik ikon "Edit"
3. Modifikasi data
4. Klik "Simpan Perubahan"

#### Hapus Misi:
1. Cari misi di daftar misi
2. Klik ikon "Hapus"
3. Konfirmasi penghapusan


### 5. Manajemen Panduan
#### Tambah Panduan Baru:
1. Navigasi ke menu "Panduan"
2. Klik "Tambah Panduan"
3. Isi form:
   - Judul Panduan
   - Deskripsi
   - Upload gambar
   - Link video youtube
4. Klik "Tambah Panduan"

#### Edit Panduan:
1. Cari panduan di daftar panduan
2. Klik ikon "Edit"
3. Modifikasi data
4. Klik "Simpan Perubahan"

#### Hapus Panduan:
1. Cari panduan di daftar panduan
2. Klik ikon "Hapus"
3. Konfirmasi penghapusan


### 6. Manajemen Reward
#### Tambah Reward Baru:
1. Navigasi ke menu "Reward"
2. Klik "Tambah Reward"
3. Isi form:
   - Tipe (Gacha/Redeem)
   - Subtipe (EXP/Coin/Zonk)
   - Jumlah
4. Klik "Tambah Reward"

#### Edit Reward:
1. Cari rewatd di daftar reward
2. Klik ikon "Edit"
3. Modifikasi data
4. Klik "Simpan Perubahan"

#### Hapus Reward:
1. Cari reward di daftar reward
2. Klik ikon "Hapus"
3. Konfirmasi penghapusan


### 7. Leaderboard
Fitur untuk melihat peringkat pengguna berdasarkan:
- ID Pengguna
- Nama
- Level
- Total Poin
- Total Koin
- Waktu Perolehan


### 8. Manajemen Profil
1. Klik menu profil di navbar
2. Pilih "Edit Profil"
3. Ubah data yang diperlukan
4. Klik "Simpan Perubahan"


### 9. Logout:
1. Klik menu profil di navbar
2. Pilih "Logout"
3. Konfirmasi logout


