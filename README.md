# Lab8Web

Oke Tir, gw buatin **README.md untuk Praktikum 8: PHP & Database MySQL**, formatnya **rapi, jelas, dan mirip template yang lo kirim**, tapi isinya khusus praktikum CRUD ini. Tinggal lo upload ke repo GitHub lo, langsung terlihat profesional banget 😎🔥

---

# 🧾 **README.md – Praktikum 8: PHP dan Database MySQL**

Praktikum ini bertujuan untuk memahami dasar pengelolaan **database MySQL** serta menghubungkannya dengan **PHP** untuk membuat aplikasi **CRUD (Create, Read, Update, Delete)** sederhana.
Pada praktikum ini, mahasiswa membangun aplikasi pengelolaan *data barang* yang meliputi proses menambah, menampilkan, mengubah, dan menghapus data.

---

## 🎯 Tujuan

1. Mahasiswa mampu memahami konsep dasar database.
2. Mahasiswa mampu menggunakan MySQL melalui phpMyAdmin.
3. Mahasiswa mampu membuat koneksi PHP ke MySQL.
4. Mahasiswa mampu mengimplementasikan operasi CRUD pada PHP.
5. Mahasiswa mampu membuat aplikasi CRUD sederhana dengan struktur folder yang terorganisir.

---

## 🧠 Dasar Teori

### Apa itu Database?

**Database** adalah kumpulan data yang disimpan secara terstruktur sehingga mudah diakses, dikelola, dan diperbarui.

### Apa itu CRUD?

CRUD adalah empat operasi dasar yang dilakukan pada data:

* **Create** → Menambah data baru
* **Read** → Menampilkan/mengambil data
* **Update** → Mengubah data
* **Delete** → Menghapus data

### PHP + MySQL

PHP menyediakan fungsi seperti `mysqli_connect()`, `mysqli_query()`, dan `mysqli_fetch_array()` untuk berinteraksi dengan database.

---

## 🧩 Langkah Praktikum

### 1. Menjalankan MySQL dan phpMyAdmin

Aktifkan **Apache** dan **MySQL** melalui XAMPP.
Kemudian buka phpMyAdmin:

```
http://localhost/phpmyadmin/
```

---

### 2. Membuat Database dan Tabel

#### 📌 Membuat database

```sql
CREATE DATABASE latihan1;
```

#### 📌 Membuat tabel `data_barang`

```sql
CREATE TABLE data_barang (
  id_barang int(10) auto_increment PRIMARY KEY,
  kategori varchar(30),
  nama varchar(30),
  gambar varchar(100),
  harga_beli decimal(10,0),
  harga_jual decimal(10,0),
  stok int(4)
);
```

---

### 3. Menambahkan Data Awal

```sql
INSERT INTO data_barang (kategori, nama, gambar, harga_beli, harga_jual, stok)
VALUES
('Elektronik', 'HP Samsung Android', 'hp_samsung.jpg', 2000000, 2400000, 5),
('Elektronik', 'HP Xiaomi Android', 'hp_xiaomi.jpg', 1000000, 1400000, 5),
('Elektronik', 'HP OPPO Android', 'hp_oppo.jpg', 1800000, 2300000, 5);
```

---

## 🗂️ Struktur Folder

```
lab8_php_database/
├── index.php
├── tambah.php
├── ubah.php
├── hapus.php
├── koneksi.php
├── style.css
└── gambar/
    ├── samsung.jpg
    ├── oppo.jpg
    └── xiaomi.png
```

---

## 🧱 4. Membuat Program CRUD

### 📌 **Koneksi Database (koneksi.php)**

File ini digunakan untuk menghubungkan PHP ke MySQL.

```php
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "latihan1";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    echo "Koneksi gagal!";
    die();
}
?>
```

---

## 📄 5. Menampilkan Data (Read) – `index.php`

Bagian ini menampilkan seluruh data barang dalam tabel, termasuk gambar.

> Screenshot index di sini

---

## ➕ 6. Menambah Data (Create) – `tambah.php`

File ini berisi form untuk memasukkan data baru ke database, termasuk upload gambar.

> Screenshot tambah.php di sini

---

## ✏️ 7. Mengubah Data (Update) – `ubah.php`

Mengedit data berdasarkan `id_barang` yang dipilih.

> Screenshot ubah.php di sini

---

## ❌ 8. Menghapus Data (Delete) – `hapus.php`

Menghapus data berdasarkan ID:

```php
<?php
include_once 'koneksi.php';
$id = $_GET['id'];
$sql = "DELETE FROM data_barang WHERE id_barang = '{$id}'";
mysqli_query($conn, $sql);
header('location: index.php');
?>
```

---

## 📸 Screenshot Hasil

# Screenshoot 1
![Koneksi](https://github.com/tir890/Lab8Web/blob/25115d690fa79ed7cf408e4768dae83c5b48a91a/image.png)

# Screenshoot 2
![Index](https://github.com/tir890/Lab8Web/blob/82ad28f9a96d585c3e4a5e4c9fea07b28f6124a4/image.png)

# Screenshhot 3
![Tambah](https://github.com/tir890/Lab8Web/blob/6bc0d916a15712dbf74f342198f774f238fb1b86/image.png)

# Screenshoot 4
<img width="1456" height="739" alt="image" src="https://github.com/user-attachments/assets/8c9fe9b6-9ae1-45ba-a0e5-8bf474ca1471" />

# Screenshoot 5
![Finish](https://github.com/tir890/Lab8Web/blob/084d742681a287257205b155379f53a72fd0136d/image.png)


---

## 🧾 Kesimpulan

Pada praktikum ini, mahasiswa memahami cara:

* Membuat database dan tabel MySQL
* Menjalankan MySQL melalui XAMPP
* Membuat koneksi PHP–MySQL
* Mengimplementasikan proses CRUD
* Mengelola data dengan upload gambar
* Menyusun struktur aplikasi web berbasis PHP

Dengan memahami konsep ini, mahasiswa telah menguasai dasar pengembangan web dinamis berbasis database.
