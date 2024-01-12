<?php
include 'crudadm.php';
$name = $_POST['name'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$conf = $_POST['conf'];
$cp = strcmp($pass, $conf);
if ($cp != 0) {
    echo "<script type='text/javascript'> 
          alert('Password Tidak Match!');
          window.location='register.php?error'
          </script>";
} else {
    $kode = getKodeAdmin() + 1;
    addAdmin($kode, $name, $user, $pass);
    echo "<script type='text/javascript'> 
          alert('Selamat! Akun admin telah berhasil didaftarkan.');
          window.location='../main.php'
          </script>";
}
