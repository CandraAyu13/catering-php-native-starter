<?php
require_once '../config/db.php';
if ($_POST) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $conn->query("INSERT INTO users (nama,email,password,role) VALUES ('$nama','$email','$pass','user')");
    header("Location: login.php?reg=1");
}
?>
<form method="post">
  <input type="text" name="nama" placeholder="Nama Lengkap" required><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <button type="submit">Daftar</button>
</form>