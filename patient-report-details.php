<?php 
    session_start();
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
                        <h1 class="h3 mb-4 text-gray-800">Número de Expediente: # <?php echo intval($_GET['oid']); ?> </h1>
                        <div class="row"> 
                            <?php
                                $testid = intval($_GET['tid']);
                                $query = mysqli_query($con, "select * from project_08_testrecord
                                join project_08_patients on project_08_patients.MobileNumber=project_08_testrecord.PatientMobileNumber
                                where  project_08_testrecord.id='$testid'");
                                while ($row = mysqli_fetch_array($query)) {
                            ?> 
                            <div class="col-lg-6">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-success">Información Personal</h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <tr>
                                                <th>Nombre completo</th>
                                                <td> <?php echo $row['FullName']; ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Número telefónico</th>
                                                <td> <?php echo $row['MobileNumber']; ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Fecha de nacimiento</th>
                                                <td> <?php echo $row['DateOfBirth']; ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Identificación oficial</th>
                                                <td> <?php echo $row['GovtIssuedId']; ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Clave o número de identificación</th>
                                                <td> <?php echo $row['GovtIssuedIdNo']; ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Dirección</th>
                                                <td> <?php echo $row['FullAddress']; ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Ciudad o Estado</th>
                                                <td> <?php echo $row['State']; ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Fecha de registro</th>
                                                <td> <?php echo $row['RegistrationDate']; ?> </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-success">Prueba Solicitada</h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <tr>
                                                <th>Expediente</th>
                                                <td> <?php echo $row['OrderNumber']; ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Prueba</th>
                                                <td> <?php echo $row['TestType']; ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Fecha de prueba</th>
                                                <td> <?php echo $row['TestTimeSlot']; ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Estado del reporte</th>
                                                <td> 
                                                    <?php if ($row['ReportStatus'] == ''):
                                                        echo "Sin seguimiento";
                                                    else:
                                                        echo $row['ReportStatus'];
                                                    endif;
                                                    ?> 
                                                </td>
                                            </tr> 
                                            <?php if ($row['AssignedtoEmpId'] != ''): ?> 
                                            <tr>
                                                <th>Asignado a</th>
                                                <td> <?php echo $row['AssigntoName']; ?>-( <?php echo $row['AssignedtoEmpId']; ?>) </td>
                                            </tr>
                                            <tr>
                                                <th>Fecha de asignación</th>
                                                <td> <?php echo $row['AssignedTime']; ?> </td>
                                            </tr> 
                                            <?php endif; ?> 
                                            <?php if ($row['FinalReport'] != ''): ?> <tr>
                                                <th>Reporte</th>
                                                <td>
                                                    <a href="reportfiles/<?php echo $row['FinalReport']; ?>" target="_blank">Descargar</a>								
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Fecha de reporte</th>
                                                <td> <?php echo $row['ReportUploadTime']; ?> </td>
                                            </tr> 
                                            <?php endif; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?php } ?>
                            <?php
                                $orderid = intval($_GET['oid']);
                                $ret = mysqli_query($con, "select * from project_08_reporttracking
                                join project_08_admin on project_08_admin.ID=project_08_reporttracking.RemarkBy
                                where project_08_reporttracking.OrderNumber='$orderid'");
                                $num = mysqli_num_rows($ret);
                            ?> 
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-success" align="center">Historial de Seguimiento</h6>
                                    </div>
                                    <div class="card-body"> 
                                        <?php if ($num > 0) { ?> 
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <tr>
                                                <th>Observación</th>
                                                <th>Estado</th>
                                                <th>Fecha de registro</th>
                                                <th>Autorizado</th> <?php while ($result = mysqli_fetch_array($ret)) { ?>
                                            </tr>
                                            <tr>
                                                <td> <?php echo $result['Remark']; ?> </td>
                                                <td> <?php echo $result['Status']; ?> </td>
                                                <td> <?php echo $result['PostingTime']; ?> </td>
                                                <td> <?php echo $result['AdminName']; ?> </td>
                                            </tr> 
                                            <?php } ?>
                                        </table> 
                                        <?php   
                                         } else { ?> 
                                        <h4 align="center" style="color:red"> No se encontró historial de seguimiento </h4> <?php } ?> </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        <script type="text/javascript">
            $('#reportfile').hide();
            $(document).ready(function() {
                $('#status').change(function() {
                    if ($('#status').val() == 'Informe final') {
                        $('#reportfile').show();
                        jQuery("#report").prop('required', true);
                    } else {
                        $('#reportfile').hide();
                    }
                })
            })
        </script>
    </body>
</html>