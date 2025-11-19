<?php
include("koneksi.php");
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Data Barang</title>
</head>
<body>
    <div class="container">
        <h1>Data Barang</h1>
        <div class="main">
            <a href="tambah.php">+ Tambah Barang</a>
            <table>
            <tr>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php if($result && mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td>
                      <?php if(!empty($row['gambar'])): ?>
                        <img src="<?= $row['gambar']; ?>" alt="<?= htmlspecialchars($row['nama']); ?>" style="width:80px;">
                      <?php else: ?>
                        -
                      <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= htmlspecialchars($row['kategori']); ?></td>
                    <td><?= number_format($row['harga_jual'],0,',','.'); ?></td>
                    <td><?= number_format($row['harga_beli'],0,',','.'); ?></td>
                    <td><?= (int)$row['stok']; ?></td>
                    <td>
                      <a href="ubah.php?id=<?= $row['id_barang']; ?>">Ubah</a> |
                      <a href="hapus.php?id=<?= $row['id_barang']; ?>" onclick="return confirm('Hapus data?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
            <tr>
                <td colspan="7">Belum ada data</td>
            </tr>
            <?php endif; ?>
            </table>
        </div>
    </div>
</body>
</html>