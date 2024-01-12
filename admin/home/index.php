<?php
session_start();
if (isset($_SESSION['admin'])) {
    header('Location: main.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>FISH AND FURIOUS</title>
    <link rel="stylesheet" type="text/css" href="../../style/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../style/style.css">
    <link rel="stylesheet" type="text/css" href="../../style/bootstrap-theme.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</head>

<body>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#modal').modal('show');
        });
    </script>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">LOGIN ADMIN</h4>
                </div>
                <div class="modal-body">
                    <form action="../process/login.php" method="POST">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="user" autofocus autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="pass" autocomplete="off">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>