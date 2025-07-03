<?php
session_start();
require_once '../config/db.php';
$user_id = $_SESSION['user']['id'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$catatan = $_POST['catatan'];
$total = 0;
foreach ($_SESSION['cart'] as $id => $qty) {
    $m = $conn->query("SELECT * FROM menu WHERE id=$id")->fetch_assoc();
    $total += $qty * $m['harga'];
}
$bukti = $_FILES['bukti']['name'];
$tmp = $_FILES['bukti']['tmp_name'];
$upload = '../uploads/' . time() . '_' . $bukti;
move_uploaded_file($tmp, $upload);
$namafile = basename($upload);
$conn->query("INSERT INTO pesanan (user_id,nama,no_hp,alamat,catatan,total,tanggal,status,bukti_bayar) VALUES
  ($user_id,'$nama','$no_hp','$alamat','$catatan',$total,NOW(),'Menunggu','$namafile')");
$pesanan_id = $conn->insert_id;
foreach ($_SESSION['cart'] as $id => $qty) {
    $m = $conn->query("SELECT * FROM menu WHERE id=$id")->fetch_assoc();
    $conn->query("INSERT INTO pesanan_item (pesanan_id,menu_id,qty,harga) VALUES
      ($pesanan_id,$id,$qty,{$m['harga']})");
}
unset($_SESSION['cart']);
header("Location: ../pesanan_saya.php");