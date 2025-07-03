<?php
include 'functions.php';
include 'navbar.php';
if (!is_user()) header("Location: auth/login.php");
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) die("Keranjang kosong.");
?>
<div class="container">
  <h3>Checkout</h3>
  <form action="proses/checkout.php" method="post" enctype="multipart/form-data">
    <div class="mb-2">
      <label>Nama Lengkap</label>
      <input type="text" name="nama" class="form-control" required value="<?= $_SESSION['user']['nama'] ?>">
    </div>
    <div class="mb-2">
      <label>No HP</label>
      <input type="text" name="no_hp" class="form-control" required>
    </div>
    <div class="mb-2">
      <label>Alamat Pengiriman</label>
      <textarea name="alamat" class="form-control" required></textarea>
    </div>
    <div class="mb-2">
      <label>Catatan</label>
      <textarea name="catatan" class="form-control"></textarea>
    </div>
    <div class="mb-2">
      <label>Pembayaran via QRIS (scan QR di bawah)</label><br>
      <img src="assets/images/qris.png" style="max-width:200px"><br>
      <input type="file" name="bukti" required class="form-control">
      <small>Upload bukti pembayaran setelah transfer</small>
    </div>
    <button type="submit" class="btn btn-success mt-3">Kirim Pesanan</button>
  </form>
</div>