<?php
include 'functions.php';
include 'navbar.php';
if (!is_user()) header("Location: auth/login.php");
$uid = $_SESSION['user']['id'];
$q = $conn->query("SELECT * FROM pesanan WHERE user_id=$uid ORDER BY tanggal DESC");
?>
<div class="container">
  <h3>Pesanan Saya</h3>
  <table class="table">
    <tr><th>#</th><th>Tanggal</th><th>Total</th><th>Status</th><th>Bukti Bayar</th><th>Detail</th></tr>
    <?php $no=1; while($p = $q->fetch_assoc()): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $p['tanggal'] ?></td>
      <td>Rp<?= number_format($p['total']) ?></td>
      <td><?= $p['status'] ?></td>
      <td>
        <?php if ($p['bukti_bayar']): ?>
          <a href="uploads/<?= $p['bukti_bayar'] ?>" target="_blank">Lihat</a>
        <?php endif; ?>
      </td>
      <td>
        <a href="detail_pesanan.php?id=<?= $p['id'] ?>" class="btn btn-info btn-sm">Detail</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>