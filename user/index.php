<?php
include '../connect/conn.php';
include '../home/header.php';
include '../process/cruduser.php';
$data = cariUserDariUsername($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Saya</title>
</head>

<body style="color:#eee;">
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 25rem;margin-top: 80px; margin-bottom: 220px;">
            <div class="card-body">
                <img src="../img/icon.jpg" width="100" class="rounded mx-auto d-block">
                <h5 class="card-title text-center"><?= $data['nama'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted text-center"><?= $data['username']; ?></h6>
                <p class="card-text"><i class="fa fa-envelope"></i> <?= $data['email']; ?></p>
                <p class="card-text"><i class="fa fa-phone"></i> <?= $data['telp']; ?></p>
                <div class="d-grid gap-2">
                    <a href="../user/logout.php" class="btn btn-sm btn-outline-primary btn-block">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
include '../home/footer.php';
?>