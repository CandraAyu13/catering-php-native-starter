<?php
require_once '../config/db.php';
$id = intval($_POST['id']);
$status = $_POST['status'];
$conn->query("UPDATE pesanan SET status='$status' WHERE id=$id");
header('Location: ../admin/pesanan.php');