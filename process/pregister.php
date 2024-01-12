<?php
include '../connect/conn.php';
include '../process/cruduser.php';
$name = $_POST['name'];
$email = $_POST['email'];
$user = $_POST['user'];
$phone = $_POST['phone'];
$pass = $_POST['pass'];
$conf = $_POST['conf'];
$cp = strcmp($pass, $conf);
if ($cp != 0) {
    echo "<script type='text/javascript'> 
          alert('Password Tidak Match!');
          window.location='../user/register.php?error'
          </script>";
} else {
    $kode = getKodeCust() + 1;
    addUser($kode, $name, $email, $user, $pass, $phone);
    echo "<script type='text/javascript'> 
          alert('Selamat! Akun anda telah berhasil didaftarkan.');
          window.location='../home/'
          </script>";
}
