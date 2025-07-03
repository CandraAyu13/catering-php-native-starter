<?php
require_once '../functions.php';
redirect_if_not_admin();
$result = $conn->query("SELECT p.*, u.nama as user FROM pesanan p JOIN users u ON p.user_id=u.id ORDER BY p.tanggal DESC");
include '../navbar.php';
?>
<div class="container">
  <h3>Kelola Pesanan</h3>
  <table class="table">
    <tr><th>#</th><th>Pemesan</th><th>Tanggal</th><th>Total</th><th>Status</th><th>Bukti</th><th>Action</th></tr>
    <?php $no=1; while($p = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $p['user'] ?></td>
      <td><?= $p['tanggal'] ?></td>
      <td>Rp<?= number_format($p['total']) ?></td>
      <td><?= $p['status'] ?></td>
      <td>
        <?php if ($p['bukti_bayar']): ?>
          <a href="../uploads/<?= $p['bukti_bayar'] ?>" target="_blank">Lihat</a>
        <?php endif; ?>
      </td>
      <td>
        <form action="../proses/update_status.php" method="post" style="display:inline">
          <input type="hidden" name="id" value="<?= $p['id'] ?>">
          <select name="status" class="form-select form-select-sm">
            <option <?= $p['status']=="Menunggu"?'selected':'' ?>>Menunggu</option>
            <option <?= $p['status']=="Diproses"?'selected':'' ?>>Diproses</option>
            <option <?= $p['status']=="Dikirim"?'selected':'' ?>>Dikirim</option>
            <option <?= $p['status']=="Selesai"?'selected':'' ?>>Selesai</option>
          </select>
          <button type="submit" class="btn btn-success btn-sm">Update</button>
        </form>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>