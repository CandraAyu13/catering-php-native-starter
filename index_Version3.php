<?php
include 'functions.php';
include 'navbar.php';
?>
<div class="container">
    <h2 class="mb-4 text-center">Katalog Menu Catering</h2>
    <div class="row">
        <?php
        $result = $conn->query("SELECT * FROM kategori");
        while ($kat = $result->fetch_assoc()):
        ?>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
              <img src="assets/images/<?= $kat['gambar'] ?>" class="card-img-top" alt="<?= $kat['nama'] ?>">
              <div class="card-body">
                <h5 class="card-title"><?= $kat['nama'] ?></h5>
                <p class="card-text"><?= $kat['deskripsi'] ?></p>
                <a href="kategori.php?id=<?= $kat['id'] ?>" class="btn btn-primary w-100">Lihat Menu</a>
              </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>