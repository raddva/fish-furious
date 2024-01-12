<?php
session_start();
include('crudadm.php');
$user = $_POST['user'];
$pass = $_POST['pass'];
if (auth($user, $pass)) {
    $dataUser = [];
    $dataUser = cariAdmin($user);
    $_SESSION['admin'] = $dataUser['username'];
    echo "<script type='text/javascript'> 
          alert('Anda berhasil Login!');
          window.location='../home/main.php'
          </script>";
} else {
    echo "<script type='text/javascript'> 
          alert('Username atau Password Salah!');
          window.location='../home/index.php?error'
          </script>";
}
