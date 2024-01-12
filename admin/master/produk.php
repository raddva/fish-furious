<?php
include '../../connect/conn.php';
include '../home/header.php';

if (!isset($_SESSION['admin'])) {
    echo "<script>
        alert('SILAHKAN LOGIN TERLEBIH DULU!');
        window.location = '../home/index.php';
        </script>";
}

if (isset($_POST['submits'])) {
    $kodep = $_POST['kodeproduk'];
    header('Location: editproduk.php?kode=' . $kodep . '');
} else if (isset($_POST['del'])) {
    $kodep = $_POST['kodeproduk'];
    $del = mysqli_query($conn, "DELETE FROM produk WHERE kodeproduk = '$kodep'");
    if ($del) {
        echo "<script>
            alert('PRODUK DIHAPUS');
            window.location = 'produk.php';
            </script>";
    }
}
?>
<div class="container" style="padding-bottom: 300px;">
    <h2 style="width: 100%; border-bottom: 4px solid #4c3228;"><b>Master Produk</b></h2>
    <table class="table table-striped">
        <?php
        if (isset($_SESSION['admin'])) {
            $check = mysqli_query($conn, "SELECT * FROM produk");
            if ($check) {
                if (isset($_SESSION['admin'])) {
                    $no = 1;
                    $result = 0;
        ?>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Image</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <?php
                    while ($row = mysqli_fetch_assoc($check)) {
                    ?>
                        <tbody>
                            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                                <tr>
                                    <th scope="row"><?= $no; ?></th>
                                    <td><?= $row['kodeproduk']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><img src="../../product/upload/<?= $row['image']; ?>" width="100"></td>
                                    <td>Rp. <?= number_format($row['harga']); ?></td>
                                    <input type="hidden" name="kodeproduk" value="<?= $row['kodeproduk']; ?>">
                                    <td><a href="editp.php?kode=<?= $row['kodeproduk']; ?>" name="submits" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <button type="submit" name="del" class="btn btn-danger" onclick="return confirm('Yakin ingin dihapus?')"><i class="glyphicon glyphicon-trash"></i></button>
                                    </td>
                                </tr>
                            </form>
            <?php
                        $_SESSION['no'] = $no;
                        $no++;
                    }
                }
            }
        }
            ?>
                        </tbody>
    </table>
    <a href="add.php" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>Add Product</a>
    <br>
    <br>
    <br>
    <?php
    include '../home/footer.php';
    ?>