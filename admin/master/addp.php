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
if (in_array($imageFileType, $extensions_arr)) {
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name)) {
        $query = "INSERT INTO produk 
                        VALUES('$code', '$nama', '" . $name . "', '$desc', '$price')";
        mysqli_query($conn, $query);
    }
}
header('Location: produk.php');
