<?php
include 'header.php';
?>
<div data-bs-spy="scroll" data-bs-target="#nav" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0" data-bs-root-margin="0px 0px -40%">
    <div id="home">
        <div id="main" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#main" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#main" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#main" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#main" data-bs-slide-to="3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../img/carousel.png" alt="Carousel 1" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../img/carousel1.png" alt="Carousel 2" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../img/carousel2.png" alt="Carousel 3" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../img/carousel3.png" alt="Carousel 4" class="d-block w-100">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#main" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#main" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</div>
<br>
<br>


<body class="bg-light" style="background-color: #eee;">
    <div class="container">
        <h4 class="text-center" style="font-family: arial; padding-top: 10px; padding-bottom: 10px;
    font-style: italic; line-height: 29px; border-top: 2px solid #101314; border-bottom: 2px solid #101314;">
            Fish and Furious is a marketplace for selling fish and fish products.
            It can be dedicated to wholesale trade between fishermen and fish merchants,
            or to the sale of seafood to individual consumers, or to both. Retail fish markets,
            a type of wet market, often sell street food as well.
        </h4>
        <div class="row">
            <div class="col-md-8">
                <h2 style="width: 100%; border-bottom: 4px solid #101314; margin-top: 80px;">
                    <b>Our Products</b>
                </h2>
            </div>
            <div class="col-md-1">
                <div class="dropdown" style="margin-top: 80px;">
                    <a class="btn btn-outline-secondary dropdown-toggle" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-filter"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                            <button class="dropdown-item" name="sort" value="harga">Harga Terendah</button>
                            <button class="dropdown-item" name="sort" value="nama">A - Z</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <form class="d-flex justify-content-end" action="<?= $_SERVER['PHP_SELF']; ?>" method="post" style="margin-top: 80px;">
                    <input class="form-control" type="text" placeholder="Search" name="find">
                    <button class="btn btn-outline-dark" type="submit" name="submit"> Search</button>
                </form>
            </div>
        </div>
        <section style="border-radius: 10px;" data-bs-spy="scroll" data-bs-target="#nav" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
            <div id="product">
                <div class="container py-4">
                    <div class="row">
                        <?php
                        include '../connect/conn.php';
                        include '../product/crudproduct.php';
                        if (isset($_POST['submit'])) {
                            $q = "SELECT * FROM produk WHERE nama LIKE '%" . $_POST['find'] . "%'";
                        } else {
                            if (isset($_POST['sort'])) {
                                switch ($_POST['sort']) {
                                    case 'harga':
                                        $q = "SELECT * FROM produk ORDER BY harga ASC";
                                        break;
                                    case 'nama':
                                        $q = "SELECT * FROM produk ORDER BY nama ASC";
                                        break;
                                }
                            } else {
                                $q = "SELECT * FROM produk";
                            }
                        }
                        $query =  mysqli_query($conn, $q);
                        while ($rows = mysqli_fetch_array($query)) {
                        ?>
                            <div class="col-sm-6 col-md-4 mb-3">
                                <div class="card" style="border-radius: 15px;">
                                    <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                        <img src="../product/upload/<?= $rows['image']; ?>" style="border-top-left-radius: 15px; border-top-right-radius: 15px;" class="img-fluid" alt="Laptop" />
                                        <a href="#!">
                                            <div class="mask"></div>
                                        </a>
                                    </div>
                                    <div class="card-body pb-0">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fs-3"><b><?= $rows['nama']; ?></b></p>
                                            </div>
                                            <p class="text-dark"># <?= $rows['kodeproduk']; ?></p>
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body pb-0">
                                        <div class="d-flex justify-content-between">
                                            <p class="text-dark fs-3">Rp. <?= number_format($rows['harga']); ?></p>
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
                                            <a href="../product/product_detail.php?kodeproduk=<?= $rows['kodeproduk']; ?>" class="btn btn-outline-secondary text-dark">Details</a>
                                            <?php
                                            if (isset($_SESSION['user'])) {
                                            ?>
                                                <a href="../process/add.php?kodeproduk=<?= $rows['kodeproduk']; ?>&kode=<?= $_SESSION['kode']; ?>&hal=1" class="btn btn-outline-primary">Add to Cart</a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="cart.php" class="btn btn-outline-primary">Add to Cart</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <br>
    <br>
    <br>
</body>
<?php
include 'footer.php';
?>