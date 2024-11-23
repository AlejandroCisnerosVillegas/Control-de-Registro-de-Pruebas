<?php session_start();
  include_once('includes/config.php');
  if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
  } else {
    if (isset($_POST['update'])) {
      $adminid = $_SESSION['aid'];
      $aname = $_POST['adminname'];
      $mobno = $_POST['mobilenumber'];
      $email = $_POST['email'];
      $query = mysqli_query($con, "update project_08_admin set AdminName='$aname', MobileNumber ='$mobno', Email= '$email' where ID='$adminid'");
      if ($query) {
        echo '<script>alert("Perfil actualizado con éxito.")</script>';
      } else {
        echo '<script>alert("A ocurrido un error. Por favor inténtalo de nuevo.")</script>';
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
            <h1 class="h3 mb-4 text-gray-800">Usuario Administrador</h1>
            <form method="post" name="adminprofile">
              <div class="row">
                <div class="col-lg-8">
                  <div class="card shadow mb-4"> 
                    <?php
                      $adminid = $_SESSION['aid'];
                      $ret = mysqli_query($con, "select * from project_08_admin where ID='$adminid'");
                      $cnt = 1;
                      while ($row = mysqli_fetch_array($ret)) {
                    ?> 
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">Fecha de registro: <?php echo $row['AdminRegdate']; ?> </h6>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label>Nombre completo</label>
                          <input type="text" class="form-control" name="adminname" value="<?php echo $row['AdminName']; ?>" required='true'>             
                        </div>
                        <div class="form-group">
                          <label>Nombre de usuario</label>
                          <input type="text" class="form-control" name="username" value="<?php echo $row['AdminuserName']; ?>" readonly='true'>               
                        </div>
                        <div class="form-group">
                          <label>Correo electrónico</label>
                          <input type="email" class="form-control" name="email" value="<?php echo $row['Email']; ?>" required='true'>                
                        </div>
                        <div class="form-group">
                          <label>Número telefónico</label>
                          <input type="text" class="form-control" name="mobilenumber" value="<?php echo $row['MobileNumber']; ?>" required='true' maxlength='10'>                     
                        </div> <?php } ?> <div class="form-group">
                        <input type="submit" class="btn btn-success btn-user btn-block" name="update" id="update" value="Actualizar">
                      </div>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
  </body>
</html> 
<?php } ?>