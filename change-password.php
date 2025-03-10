<?php session_start();
    include_once('includes/config.php');
    if (strlen($_SESSION['aid'] == 0)) {
        header('location:logout.php');
    } else {
        if (isset($_POST['submit'])) {
            $adminid = $_SESSION['aid'];
            $cpassword = md5($_POST['currentpassword']);
            $newpassword = md5($_POST['newpassword']);
            $query = mysqli_query($con, "select ID from project_08_admin where ID='$adminid' and   Password='$cpassword'");
            $row = mysqli_fetch_array($query);
            if ($row > 0) {
                $ret = mysqli_query($con, "update project_08_admin set Password='$newpassword' where ID='$adminid'");

                echo '<script>alert("La contraseña se actualizo correctamente.")</script>';
            } else {

                echo '<script>alert("La contraseña ingresada es incorrecta.")</script>';
            }
        }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Control-Covid19</title>
        <link rel="icon" href="../../assets/img/logo.png">
        <link rel="apple-touch-icon" href="../../assets/img/logo-grande.png">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <style type="text/css">
            label {
                font-size: 16px;
                font-weight: bold;
                color: #000;
            }
        </style>
        <script type="text/javascript">
            function checkpass() {
                if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                    alert('La nueva contraseña y su confirmación no coinciden');
                    document.changepassword.confirmpassword.focus();
                    return false;
                }
                return true;
            }
        </script>
    </head>
    <body id="page-top">
        <div id="wrapper"> 
            <?php include_once('includes/sidebar.php'); ?>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <?php include_once('includes/topbar.php'); ?>
                    <div class="container-fluid">
                        <h1 class="h3 mb-4 text-gray-800">Actualizar Contraseña</h1>
                        <form method="post" name="changepassword" onsubmit="return checkpass();">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-success">Cambiar contraseña</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Contraseña actual</label>
                                                <input type="password" id="currentpassword" name="currentpassword" value="" class="form-control" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label>Nueva contraseña</label>
                                                <input type="password" id="newpassword" name="newpassword" value="" class="form-control" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirma la contraseña</label>
                                                <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" value="" required="true">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-success btn-user btn-block" name="submit" id="submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php include_once('includes/footer.php'); ?>
            </div>
        </div>
        <?php include_once('includes/footer2.php'); ?>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
    </body>
</html> 
<?php } ?>