<?php
session_start();
include('includes/config.php');

if(isset($_POST['login']))
  {
    $uname=$_POST['username'];
    $Password=md5($_POST['inputpwd']);
    $query=mysqli_query($con,"select ID from project_08_admin where  AdminuserName='$uname' && Password='$Password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['aid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    echo "<script>alert('Acceso denegado.');</script>";          
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
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
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
    </head>
    <body class="bg-custom-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <h1 class="title">Control de Registro de Pruebas</h1>
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <form name="login" method="post">
                                <div class="row">
                                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Iniciar Sesión</h1>
                                            </div>
                                            <form class="user">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="username"
                                                        id="username" placeholder="Nombre de usuario" required="true">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="inputpwd"
                                                        id="inputpwd" placeholder="Clave de acceso">
                                                </div>
                                                <input type="submit" name="login"
                                                    class="btn btn-custom-primary btn-user btn-block" value="Ingresar">
                                            </form>
                                            <hr>
                                            <div class="text-center">
                                                <a class="small" href="password-recovery.php" style="color: #66BB6A; text-decoration: none; font-size: 18px;" onmouseover="this.style.color='#43A047'" onmouseout="this.style.color='#66BB6A'" onclick="this.style.color='#388E3C'">Olvide mi contraseña</a>
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