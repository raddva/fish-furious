<?php
include '../home/header.php';

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
        <h2 style="width: 100%; border-bottom: 4px solid #ff8680;"><b>Add Product</b></h2>
        <form action="addp.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <b>Pilih Gambar</b> <br>
                        <input type="file" name="file" id="file">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kode Produk</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="P0001" name="code" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Produk</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Produk" name="name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Harga</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="(Contoh: 12000)" name="price" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Deskripsi</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Deskripsi" name="desc">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block" name="edit"><i class="glyphicon glyphicon-plus"></i> Add</button>
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