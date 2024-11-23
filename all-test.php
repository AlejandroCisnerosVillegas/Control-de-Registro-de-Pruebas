<?php session_start();
    include_once('includes/config.php');
    if (strlen($_SESSION['aid']==0)) {
    header('location:logout.php');
    } else{
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
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <div id="wrapper">
            <?php include_once('includes/sidebar.php');?>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <?php include_once('includes/topbar.php');?>
                    <div class="container-fluid">
                        <h1 class="h3 mb-2 text-gray-800">Reportes de Seguimiento Registrados</h1>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-success">Reportes de seguimiento</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form name="assignto" method="post">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Número</th>
                                                    <th>Expediente</th>
                                                    <th>Nombre</th>
                                                    <th>Número telefónico</th>
                                                    <th>Prueba</th>
                                                    <th>F. Prueba</th>
                                                    <th>F. Registro</th>
                                                    <th>Detalles</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                                <?php $query=mysqli_query($con,"select project_08_testrecord.OrderNumber,project_08_patients.FullName,project_08_patients.MobileNumber,project_08_testrecord.TestType,project_08_testrecord.TestTimeSlot,project_08_testrecord.RegistrationDate,project_08_testrecord.id as testid from project_08_testrecord
                                                    join project_08_patients on project_08_patients.MobileNumber=project_08_testrecord.PatientMobileNumber");
                                                    $cnt=1;
                                                    while($row=mysqli_fetch_array($query)){
                                                    ?> 
                                                <tr>
                                                    <td> <?php echo $cnt;?> </td>
                                                    <td> <?php echo $row['OrderNumber'];?> </td>
                                                    <td> <?php echo $row['FullName'];?> </td>
                                                    <td> <?php echo $row['MobileNumber'];?> </td>
                                                    <td> <?php echo $row['TestType'];?> </td>
                                                    <td> <?php echo $row['TestTimeSlot'];?> </td>
                                                    <td> <?php echo $row['RegistrationDate'];?> </td>
                                                    <td>
                                                        <a href="test-details.php?tid=<?php echo $row['testid'];?>&&oid=<?php echo $row['OrderNumber'];?>" class="btn btn-success btn-sm">Ver Detalles </a>										
                                                    </td>
                                                </tr> 
                                                <?php $cnt++;} ?> 
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
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
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="js/demo/datatables-demo.js"></script>
    </body>
</html> 
<?php } ?>