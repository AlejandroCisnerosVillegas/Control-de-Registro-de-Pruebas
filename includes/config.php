<?php
  date_default_timezone_set('Asia/Kolkata');
  $con = mysqli_connect("localhost", "root", "", "general");
  if (mysqli_connect_errno()) {
  echo "Conexión fallida" . mysqli_connect_error();
}