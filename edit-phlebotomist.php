<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['update'])) {
        $pid = intval($_GET['pid']);
        $empid = $_POST['empid'];
        $fname = $_POST['fullname'];
        $mnumber = $_POST['mobilenumber'];
        $query = "update project_08_phlebotomist set FullName='$fname',MobileNumber='$mnumber' where id='$pid'";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo '<script>alert("Registro actualizado con éxito.")</script>';
            echo "<script>window.location.href='manage-phlebotomist.php'</script>";
        } else {
            echo "<script>alert('Algo salió mal. Por favor inténtalo de nuevo.');</script>";
            echo "<script>window.location.href='manage-phlebotomist.php'</script>";
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
            <?php include_once('includes/sidebar.php'); ?>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <?php include_once('includes/topbar.php'); ?>
                    <div class="container-fluid">
                        <?php
                            $pid = intval($_GET['pid']);
                            $query = mysqli_query($con, "select * from project_08_phlebotomist where id='$pid'");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($query)) {
                        ?> 
                        <h1 class="h3 mb-4 text-gray-800">Registro de <?php echo $row['FullName']; ?></h1>
                            <form name="editphlebotomist" method="post">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-success">Información Personal</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Fecha de registro: </label> <?php echo $row['RegDate']; ?>
                                                </div>
                                                <div class="form-group">
                                                    <label>Clave de empleado</label>
                                                    <input type="text" class="form-control" id="empid" name="empid" value="<?php echo $row['EmpID']; ?>" readonly="true">								
                                                </div>
                                                <div class="form-group">
                                                    <label>Nombre completo</label>
                                                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nombre completo..." pattern="[A-Za-z ]+" title="Letras solamente" value="<?php echo $row['FullName']; ?>" required="true">								
                                                </div>
                                                <div class="form-group">
                                                    <label>Número telefónico</label>
                                                    <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Número telefónico..." pattern="[0-9]{10}" title="Solamente 10 dígitos" value="<?php echo $row['MobileNumber']; ?>" required="true">								
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-success btn-user btn-block" name="update" id="update" value="Actualizar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form> 
                        <?php } ?>
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