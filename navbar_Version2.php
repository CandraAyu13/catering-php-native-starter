<?php if (!isset($_SESSION)) session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="/index.php">CateringKu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="/index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/menu.php">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="/tentang.php">Tentang Kami</a></li>
        <li class="nav-item"><a class="nav-link" href="/kontak.php">Hubungi Kami</a></li>
        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'user'): ?>
        <li class="nav-item"><a class="nav-link" href="/keranjang.php">Keranjang</a></li>
        <li class="nav-item"><a class="nav-link" href="/pesanan_saya.php">Pesanan Saya</a></li>
        <?php endif; ?>
        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
        <li class="nav-item"><a class="nav-link" href="/admin/">Admin Panel</a></li>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav">
        <?php if (isset($_SESSION['user'])): ?>
            <li class="nav-item"><a class="nav-link" href="/auth/logout.php">Logout</a></li>
        <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="/auth/login.php">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="/auth/register.php">Daftar</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>