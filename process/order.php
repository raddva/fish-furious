<?php
include '../connect/conn.php';
session_start();
$custcode = $_SESSION['kode'];
$total = $_POST['total'];
$nama = $_POST['nama'];
$prov = $_POST['prov'];
$kota = $_POST['kota'];
$alamat = $_POST['alamat'];
$kpos = $_POST['kodepos'];
$date = date('yy-m-d');

$kode = mysqli_query($conn, "SELECT invoice FROM checkout ORDER BY invoice DESC");
$data = mysqli_fetch_assoc($kode);
$num = substr($data['invoice'], 3, 4);
$add = (int) $num + 1;
if (strlen($add) == 1) {
    $format = "INV000" . $add;
} else if (strlen($add) == 2) {
    $format = "INV00" . $add;
} else if (strlen($add) == 3) {
    $format = "INV0" . $add;
} else {
    $format = "INV" . $add;
}

mysqli_query($conn, "INSERT INTO checkout VALUES('', '$format', '$custcode', '$total', '$nama', '$prov', '$kota', '$alamat', '$kpos')");
mysqli_query($conn, "DELETE FROM cart WHERE kode = '$custcode'");
$_SESSION['no'] = 0;
header('Location: ../home/cart.php');
