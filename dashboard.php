<?php
    session_start();
    include_once('includes/config.php');
    if (strlen($_SESSION['aid'] == 0)) {
        header('location:logout.php');
    } else {
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
    </head>
    <body id="page-top">
        <div id="wrapper">
            <?php include_once('includes/sidebar.php'); ?>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <?php include_once('includes/topbar.php'); ?>
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Panel de Control</h1>
                            <a href="bwdates-report-ds.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <i class="fas fa-download fa-sm text-white-50"></i> Descargar reporte </a>
                        </div>
                        <div class="row">
                            <?php
                            $query = mysqli_query($con, "select id from project_08_testrecord");
                            $totaltest = mysqli_num_rows($query);
                            $query1 = mysqli_query($con, "select id from project_08_testrecord where ReportStatus='Asignado'");
                            $totalassigned = mysqli_num_rows($query1);
                            $query2 = mysqli_query($con, "select id from project_08_testrecord where ReportStatus='En proceso'");
                            $totalontheway = mysqli_num_rows($query2);
                            $query3 = mysqli_query($con, "select id from project_08_testrecord where ReportStatus='Toma de muestra'");
                            $totalsamplecollected = mysqli_num_rows($query3);
                            $query4 = mysqli_query($con, "select id from project_08_testrecord where ReportStatus='En laboratorio'");
                            $totalsenttolab = mysqli_num_rows($query4);
                            $query5 = mysqli_query($con, "select id from project_08_testrecord where ReportStatus='Informe final'");
                            $totaldelivered = mysqli_num_rows($query5);
                            $query6 = mysqli_query($con, "select id from project_08_patients");
                            $totalpatients = mysqli_num_rows($query6);
                            $query7 = mysqli_query($con, "select id from project_08_phlebotomist");
                            $totalphlebotomist = mysqli_num_rows($query7);
                            ?>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <a href="all-test.php">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Pruebas realizadas</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $totaltest; ?> </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-virus fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <a href="assigned-test.php">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Asignaciones realizadas</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $totalassigned; ?> </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-user-nurse fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <a href="ontheway-samplecollection-test.php">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Pacientes en proceso</div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> <?php echo $totalontheway; ?> </div>
                                                        </div>
                                                        <div class="col"></div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-clock fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <a href="sample-collected-test.php">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Muestras recolectadas</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $totalsamplecollected; ?> </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-prescription-bottle fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <a href="samplesent-lab-test.php">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Muestras en laboratorio</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $totalsenttolab; ?> </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-microscope fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <a href="reportdelivered-test.php">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Reportes realizados</div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> <?php echo $totaldelivered; ?> </div>
                                                        </div>
                                                        <div class="col"></div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Pacientes registrados</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $totalpatients; ?> </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <a href="manage-phlebotomist.php">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Flebotomistas registrados</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $totalphlebotomist; ?> </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-user-nurse fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
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
                <script src="vendor/chart.js/Chart.min.js"></script>
                <script src="js/demo/chart-area-demo.js"></script>
                <script src="js/demo/chart-pie-demo.js"></script>
    </body>
</html>
<?php } ?>