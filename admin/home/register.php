<?php
include 'header.php';
?>
<div class="container" style="padding-bottom: 25px;">
    <h2 style="width: 100%; border-bottom: 4px solid #3d251e;"><b>Admin Registration</b></h2>
    <form action="../process/pregister.php" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama" name="name" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Username" name="user" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Konfirmasi Password" name="conf" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Register</button>
    </form>
</div>
<?php
include 'footer.php';
?>