<?php
require_once '../functions.php';
redirect_if_not_admin();
$result = $conn->query("SELECT m.*, k.nama as kategori FROM menu m JOIN kategori k ON m.kategori_id=k.id");
include '../navbar.php';
?>
<div class="container">
  <h3>Kelola Menu</h3>
  <a href="tambah_menu.php" class="btn btn-primary mb-2">Tambah Menu</a>
  <table class="table">
    <tr><th>#</th><th>Menu</th><th>Kategori</th><th>Harga</th><th></th></tr>
    <?php $no=1; while($m = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $m['nama'] ?></td>
      <td><?= $m['kategori'] ?></td>
      <td>Rp<?= number_format($m['harga']) ?></td>
      <td>
        <a href="edit_menu.php?id=<?= $m['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="hapus_menu.php?id=<?= $m['id'] ?>" class="btn btn-danger btn-sm"
           onclick="return confirm('Hapus menu ini?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>