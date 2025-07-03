<?php
require_once '../config/db.php';
session_start();
if ($_POST) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $q = $conn->query("SELECT * FROM users WHERE email='$email'");
    $u = $q->fetch_assoc();
    if ($u && password_verify($pass, $u['password'])) {
        $_SESSION['user'] = $u;
        header("Location: /index.php");
    } else {
        $err = "Login gagal!";
    }
}
?>
<form method="post">
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <button type="submit">Login</button>
  <?php if (isset($err)) echo "<p>$err</p>"; ?>
</form>