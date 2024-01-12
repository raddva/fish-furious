<?php
session_start();
include('cruduser.php');
$user = $_POST['user'];
$pass = $_POST['pass'];
if (otentik($user, $pass)) {
    $dataUser = [];
    $dataUser = cariUserDariUsername($user);
    $_SESSION['user'] = $dataUser['username'];
    $_SESSION['kode'] = $dataUser['kode'];
    $_SESSION['nama'] = $dataUser['nama'];
    $_SESSION['pass'] = $dataUser['password'];
    echo "<script type='text/javascript'> 
          alert('Anda berhasil Login!');
          window.location='../home/'
          </script>";
} else {
    echo "<script type='text/javascript'> 
          alert('Username atau Password Salah!');
          window.location='../user/login.php?error'
          </script>";
}
