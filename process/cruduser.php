<?php

function getKodeCust()
{
    include '../connect/conn.php';
    $sql = "SELECT * FROM customer ORDER BY kode DESC LIMIT 1";
    $res = mysqli_query($conn, $sql);
    $jml = mysqli_num_rows($res);
    if ($jml > 0) {
        $row = mysqli_fetch_assoc($res);
        $code = $row['kode'];
        $c = str_split($code);
        $kode = $c[4];
    } else {
        $kode = 0;
    }
    mysqli_close($conn);
    return $kode;
}
function addUser($no, $nama, $email, $user, $pass, $tel)
{
    include '../connect/conn.php';
    $sql = "INSERT INTO customer VALUES
            ('C000$no','$nama', '$email', '$user', md5('$pass'), '$tel')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}
function cariUserDariUsername($user)
{
    include('../connect/conn.php');
    $data = [];
    $sql = "SELECT * FROM customer WHERE username = '$user'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data['kode'] = $row['kode'];
            $data['username'] = $row['username'];
            $data['password'] = $row['password'];
            $data['nama'] = $row['nama'];
            $data['email'] = $row['email'];
            $data['telp'] = $row['telp'];
            mysqli_close($conn);
            return $data;
        }
    } else {
        mysqli_close($conn);
        return null;
    }
}
function otentik($user, $pass)
{
    $dataUser = [];
    $pw = md5($pass);
    $dataUser = cariUserDariUsername($user);
    if ($dataUser != null) {
        if ($pw == $dataUser['password']) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
