<?php session_start();
    include_once('includes/config.php');
    error_reporting(0);
    if (strlen($_SESSION['aid'] == 0)) {
        header('location:logout.php');
    } else {
        if ($_GET['action'] == 'delete') {
            $pid = intval($_GET['pid']);
            $query = mysqli_query($con, "delete from project_08_phlebotomist where id='$pid'");
            echo '<script>alert("Registro eliminado.")</script>';
            echo "<script>window.location.href='manage-phlebotomist.php'</script>";
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
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <div id="wrapper">
            <?php include_once('includes/sidebar.php'); ?>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <?php include_once('includes/topbar.php'); ?>
                    <div class="container-fluid">
                        <h1 class="h3 mb-2 text-gray-800">Administrar flebotomistas</h1>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-success">Depósito de Datos</h6>
                            </Div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Número</th>
                                                <th>Clave</th>
                                                <th>Nombre</th>
                                                <th>Número telefónico</th>
                                                <th>F. de Registro</th>
                                                <th>Gestión</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $query = mysqli_query($con, "select * from project_08_phlebotomist");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                            <tr>
                                                <td> <?php echo $cnt; ?> </td>
                                                <td> <?php echo $row['EmpID']; ?> </td>
                                                <td> <?php echo $row['FullName']; ?> </td>
                                                <td> <?php echo $row['MobileNumber']; ?> </td>
                                                <td> <?php echo $row['RegDate']; ?> </td>
                                                <td>
                                                    <a href="edit-phlebotomist.php?pid=<?php echo $row['id']; ?>">                      
                                                        <i class="fas fa-edit" style="color:green"></i>
                                                    </a> | 
                                                    <a href="manage-phlebotomist.php?pid=<?php echo $row['id']; ?>&&action=delete" onclick="return confirm('¿Desea eliminar este registro?');">                  
                                                        <i class="fa fa-trash" aria-hidden="true" style="color:red" title="Eliminar registro"></i>
                                                    </a>
                                                </td>
                                            </tr> 
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="js/demo/datatables-demo.js"></script>
    </body>
</html> 
<?php } ?>