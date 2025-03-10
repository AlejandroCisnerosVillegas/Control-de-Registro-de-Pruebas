<?php session_start();
    include_once('includes/config.php');
    error_reporting(0);
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
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <style type="text/css">
            label{
                font-size:16px;
                font-weight:bold;
                color:#000;
            }
        </style>
    </head>
    <body id="page-top">
        <div id="wrapper">
        <?php include_once('includes/sidebar.php');?>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <?php include_once('includes/topbar.php');?>
                    <div class="container-fluid">
                        <h1 class="h3 mb-4 text-gray-800">Buscar Reporte</h1>
                            <form method="post" action="patient-report.php">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card shadow mb-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Nombre, número telefónico o número de expediente del paciente</label>
                                                    <input type="text" class="form-control" id="searchdata" name="searchdata" required="true" placeholder="Ingresa alguno de los datos solicitados...">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-success btn-user btn-block" name="search" value="Buscar">                           
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php include_once('includes/footer.php');?>
                </div>
            </div>
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
    </body>
</html>