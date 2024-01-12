<?php
include '../connect/conn.php';
session_start();
$hal = $_GET['hal'];
$custcode = $_SESSION['kode'];
$codep = $_GET['kodeproduk'];
if (isset($_GET['hal'])) {
    $qty = $_GET['hal'];
}

$res = mysqli_query($conn, "SELECT * FROM produk WHERE kodeproduk = '$codep'");
$row = mysqli_fetch_assoc($res);
$pname = $row['nama'];
$code = $row['kodeproduk'];
$price = $row['harga'];

if ($hal == 1) {
    $check = mysqli_query($conn, "SELECT * FROM cart WHERE kodeproduk = '$codep' AND kode = '$custcode'");
    $jml = mysqli_num_rows($check);
    $rows = mysqli_fetch_assoc($check);
    if ($jml > 0) {
        $set = $rows['qty'] + 1;
        $update = mysqli_query($conn, "UPDATE cart SET qty = '$set' WHERE kodeproduk = '$codep' AND kode = '$custcode'");
        if ($update) {
            echo "<script>
                    alert('BERHASIL DITAMBAHKAN KE KERANJANG');
                    window.location = '../home/cart.php';
                    </script>";
            die;
        }
    } else {
        $insert = mysqli_query($conn, "INSERT INTO cart VALUES('', '$custcode', '$codep', '$pname', '1', '$price')");
        if ($insert) {
            echo "<script>
                    alert('BERHASIL DITAMBAHKAN KE KERANJANG');
                    window.location = '../home/cart.php';
                    </script>";
            die;
        }
    }
} else {
    $check = mysqli_query($conn, "SELECT * FROM cart WHERE kodeproduk = '$codep' AND kode = '$custcode'");
    $jml = mysqli_num_rows($check);
    $rows = mysqli_fetch_assoc($check);
    if ($jml > 0) {
        $set = $rows['qty'] + $qty;
        $update = mysqli_query($conn, "UPDATE cart SET qty = '$set' WHERE kodeproduk = '$codep' AND kode = '$custcode'");
        if ($update) {
            echo "<script>
                alert('BERHASIL DITAMBAHKAN KE KERANJANG');
                window.location = '../product/product_detail.php?kodeproduk=" . $codep . "';
                </script>";
            die;
        }
    } else {
        $insert = mysqli_query($conn, "INSERT INTO cart VALUES('', '$custcode', '$code', '$pname', '$qty', '$price')");
        if ($insert) {
            echo "<script>
                alert('BERHASIL DITAMBAHKAN KE KERANJANG');
                window.location = '../product/product_detail.php?kodeproduk=" . $codep . "';
                </script>";
            die;
        }
    }
}
