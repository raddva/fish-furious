<?php
include '../../connect/conn.php';
include '../home/header.php';

if (!isset($_SESSION['admin'])) {
    echo "<script>
        alert('SILAHKAN LOGIN TERLEBIH DULU!');
        window.location = '../home/index.php';
        </script>";
}

if (isset($_POST['del'])) {
    $kode = $_POST['kode'];
    $del = mysqli_query($conn, "DELETE FROM customer WHERE kode = '$kode'");
    if ($del) {
        echo "<script>
            alert('CUSTOMER DIHAPUS');
            window.location = 'cust.php';
            </script>";
    }
}
?>
<div class="container" style="padding-bottom: 300px;">
    <h2 style="width: 100%; border-bottom: 4px solid #4c3228;"><b>Data Customer</b></h2>
    <table class="table table-striped">
        <?php
        if (isset($_SESSION['admin'])) {
            $check = mysqli_query($conn, "SELECT * FROM customer");
            if ($check) {
                if (isset($_SESSION['admin'])) {
                    $no = 1;
                    $result = 0;
        ?>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Customer</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
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
                                    <td><?= $row['kode']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <input type="hidden" name="kode" value="<?= $row['kode']; ?>">
                                    <td><button type="submit" name="del" class="btn btn-danger" onclick="return confirm('Yakin ingin dihapus?')">
                                            <i class="glyphicon glyphicon-trash"></i></button>
                                    </td>
                                </tr>
                            </form>
            <?php
                        $no++;
                    }
                }
            }
        }
            ?>
                        </tbody>
    </table>
    <br>
    <br>
    <br>
    <?php
    include '../home/footer.php';
    ?>