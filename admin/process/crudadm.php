<?php

function getKodeAdmin()
{
    include '../../connect/conn.php';
    $sql = "SELECT * FROM admin ORDER BY kodeadm DESC LIMIT 1";
    $res = mysqli_query($conn, $sql);
    $jml = mysqli_num_rows($res);
    if ($jml > 0) {
        $row = mysqli_fetch_assoc($res);
        $code = $row['kodeadm'];
        $c = str_split($code);
        $kode = $c[4];
    } else {
        $kode = 0;
    }
    mysqli_close($conn);
    return $kode;
}
function addAdmin($no, $name,  $user, $pass)
{
    include '../../connect/conn.php';
    $sql = "INSERT INTO admin VALUES
            ('A000$no','$name', '$user', md5('$pass'))";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}
function cariAdmin($user)
{
    include '../../connect/conn.php';
    $data = [];
    $sql = "SELECT * FROM admin WHERE username = '$user'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data['kode'] = $row['kodeadm'];
            $data['username'] = $row['username'];
            $data['password'] = $row['password'];
            $data['nama'] = $row['nama'];
            mysqli_close($conn);
            return $data;
        }
    } else {
        mysqli_close($conn);
        return null;
    }
}
function auth($user, $pass)
{
    $dataUser = [];
    $pw = md5($pass);
    $dataUser = cariAdmin($user);
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
