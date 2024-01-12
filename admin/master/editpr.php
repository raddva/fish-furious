<?php
include '../../connect/conn.php';

$code = $_POST['code'];
$nama = $_POST['name'];
$desc = $_POST['desc'];
$price = $_POST['price'];


$name = $_FILES['file']['name'];
$target_dir = "../../product/upload/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$extensions_arr = array("jpg", "jpeg", "png", "gif");
$imagetmp = $_FILES['file']['tmp_name'];

$query = "UPDATE produk SET nama = '$nama', `image` = '$name', 
        deskripsi = '$desc', harga = '$price' WHERE kodeproduk = '$code'";
mysqli_query($conn, $query);

header('Location: produk.php');
