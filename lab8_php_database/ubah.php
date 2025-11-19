<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
    $id = (int)$_POST['id'];
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $harga_jual = (int)$_POST['harga_jual'];
    $harga_beli = (int)$_POST['harga_beli'];
    $stok = (int)$_POST['stok'];
    $gambar = null;

    if (isset($_FILES['file_gambar']) && $_FILES['file_gambar']['error'] == 0) {
        $filename = str_replace(' ', '_', basename($_FILES['file_gambar']['name']));
        $destination = dirname(__FILE__) . '/gambar/' . $filename;
        if (move_uploaded_file($_FILES['file_gambar']['tmp_name'], $destination)) {
            $gambar = 'gambar/' . $filename;
        }
    }

    $sql = "UPDATE data_barang SET
              nama = '{$nama}',
              kategori = '{$kategori}',
              harga_jual = '{$harga_jual}',
              harga_beli = '{$harga_beli}',
              stok = '{$stok}'";
    if (!empty($gambar)) $sql .= ", gambar = '{$gambar}'";
    $sql .= " WHERE id_barang = '{$id}'";

    mysqli_query($conn, $sql);
    header('Location: index.php');
    exit;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$sql = "SELECT * FROM data_barang WHERE id_barang = '{$id}'";
$result = mysqli_query($conn, $sql);
if (!$result || mysqli_num_rows($result) == 0) die('Error: Data tidak tersedia');
$data = mysqli_fetch_assoc($result);

function is_select($var, $val) { return $var == $val ? 'selected="selected"' : ''; }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Ubah Barang</title>
</head>
<body>
<div class="container">
    <h1>Ubah Barang</h1>
    <div class="main">
        <form method="post" action="ubah.php" enctype="multipart/form-data">
            <div class="input"><label>Nama Barang</label><input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required /></div>
            <div class="input"><label>Kategori</label>
                <select name="kategori">
                    <option <?= is_select('Komputer', $data['kategori']); ?> value="Komputer">Komputer</option>
                    <option <?= is_select('Elektronik', $data['kategori']); ?> value="Elektronik">Elektronik</option>
                    <option <?= is_select('Hand Phone', $data['kategori']); ?> value="Hand Phone">Hand Phone</option>
                </select>
            </div>
            <div class="input"><label>Harga Jual</label><input type="number" name="harga_jual" value="<?= (int)$data['harga_jual']; ?>" required /></div>
            <div class="input"><label>Harga Beli</label><input type="number" name="harga_beli" value="<?= (int)$data['harga_beli']; ?>" required /></div>
            <div class="input"><label>Stok</label><input type="number" name="stok" value="<?= (int)$data['stok']; ?>" required /></div>
            <div class="input"><label>File Gambar (kosongkan bila tidak ganti)</label><input type="file" name="file_gambar" accept="image/*" /></div>
            <div class="submit">
                <input type="hidden" name="id" value="<?= (int)$data['id_barang']; ?>" />
                <input type="submit" name="submit" value="Simpan" />
            </div>
        </form>
    </div>
</div>
</body>
</html>