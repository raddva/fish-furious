<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/bootstrap-theme.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="../js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#modal').modal('show');
        });
    </script>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Registration</h4>
                    <a href="../home/" role="button" class="close text-decoration-none" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body mx-3">
                    <form action="../process/pregister.php" method="POST">
                        <div class="row">
                            <div class="md-form mb-3 col-md-6">
                                <i class="fa fa-user prefix grey-text"></i> Nama
                                <input type="text" id="defaultForm-email" class="form-control validate" placeholder="Nama" name="name" required>
                            </div>
                            <div class="md-form mb-3 col-md-6">
                                <i class="fa fa-user prefix grey-text"></i> Username
                                <input type="text" id="defaultForm-email" class="form-control validate" placeholder="Username" name="user" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="md-form mb-3 col-md-6">
                                <i class="fa fa-envelope prefix grey-text"></i> Email
                                <input type="email" id="defaultForm-email" class="form-control validate" placeholder="Email" name="email" required>
                            </div>
                            <div class="md-form mb-3 col-md-6">
                                <i class="fa fa-phone prefix grey-text"></i> Phone
                                <input type="text" id="defaultForm-email" class="form-control validate" placeholder="Phone" name="phone" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="md-form mb-3 col-md-6">
                                <i class="fa fa-lock prefix grey-text"></i> Password
                                <input type="password" id="defaultForm-pass" class="form-control validate" placeholder="Password" name="pass" required>
                            </div>
                            <div class="md-form mb-3 col-md-6">
                                <i class="fa fa-lock prefix grey-text"></i> Confirm Password
                                <input type="password" id="defaultForm-pass" class="form-control validate" placeholder="Password" name="conf" required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <button class="btn btn-outline-primary" type="submit">Register</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>