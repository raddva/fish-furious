<?php
include 'header.php';
include '../../connect/conn.php';
if (!isset($_SESSION['admin'])) {
    echo "<script>
        alert('SILAHKAN LOGIN TERLEBIH DULU!');
        window.location = 'index.php';
        </script>";
}

$result1 = mysqli_query($conn, "SELECT distinct kode FROM customer");
$jml1 = mysqli_num_rows($result1);
$result2 = mysqli_query($conn, "SELECT distinct kodeproduk FROM produk");
$jml2 = mysqli_num_rows($result2);
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div style="background-color: #dfdfdf; padding-bottom: 60px; padding-left: 20px;padding-right: 20px; padding-top: 10px;">
                <h4>CUSTOMER</h4>
                <h4 style="font-size: 56pt;"><b><?= $jml1; ?></b></h4>
            </div>
        </div>
        <div class="col-md-4">
            <div style="background-color: #dfdfdf; padding-bottom: 60px; padding-left: 20px;padding-right: 20px; padding-top: 10px;">
                <h4>PRODUK</h4>
                <h4 style="font-size: 56pt;"><b><?= $jml2; ?></b></h4>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
include 'footer.php';
?>