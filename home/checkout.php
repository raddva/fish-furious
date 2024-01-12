<?php
include '../connect/conn.php';
include 'header.php';

?>
<section class="h-100 h-custom" style="background-color: #eee; margin-top: 30px;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card shopping-cart" style="border-radius: 15px;">
                    <div class="card-body text-black">
                        <div class="row">
                            <div class="col-lg-6 px-5 py-4">
                                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Your Order</h3>
                                <?php
                                if (isset($_SESSION['kode'])) {
                                    $custcode = $_SESSION['kode'];
                                    $res = mysqli_query(
                                        $conn,
                                        "SELECT k.cart_id as cart, k.kodeproduk as code, k.nama as name,
                                        k.qty as jml, p.image as image, p.harga as price FROM cart k 
                                        JOIN produk p on k.kodeproduk = p.kodeproduk WHERE kode = '$custcode'"
                                    );
                                    $no = 1;
                                    $result = 0;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                        <div class="d-flex align-items-center mb-5">
                                            <div class="flex-shrink-0">
                                                <img src="../product/upload/<?= $row['image']; ?>" class="img-fluid" style="width: 150px;">
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h5 class="text-primary"><?= $row['name']; ?></h5>
                                                <div class="d-flex align-items-center">
                                                    <p class="fw-bold mb-0 pe-2" style="color: #9e9e9e;"><?= $row['jml']; ?> x </p>
                                                    <p class="fw-bold mb-0 me-5 pe-3"><?= number_format($row['price']); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                        $sub = $row['price'] * $row['jml'];
                                        $result += $sub;
                                        $no++;
                                    }
                                }
                                ?>
                            </div>
                            <div class="col-lg-6 px-5 py-4">
                                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Checkout</h3>
                                <form class="mb-5" action="../process/order.php" method="post">
                                    <div class="row">
                                        <div class="form-outline mb-2 col-md-6">
                                            <label class="form-label" for="nama">Nama</label>
                                            <input type="text" id="nama" class="form-control form-control-lg" name="nama" required>
                                        </div>
                                        <div class="form-outline mb-2 col-md-6">
                                            <label class="form-label" for="kota">Kota</label>
                                            <input type="text" id="kota" class="form-control form-control-lg" name="kota" required>
                                        </div>
                                    </div>

                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="alamat">Alamat</label>
                                        <input type="text" id="alamat" class="form-control form-control-lg" name="alamat" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label" for="provinsi">Provinsi</label>
                                                <input type="text" id="provinsi" class="form-control form-control-lg" name="prov" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label" for="kodepos">Kode Pos</label>
                                                <input type="text" id="kodepos" class="form-control form-control-lg" name="kodepos" required>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-2 alert-success text-center">Pastikan pesanan dan Alamat anda sudah benar</p>
                                    <p class="mb-3 text-end fs-2"><b>Rp. <?= number_format($result); ?></b></p>
                                    <input type="hidden" name="total" value="<?= $result; ?>">
                                    <button type="submit" class="btn btn-outline-primary btn-lg mb-4">Checkout</button>
                                    <h5 class="fw-bold mb-5 text-end" style="position: absolute;">
                                        <a href="cart.php" class="text-decoration-none"><i class="fa fa-angle-left me-2"></i>Back to shopping</a>
                                    </h5>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>