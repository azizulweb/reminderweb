Berikut adalah langkah-langkah untuk menyimpan dan memperbarui project di GitHub menggunakan Git:

### 1. **Menyiapkan Repository Git di Lokal (Komputer)**
   - Pastikan Git sudah terinstall di komputer. Kamu bisa cek dengan perintah:
     ```bash
     git --version
     ```
   - Buka terminal atau command prompt di folder project kamu, lalu inisialisasi Git dengan perintah berikut:
     ```bash
     git init
     ```

### 2. **Membuat Repository Baru di GitHub**
   - Buka GitHub dan login ke akunmu.
   - Klik **New Repository**.
   - Isi nama repository (nama project), lalu klik **Create Repository**.
   - Setelah repository dibuat, GitHub akan memberikan URL repository, misalnya:
     ```
     https://github.com/username/nama-repository.git
     ```

### 3. **Menambahkan Repository GitHub ke Project**
   - Di terminal, tambahkan repository GitHub sebagai remote repository dengan perintah:
     ```bash
     git remote add origin https://github.com/username/nama-repository.git
     ```

### 4. **Menyimpan (Commit) dan Mengunggah (Push) Project Pertama Kali**
   - Tambahkan semua file di folder project ke staging area:
     ```bash
     git add .
     ```
   - Buat commit untuk menyimpan perubahan:
     ```bash
     git commit -m "Initial commit"
     ```
   - Kirim project ke repository GitHub:
     ```bash
     git push -u origin main
     ```
   (Jika branch default di GitHub kamu adalah `master`, gunakan `master` di perintah ini.)

### 5. **Memperbarui (Update) Project di GitHub jika Ada Perubahan**
   Jika ada perubahan di project, berikut langkah-langkah untuk mengupdate-nya di GitHub:

   - **Langkah 1:** Tambahkan file yang telah diubah ke staging area:
     ```bash
     git add .
     ```
   - **Langkah 2:** Buat commit baru untuk menyimpan perubahan:
     ```bash
     git commit -m "Deskripsi perubahan yang dilakukan"
     ```
   - **Langkah 3:** Kirim (push) perubahan tersebut ke GitHub:
     ```bash
     git push origin main
     ```

### Tips
- Jika ada konflik (misalnya kamu mengedit di lokal dan ada orang lain yang mengedit di GitHub), gunakan `git pull` untuk mengambil perubahan terbaru dari GitHub, lalu selesaikan konflik sebelum melakukan push.
- Untuk memastikan setiap perubahan ter-update dengan baik, lakukan `commit` setiap kali ada perubahan signifikan, dan selalu perbarui GitHub dengan `push`.

Selamat mencoba, dan semoga membantu!











Berikut adalah panduan lengkap untuk menjalankan project Laravel yang telah di-download dari GitHub, mulai dari instalasi Composer hingga menjalankan server dengan `php artisan serve`:

### 1. **Install Composer**
   Composer adalah dependency manager untuk PHP yang dibutuhkan Laravel untuk mengelola paket-paket yang diperlukan.

   - **Unduh Composer**:  
     Kunjungi [https://getcomposer.org/download/](https://getcomposer.org/download/) dan ikuti petunjuk untuk menginstal Composer sesuai sistem operasi yang kamu gunakan.
   
   - **Verifikasi Instalasi Composer**:  
     Setelah Composer terpasang, buka terminal dan jalankan perintah ini untuk memastikan Composer terinstal dengan benar:
     ```bash
     composer --version
     ```
     Jika Composer sudah terinstal, terminal akan menampilkan versi Composer yang terpasang.

### 2. **Clone atau Download Project dari GitHub**
   - Jika kamu belum memiliki project Laravel, clone project tersebut dari GitHub menggunakan perintah berikut:
     ```bash
     git clone https://github.com/username/repository-name.git
     ```
     Gantilah `https://github.com/username/repository-name.git` dengan URL repo GitHub yang sesuai.

   - Setelah project di-clone, masuk ke folder project Laravel:
     ```bash
     cd nama_folder_project
     ```

### 3. **Install Dependency Project**
   Setelah kamu berada di dalam folder project, jalankan perintah berikut untuk menginstal semua dependensi yang diperlukan oleh Laravel (termasuk vendor seperti Laravel dan paket lainnya):
   ```bash
   composer install
   ```

   Perintah ini akan membaca file `composer.json` dan mengunduh semua paket yang diperlukan untuk menjalankan project Laravel. Proses ini mungkin memerlukan beberapa menit tergantung pada kecepatan koneksi internet kamu.

### 4. **Konfigurasi File `.env`**
   Laravel menggunakan file `.env` untuk pengaturan lingkungan, seperti koneksi database, cache, dll.

   - Biasanya, file `.env` tidak termasuk dalam repositori Git karena bersifat pribadi dan spesifik untuk lingkungan lokal atau server.
   - Jika file `.env` tidak ada setelah download, salin file `.env.example` menjadi `.env` dengan perintah berikut:
     ```bash
     cp .env.example .env
     ```
   
   - **Atur Konfigurasi**:  
     Buka file `.env` dan sesuaikan pengaturan seperti `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` sesuai dengan pengaturan lokal atau server database yang kamu gunakan.

### 5. **Generate Key Laravel**
   Laravel membutuhkan aplikasi key yang unik untuk mengenkripsi session dan data lainnya.

   Jalankan perintah berikut untuk menghasilkan key aplikasi:
   ```bash
   php artisan key:generate
   ```

### 6. **Migrate Database (Opsional)**
   Jika project Laravel memerlukan database dan kamu telah mengonfigurasi database di file `.env`, jalankan migrasi untuk membuat tabel-tabel yang diperlukan di database:
   ```bash
   php artisan migrate
   ```

   Perintah ini akan membuat tabel database sesuai dengan file migrasi yang ada di folder `database/migrations`.

### 7. **Jalankan Server Laravel**
   Setelah semua langkah di atas selesai, kamu dapat menjalankan server Laravel menggunakan perintah:
   ```bash
   php artisan serve
   ```

   Perintah ini akan menjalankan server pengembangan Laravel di `http://127.0.0.1:8000` secara default. Buka browser dan akses alamat tersebut untuk melihat aplikasi Laravel yang sedang berjalan.

### 8. **Masalah Umum**
   Jika kamu menghadapi masalah terkait dependensi atau versi PHP yang tidak sesuai, pastikan versi PHP yang digunakan sesuai dengan persyaratan Laravel yang tertera di file `composer.json`.

### Ringkasan Langkah-Langkah:
1. Install Composer
2. Clone/download project dari GitHub
3. Install dependensi dengan `composer install`
4. Salin dan konfigurasi `.env`
5. Generate aplikasi key dengan `php artisan key:generate`
6. Jalankan migrasi database (jika ada) dengan `php artisan migrate`
7. Jalankan server dengan `php artisan serve`

Setelah mengikuti langkah-langkah ini, aplikasi Laravel seharusnya berjalan di local server kamu!
