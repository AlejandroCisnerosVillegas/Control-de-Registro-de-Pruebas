<?php
    include_once('includes/config.php');
    error_reporting(0);
    if (isset($_POST['submit'])) {
        $mnumber = $_POST['mobilenumber'];
        $testtype = $_POST['testtype'];
        $timeslot = $_POST['birthdaytime'];
        $orderno = mt_rand(100000000, 999999999);
        $query = "insert into project_08_testrecord(PatientMobileNumber,TestType,TestTimeSlot,OrderNumber) values('$mnumber','$testtype','$timeslot','$orderno');";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo '<script>alert("Su solicitud para prueba se envió con éxito. El número de expediente es "+"' . $orderno . '")</script>';
            echo "<script>window.location.href='registered-user-testing.php'</script>";
        } else {
            echo "<script>alert('A ocurrido un error. Por favor inténtalo de nuevo.');</script>";
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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
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
                    <h1 class="h3 mb-4 text-gray-800">Control-Covid19 | Usuario registrados</h1>
                    <form method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Número telefónico registrado</label>
                                            <input type="text" class="form-control" id="regmobilenumber" name="regmobilenumber" placeholder="Ingrese el número telefónico..." pattern="[0-9]{10}" title="Solo se puede ingresar 10 números" required="true" maxlength="10">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success btn-user btn-block" name="search" value="Buscar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr />
                    <?php if (isset($_POST['search'])) { ?>
                        <h3 align="center" style="color:red">Resultados encontrados con el número "<?php echo $_POST['regmobilenumber']; ?>"</h3>
                        <hr />
                        <?php
                        $mnumber = intval($_POST['regmobilenumber']);
                        $sql = mysqli_query($con, "select * from project_08_patients where MobileNumber='$mnumber'");
                        $row = mysqli_num_rows($sql);
                        if ($row > 0) {
                            while ($result = mysqli_fetch_array($sql)) {
                        ?>
                                <form name="newtesting" method="post">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-success">Información personal</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Nombre completo</label>
                                                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $result['FullName']; ?>" readonly="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Número telefónico</label>
                                                        <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" value="<?php echo $result['MobileNumber']; ?>" readonly="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Fecha de nacimiento (dd-mm-aaaa)</label>
                                                        <input type="text" class="form-control" id="dob" name="dob" readonly="true" value="<?php echo $result['DateOfBirth']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Identificación oficial</label>
                                                        <input type="text" class="form-control" id="govtissuedid" name="govtissuedid" value="<?php echo $result['GovtIssuedId']; ?>" readonly="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Código o numero de identificación</label>
                                                        <input type="text" class="form-control" id="govtidnumber" name="govtidnumber" value="<?php echo $result['GovtIssuedIdNo']; ?>" readonly="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Dirección</label>
                                                        <textarea class="form-control" id="address" name="address" readonly="true"><?php echo $result['FullAddress']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ciudad o Estado</label>
                                                        <input type="text" class="form-control" id="state" name="state" value="<?php echo $result['State']; ?>" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-success">Prueba a Realizar</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Tipos de prueba</label>
                                                        <select class="form-control" id="testtype" name="testtype" required="true">
                                                            <option value="">Selecciona una opción</option>
                                                            <option value="antigenos">Prueba de antígenos</option>
                                                            <option value="PCR">Prueba de PCR</option>
                                                            <option value="molecular">Prueba molecular rápida</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Hora y fecha de la prueba</label>
                                                        <input type="datetime-local" class="form-control" id="birthdaytime" name="birthdaytime" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-success btn-user btn-block" name="submit">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php }
                        } else { ?>
                            <h4 align="center" style="color:red;">No se encontró ningún registro</h4>
                    <?php }
                    } ?>
                </div>
            </div>
            <?php include_once('includes/footer.php'); ?>
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