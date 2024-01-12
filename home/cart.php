<?php
include 'header.php';
include '../connect/conn.php';
if (isset($_POST['submit'])) {
    $cart_id = $_POST['id'];
    $qty = $_POST['qty'];
    $edit = mysqli_query($conn, "UPDATE cart SET qty = '$qty' WHERE cart_id = '$cart_id'");
    if ($edit) {
        echo "<script>
            alert('KERANJANG BERHASIL DIPERBARUI');
            window.location = 'cart.php';
            </script>";
    }
} else if (isset($_GET['del'])) {
    $cart_id = $_GET['id'];
    $del = mysqli_query($conn, "DELETE FROM cart WHERE cart_id = '$cart_id'");
    if ($del) {
        echo "<script>
            alert('PRODUK DIHAPUS');
            window.location = 'cart.php';
            </script>";
    }
}
?>
<section class="h-100" style="background-color: #eee; margin-top: 50px;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black"><i class="fa fa-shopping-cart"></i> <b>Shopping Cart</b></h3>
                    <div>
                        <p class="mb-0"><span class="text-muted">Item(s) : <?= isset($_SESSION['no']) ? $_SESSION['no'] : 0; ?></a></p>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['user'])) {
                    $custcode = $_SESSION['kode'];
                    $check = mysqli_query($conn, "SELECT * FROM cart WHERE kode = '$custcode'");
                    $jml = mysqli_num_rows($check);
                    if ($jml > 0) {
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
                                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                                    <input type="hidden" name="id" value="<?= $row['cart']; ?>">
                                    <div class="card rounded-3 mb-4">
                                        <div class="card-body p-4">
                                            <div class="row d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="../product/upload/<?= $row['image']; ?>" class="img-fluid rounded-3">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <p class="lead fw-normal mb-2"><?= $row['name']; ?></p>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                    <input type="number" name="qty" min="1" class="form-control" style="text-align: center;" value="<?= $row['jml']; ?>">
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h5 class="mb-0">Rp. <?= number_format($row['price']); ?></h5>
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="submit" name="submit" class="btn btn-outline-warning"><i class="fa fa-edit"></i></button>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <a href="cart.php?del=1&id=<?= $row['cart']; ?>" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin dihapus?')"><i class="fa fa-trash"></i></a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                        <?php
                                $sub = $row['price'] * $row['jml'];
                                $result += $sub;
                                $_SESSION['no'] = $no;
                                $no++;
                            }
                        }
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <a href="../home/" role="button" class="btn btn-outline-secondary btn-lg">Back to Home</a>
                                <a href="checkout.php" role="button" class="btn btn-outline-primary btn-block btn-lg" style="float: right;">Checkout (Rp. <?= number_format($result); ?>)</a>
                            </div>
                        </div>
                        <br>
                    <?php
                    } else {
                    ?>
                        <div class="card rounded-3 mb-4">
                            <p class="lead fw-normal mb-0 text-black text-center"><b><i>Your Cart is Empty</i></b></p>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <a href="../home/" role="button" class="btn btn-outline-warning btn-lg">Back to Home</a>
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
                    <?php
                    }
                } else {
                    ?>
                    <div class="card rounded-2 mb-4 bg-warning">
                        <p class="lead fw-normal mb-0 text-black text-center"><b><i>Please Login First!</i></b></p>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <a href="../home/" role="button" class="btn btn-outline-warning btn-lg">Back to Home</a>
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
                <?php
                }
                ?>
            </div>
        </div>
    </div>

</section>

<?php
include 'footer.php';
?>