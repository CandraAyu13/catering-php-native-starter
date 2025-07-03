<?php
include 'functions.php';
include 'navbar.php';

$id = intval($_GET['id']);
$kat = $conn->query("SELECT * FROM kategori WHERE id=$id")->fetch_assoc();
$menu = $conn->query("SELECT * FROM menu WHERE kategori_id=$id");
?>
<div class="container">
    <h3 class="mb-3"><?= $kat['nama'] ?></h3>
    <div class="row">
    <?php while ($m = $menu->fetch_assoc()): ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/images/<?= $m['gambar'] ?>" class="card-img-top" alt="<?= $m['nama'] ?>">
          <div class="card-body">
            <h5 class="card-title"><?= $m['nama'] ?></h5>
            <p class="card-text"><?= $m['deskripsi'] ?></p>
            <p class="card-text"><b>Rp<?= number_format($m['harga']) ?></b></p>
            <form action="proses/add_to_cart.php" method="post">
              <input type="hidden" name="menu_id" value="<?= $m['id'] ?>">
              <input type="number" name="qty" value="1" min="1" class="form-control mb-2" style="width:80px;display:inline">
              <button type="submit" class="btn btn-success">+ Keranjang</button>
            </form>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
    </div>
</div>