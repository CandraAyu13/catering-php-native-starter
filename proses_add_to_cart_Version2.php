<?php
session_start();
$id = $_POST['menu_id'];
$qty = intval($_POST['qty']);
if ($qty < 1) $qty = 1;
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] += $qty;
} else {
    $_SESSION['cart'][$id] = $qty;
}
header('Location: ../keranjang.php');