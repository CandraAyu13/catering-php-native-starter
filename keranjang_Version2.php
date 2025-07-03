<?php
include 'functions.php';
include 'navbar.php';
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
  echo "<div class='container'><h3>Keranjang kosong.</h3></div>";
  exit;
}
?>
<div class="container">
  <h3>Keranjang Belanja</h3>
  <table class="table">
    <tr>
      <th>#</th><th>Menu</th><th>Qty</th><th>Harga</th><th>Subtotal</th><th></th>
    </tr>
    <?php
    $no = 1; $total = 0;
    foreach ($_SESSION['cart'] as $id => $qty):
      $menu = $conn->query("SELECT * FROM menu WHERE id=$id")->fetch_assoc();
      $subtotal = $qty * $menu['harga'];
      $total += $subtotal;
    ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $menu['nama'] ?></td>
      <td><?= $qty ?></td>
      <td>Rp<?= number_format($menu['harga']) ?></td>
      <td>Rp<?= number_format($subtotal) ?></td>
      <td>
        <a href="proses/remove_cart.php?id=<?= $id ?>" class="btn btn-danger btn-sm">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
    <tr>
      <th colspan="4">Total</th>
      <th colspan="2">Rp<?= number_format($total) ?></th>
    </tr>
  </table>
  <a href="checkout.php" class="btn btn-success">Checkout</a>
</div>