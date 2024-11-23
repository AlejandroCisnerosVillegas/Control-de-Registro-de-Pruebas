<?php session_start();
    include_once('includes/config.php');
    error_reporting(0);
    if (strlen($_SESSION['aid'] == 0)) {
        header('location:logout.php');
    } else {
        if (isset($_POST['submit'])) {
            $mnumber = $_POST['mobilenumber'];
            $testtype = $_POST['testtype'];
            $timeslot = $_POST['birthdaytime'];
            $orderno = mt_rand(100000000, 999999999);
            $query = "insert into project_08_testrecord(PatientMobileNumber,TestType,TestTimeSlot,OrderNumber) values('$mnumber','$testtype','$timeslot','$orderno');";
            $result = mysqli_query($con, $query);
            if ($result) {
                echo '<script>alert("La búsqueda se realizo con éxito. El número de expediente es "+"' . $orderno . '")</script>';
                echo "<script>window.location.href='registered-user-testing.php'</script>";
            } else {
                echo "<script>alert('Ocurrió un error. Por favor inténtalo de nuevo.');</script>";
                echo "<script>window.location.href='registered-user-testing.php'</script>";
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
    </head>
    <body id="page-top">
        <div id="wrapper"> 
            <?php include_once('includes/sidebar.php');?>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <?php include_once('includes/topbar.php');?>
                    <div class="container-fluid">
                        <h1 class="h3 mb-4 text-gray-800">Búsqueda de Reporte por Fecha</h1>
                        <form method="post" action="bwdates-report-result.php">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card shadow mb-4">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Fecha de inicio</label>
                                                <input type="date" class="form-control" id="fromdate" name="fromdate" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label>Fecha de termino</label>
                                                <input type="date" class="form-control" id="todate" name="todate" required="true">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-success btn-user btn-block" name="submit" value="Buscar">
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
        <?php include_once('includes/footer2.php');?>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
    </body>
</html> 
<?php } ?>