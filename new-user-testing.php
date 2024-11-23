<?php
    session_start();
    error_reporting(0);
    include_once('includes/config.php');
    if (isset($_POST['submit'])) {
        $fname = $_POST['fullname'];
        $mnumber = $_POST['mobilenumber'];
        $dob = $_POST['dob'];
        $govtid = $_POST['govtissuedid'];
        $govtidnumber = $_POST['govtidnumber'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $testtype = $_POST['testtype'];
        $timeslot = $_POST['birthdaytime'];
        $orderno = mt_rand(100000000, 999999999);
        $query = "insert into project_08_patients(FullName,MobileNumber,DateOfBirth,GovtIssuedId,GovtIssuedIdNo,FullAddress,State) values('$fname','$mnumber','$dob','$govtid','$govtidnumber','$address','$state');";
        $query .= "insert into project_08_testrecord(PatientMobileNumber,TestType,TestTimeSlot,OrderNumber) values('$mnumber','$testtype','$timeslot','$orderno');";
        $result = mysqli_multi_query($con, $query);
        if ($result) {
            echo '<script>alert("El registro se realizo correctamente. Tú numero de expediente es: "+"' . $orderno . '")</script>';
            echo "<script>window.location.href='new-user-testing.php'</script>";
        } else {
            echo "<script>alert('Ha ocurrido un error. Por favor inténtelo de nuevo.');</script>";
            echo "<script>window.location.href='new-user-testing.php'</script>";
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
            label{
                font-size:16px;
                font-weight:bold;
                color:#000;
            }
        </style>
        <script>
            function mobileAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
            url: "check_availability.php",
            data:'mobnumber='+$("#mobilenumber").val(),
            type: "POST",
            success:function(data){
            $("#mobile-availability-status").html(data);
            $("#loaderIcon").hide();
            },
            error:function (){}
            });
            }
        </script>
    </head>
    <body id="page-top">
        <div id="wrapper">
        <?php include_once('includes/sidebar.php');?>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                <?php include_once('includes/topbar.php');?>
                    <div class="container-fluid">
                        <h1 class="h3 mb-4 text-gray-800">Registro para prueba Convid-19</h1>
                        <form name="newtesting" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-success">Información Personal</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Nombre completo</label>
                                                <input type="text" class="form-control" id="fullname" name="fullname"  placeholder="Ingresa tu nombre completo..." pattern="[A-Za-z ]+" title="Ingresa solo letras" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label>Número telefónico</label>
                                                <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Ingresa tu número telefónico" pattern="[0-9]{10}" title="Solo se admiten 10 números" required="true" onBlur="mobileAvailability()">
                                                <span id="mobile-availability-status" style="font-size:12px;"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Fecha de nacimiento</label>
                                                <input type="date" class="form-control" id="dob" name="dob" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label>Identificación oficial</label>
                                                <input type="text" class="form-control" id="govtissuedid" name="govtissuedid" placeholder="Credencial de elector/ Licencia de Conducir/ Cartilla Militar" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label>Código de identificación</label>
                                                <input type="text" class="form-control" id="govtidnumber" name="govtidnumber" placeholder="Ingresa el código o número de identificación" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label>Dirección</label>
                                                <textarea class="form-control" id="address" name="address" required="true" placeholder="Introduzca su dirección completa..."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Ciudad o Estado</label>
                                                <input type="text" class="form-control" id="state" name="state" placeholder="Ingresa tu ciudad o estado" required="true">
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
                                            <input type="submit" class="btn btn-success btn-user btn-block" name="submit" id="submit">                           
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