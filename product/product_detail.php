<?php
include '../home/header.php';
include '../product/crudproduct.php';
$res = productDetail($_GET['kodeproduk']);
foreach ($res as $data);
?>

<body style="color: #eee;">
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10" style="margin-top: 50px;">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images p-3">
                                <div class="text-center p-4"> <img src="upload/<?= $data['image']; ?>" width="400"> </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <a href="../home/" class="nav-link">
                                            <i class="fa fa-long-arrow-left"></i>
                                            <span class="ml-2">Back</span>
                                        </a>
                                    </div>
                                </div>
                                <form action="../process/add.php" method="get">
                                    <input type="hidden" name="kodeproduk" value="<?= $_GET['kodeproduk']; ?>">
                                    <div class="mt-4 mb-3">
                                        <p class="text-uppercase text-muted brand text-end"># <?= $_GET['kodeproduk']; ?></p>
                                        <h3 class="text-uppercase"><b><?= $data['name']; ?></b></h3>
                                        <div class="price d-flex flex-row align-items-center">
                                            <h5 class="act-price text-end">Rp. <?= number_format($data['price']); ?></h5>
                                        </div>
                                    </div>
                                    <p class="about"><?= $data['desc']; ?></p>
                                    <div class="row cart mt-4 align-items-center">
                                        <div class="d-flex justify-content-between">
                                            <input class="form-control" type="number" min="1" name="hal" value="1" style="width: 155px;">
                                            <?php
                                            if (isset($_SESSION['user'])) {
                                            ?>
                                                <button type="submit" class="btn btn-outline-primary"><i class="glyphicon glyphicon-shopping-cart"></i>Add to Cart</button>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="../home/cart.php" class="btn btn-outline-primary">Add to Cart</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
include '../home/footer.php';
?>