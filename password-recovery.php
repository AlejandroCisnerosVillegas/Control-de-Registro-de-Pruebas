<?php
    session_start();
    include('includes/config.php');
    if (isset($_POST['submit'])) {
        $contactno = $_POST['contactno'];
        $username = $_POST['username'];
        $password = md5($_POST['newpassword']);
        $query = mysqli_query($con, "select ID from project_08_admin where  AdminuserName='$username' and MobileNumber='$contactno' ");
        $ret = mysqli_num_rows($query);
        if ($ret > 0) {
            $query1 = mysqli_query($con, "update project_08_admin set Password='$password'  where  AdminuserName='$username' && MobileNumber='$contactno' ");
            if ($query1) {
                echo "<script>alert('La contraseña fue actualizada correctamente.');</script>";
                echo "<script>window.location.href='login.php'</script>";
            }
        } else {
            echo "<script>alert('La información ingresada no es válida. Por favor, inténtalo nuevamente.');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Control-Covid19</title>
        <link rel="icon" href="../../assets/img/logo.png">
        <link rel="apple-touch-icon" href="../../assets/img/logo-grande.png">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <style>
            .bg-custom-primary {
                position: relative;
                background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/homepage.png');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
            .text-custom-primary {
                color: #66BB6A !important;
            }
            .btn-custom-primary {
                background-color: #66BB6A;
                border-color: #66BB6A;
                color: #ffffff;
                font-weight: bold;
                font-size: 1.1em;
            }
            .btn-custom-primary:hover {
                background-color: #43A047;
                border-color: #43A047;
                color: #ffffff;
                font-weight: bold;
                font-size: 1.1em;
            }
            .card {
                border: none;
                border-radius: 20px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            }
            .form-group input.form-control {
                border-color: #66BB6A;
            }
            .form-group input.form-control:focus {
                border-color: #43A047;
            }
            .form-group input[type="submit"].btn-custom-primary {
                background-color: #66BB6A;
                border-color: #66BB6A;
            }
            .form-group input[type="submit"].btn-custom-primary:hover {
                background-color: #43A047;
                border-color: #43A047;
            }
            .form-group a.small {
                color: #66BB6A;
                text-decoration: none;
                transition: color 0.3s ease;
            }
            .form-group a.small:hover {
                color: #43A047;
            }
            .title {
                font-size: 2.5rem;
                font-weight: bold;
                text-align: center;
                color: #fff;
                margin-top: 5%;
                margin-bottom: 3%;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            }
        </style>
        <script type="text/javascript">
            function checkpass() {
                if(document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                    alert('La contraseña nueva y la confirmación no coinciden.');
                    document.changepassword.confirmpassword.focus();
                    return false;
                }
                return true;
            }
        </script>
    </head>
    <body class="bg-custom-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <h1 class="title">Control de Registro de Pruebas</h1>
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <form name="changepassword" method="post" onsubmit="return checkpass();">
                                <div class="row">
                                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Restablecer Contraseña</h1>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Nombre de usuario" required="true">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="contactno" id="contactno" placeholder="Número telefónico">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Nueva clave de acceso">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirmar clave de acceso">
                                            </div>
                                            <input type="submit" name="submit" class="btn btn-custom-primary btn-user btn-block" value="Restaurar Contraseña">
                                            <hr>
                                            <div class="text-center">
                                                <a class="small" href="login.php" style="color: #66BB6A; text-decoration: none; font-size: 18px;" onmouseover="this.style.color='#43A047'" onmouseout="this.style.color='#66BB6A'" onclick="this.style.color='#388E3C'">Iniciar sesión</a>
                                            </div>
                                            <div class="text-center">
                                                <a class="small" href="index.php" style="color: #66BB6A; text-decoration: none; font-size: 18px;" onmouseover="this.style.color='#43A047'" onmouseout="this.style.color='#66BB6A'" onclick="this.style.color='#388E3C'"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
    </body>
</html>