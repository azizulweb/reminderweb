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
