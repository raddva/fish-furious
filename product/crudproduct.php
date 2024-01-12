<?php

function displayProduct()
{
    include '../connect/conn.php';
    $data = [];
    $i = 0;
    $query = mysqli_query($conn, "SELECT * FROM produk");
    while ($rows = mysqli_fetch_array($query)) {
        $data[$i]['code'] = $rows['kodeproduk'];
        $data[$i]['name'] = $rows['nama'];
        $data[$i]['image'] = $rows['image'];
        $data[$i]['desc'] = $rows['deskripsi'];
        $data[$i]['price'] = $rows['harga'];
    }
    mysqli_close($conn);
    return $data;
}
function productDetail($code)
{
    include '../connect/conn.php';
    $data = [];
    $sql = "SELECT * FROM produk WHERE kodeproduk = '$code'";
    $res = mysqli_query($conn, $sql);
    $i = 0;
    while ($rows = mysqli_fetch_array($res)) {
        $data[$i]['code'] = $rows['kodeproduk'];
        $data[$i]['name'] = $rows['nama'];
        $data[$i]['image'] = $rows['image'];
        $data[$i]['desc'] = $rows['deskripsi'];
        $data[$i]['price'] = $rows['harga'];
    }
    mysqli_close($conn);
    return $data;
}
