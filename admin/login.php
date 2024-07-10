<?php
session_start();
// konek ke database
$koneksi = new mysqli("localhost", "root", "", "tokoku");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Anjay</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <style>
        .password-toggle-btn {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <br /><br />
                <h2>TOKO Ku Admin</h2>
                <h5>silakan loginnnnn</h5>
                <br />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Masukkan Detail untuk Login</strong>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="text" class="form-control" name="user" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="pass" id="password" />
                                <span class="input-group-btn">
                                    <button class="btn btn-default password-toggle-btn" type="button" onclick="togglePassword()"> <i class="fa fa-eye"></i> </button>
                                </span>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" /> Ingat saya
                                </label>
                                <span class="pull-right">
                                    <a href="#">Lupa password?</a>
                                </span>
                            </div>
                            <button class="btn btn-primary" name="login">Login</button>
                            <hr />
                            Belum terdaftar? <a href="registration.html">Klik di sini</a>
                        </form>
                        <?php
                        if (isset($_POST['login'])) {
                            $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password='$_POST[pass]'");
                            $yangcocok = $ambil->num_rows;
                            if ($yangcocok == 1) {
                                $_SESSION['admin'] = $ambil->fetch_assoc();
                                echo "<div class='alert alert-info'>Login sukses</div>";
                                echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                            } else {
                                echo "<div class='alert alert-danger'>Login gagal</div>";
                                echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
</body>

</html>
