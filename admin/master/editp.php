<?php
include '../home/header.php';
include '../../connect/conn.php';
$kode = $_GET['kode'];
$q = mysqli_query($conn, "SELECT * FROM produk WHERE kodeproduk = '$kode'");
foreach ($q as $row) {
    $nama = $row['nama'];
    $harga = $row['harga'];
    $des = $row['deskripsi'];
    $img = $row['image'];
}
if (!isset($_SESSION['admin'])) {
    echo "<script>
        alert('SILAHKAN LOGIN TERLEBIH DULU!');
        window.location = '../home/index.php';
        </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <div class="container" style="padding-bottom: 25px;">
        <h2 style="width: 100%; border-bottom: 4px solid #ff8680;"><b>Edit Product</b></h2>
        <form action="editpr.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <?= "<img src='../../product/upload/$img'>"; ?>
                        <br>
                        <b>Pilih Gambar</b> <br>
                        <input type="file" name="file" id="exampleInputFile" value="<?= $img; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kode Produk</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="code" value="<?= $kode; ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Produk</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Produk" name="name" value="<?= $nama; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Harga</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="(Contoh: 12000)" name="price" value="<?= $harga; ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Deskripsi</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Deskripsi" name="desc" value="<?= $des; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning btn-block" name="edit"><i class="glyphicon glyphicon-pencil"></i> Edit</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <a href="produk.php" class="btn btn-danger btn-block" name="cancel">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>