<?php
session_start();
$id = $_GET['id'];
unset($_SESSION['cart'][$id]);
header('Location: ../keranjang.php');