<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['aid'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {
    $testid = intval($_GET['tid']);
    $ato = $_POST['assignto'];
    $assignto = explode("-", $ato);
    $aname = $assignto[0];
    $pid = $assignto[1];
    $status = 'Asignado';
    $assigntime = date('d-m-Y h:i:s A', time());
    $query = mysqli_query($con, "update project_08_testrecord set ReportStatus='$status',AssigntoName='$aname',AssignedtoEmpId='$pid',AssignedTime='$assigntime' where id='$testid'");
    echo '<script>alert("Asignación exitosa.")</script>';
    echo "<script>window.location.href='assigned-test.php'</script>";
  }
  if (isset($_POST['takeaction'])) {
    $orderid = intval($_GET['oid']);
    $status = $_POST['status'];
    $remark = $_POST['remark'];
    $rby = $_SESSION['aid'];
    if ($status == 'Informe final'):
      $uploadtime = date('d-m-Y h:i:s A', time());
      $reportfile = $_FILES["report"]["name"];
      $extension = substr($reportfile, strlen($reportfile) - 4, strlen($reportfile));
      $allowed_extensions = array(".doc", ".pdf", ".PDF");
      if (!in_array($extension, $allowed_extensions)) {
        echo "<script>alert('Archivo no válido. Asegúrese de que esté en formato DOC o PDF.');</script>";
      } else {
        $newreportfile = md5($reportfile) . time() . $extension;
        move_uploaded_file($_FILES["report"]["tmp_name"], "reportfiles/" . $newreportfile);
        $query = mysqli_query($con, "insert into project_08_reporttracking(OrderNumber,Status,Remark,RemarkBy) values('$orderid','$status','$remark','$rby')");
        $query2 = mysqli_query($con, "update project_08_testrecord set ReportStatus='$status',FinalReport='$newreportfile',ReportUploadTime='$uploadtime' where OrderNumber='$orderid'");
        echo '<script>alert("Reporte actualizado correctamente.")</script>';
        echo "<script>window.location.href='all-test.php'</script>";
      }
    else:
      $query = mysqli_query($con, "insert into project_08_reporttracking(OrderNumber,Status,Remark,RemarkBy) values('$orderid','$status','$remark','$rby')");
      $query2 = mysqli_query($con, "update project_08_testrecord set ReportStatus='$status' where OrderNumber='$orderid'");
      echo '<script>alert("Reporte actualizado correctamente.")</script>';
      echo "<script>window.location.href='all-test.php'</script>";
    endif;
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
            <h1 class="h3 mb-4 text-gray-800">Reporte de Seguimiento #<?php echo intval($_GET['oid']); ?> </h1>
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
                          <th>Clave de identificación</th>
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
                      <h6 class="m-0 font-weight-bold text-success">Prueba a Realizar</h6>
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
                          <th>Fecha de la prueba</th>
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
                        <?php endif; ?> <?php if ($row['FinalReport'] != ''): ?>
                          <tr>
                            <th>Reporte</th>
                            <td>
                              <a href="reportfiles/<?php echo $row['FinalReport']; ?>" target="_blank">Descargar </a>
                            </td>
                          </tr>
                          <tr>
                            <th>Fecha de entrega</th>
                            <td> <?php echo $row['ReportUploadTime']; ?> </td>
                          </tr>
                        <?php endif; ?>
                      </table>
                      <?php if ($row['AssignedtoEmpId'] == ''): ?>
                        <div class="form-group">
                          <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#assignto">Asignar Flebotomista</button>
                        </div>
                        <?php else:
                        $rstatus = $row['ReportStatus'];
                        if ($rstatus == 'Asignado' || $rstatus == 'En proceso' || $rstatus == 'Toma de muestra' || $rstatus == 'En laboratorio'): ?> <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#takeaction">Continuar proceso</button> 
                        <?php
                        endif;
                        endif; ?>
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
                  <h6 class="m-0 font-weight-bold text-success" align="center">Reporte de Seguimiento</h6>
                </div>
                <div class="card-body"> 
                  <?php if ($num > 0) { ?> 
                  <table class="table table-bordered" width="100%" cellspacing="0">
                    <tr>
                      <th>Observación</th>
                      <th>Estado</th>
                      <th>F. Reporte</th>
                      <th>Autorizado</th> 
                      <?php while ($result = mysqli_fetch_array($ret)) { ?>
                    </tr>
                    <tr>
                      <td> <?php echo $result['Remark']; ?> </td>
                      <td> <?php echo $result['Status']; ?> </td>
                      <td> <?php echo $result['PostingTime']; ?> </td>
                      <td> <?php echo $result['AdminName']; ?> </td>
                    </tr> 
                    <?php } ?>        
                  </table> 
                  <?php } else { ?>
                  <h4 align="center" style="color:red"> No hay seguimiento. </h4> 
                  <?php } ?> 
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
    <div id="assignto" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 align="left">Asignar Flebotomista</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="post">
              <p>
                <select class="form-control" name="assignto" required="true">
                  <option value="">Seleccionar Flebotomista</option> 
                    <?php $sql = mysqli_query($con, "select FullName,EmpID from project_08_phlebotomist");
                      while ($result = mysqli_fetch_array($sql)) {
                    ?> 
                  <option value="<?php echo $result['FullName'] . "-" . $result['EmpID']; ?>"> <?php echo $result['FullName']; ?>-( <?php echo $result['EmpID']; ?>) </option> 
                  <?php } ?>							
                </select>
              </p>
              <p>
                <input type="submit" class="btn btn-success btn-user btn-block" name="submit" id="submit">
              </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <div id="takeaction" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 align="left">Realizar Seguimiento</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="post" enctype="multipart/form-data">
              <p>
                <select class="form-control" name="status" id="status" required="true">
                  <option value="">Selecciona una opción</option> 
                    <?php
                      $query1 = mysqli_query($con, "select ReportStatus from project_08_testrecord where OrderNumber='$orderid'");
                      while ($result = mysqli_fetch_array($query1)):
                        $reportstatus = $result['ReportStatus'];
                      endwhile;
                      ?> 
                      <?php if ($reportstatus == 'Asignado'): ?> 
                    <option value="En proceso">En proceso</option>
                    <option value="Toma de muestra">Toma de muestra</option>
                    <option value="En laboratorio">En laboratorio</option>
                    <option value="Informe final">Informe final</option> 
                      <?php elseif ($reportstatus == 'En proceso'): ?> 
                    <option value="Toma de muestra">Toma de muestra</option>
                    <option value="En laboratorio">En laboratorio</option>
                    <option value="Informe final">Informe final</option> 
                      <?php elseif ($reportstatus == 'Toma de muestra'): ?> 
                    <option value="En laboratorio">En laboratorio</option>
                    <option value="Informe final">Informe final</option> 
                      <?php elseif ($reportstatus == 'En laboratorio'): ?> 
                    <option value="Informe final">Informe final</option> 
                      <?php endif; ?>
                </select>
              </p>
              <p id='reportfile'> Realizar reporte <span style="color:red; font-size:12px;">(Solo se aceptan archivos en formato .doc y .pdf.)</span>
                <input type="file" name="report" id="report">
              </p>
              <p>
                <textarea name="remark" class="form-control" required="true" placeholder="Observación (máximo 500 caracteres)" maxlength="500" rows="5"></textarea>
              </p>
              <p>
                <input type="submit" class="btn btn-success btn-user btn-block" name="takeaction" id="submit">
              </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
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
<?php } ?>