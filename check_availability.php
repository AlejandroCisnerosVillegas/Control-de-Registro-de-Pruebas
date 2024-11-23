<?php
	require_once("includes/config.php");
	if (!empty($_POST["mobnumber"])) {
		$mnumber = $_POST["mobnumber"];
		$result = mysqli_query($con, "select id from project_08_patients where MobileNumber='$mnumber'");
		$count = mysqli_num_rows($result);
		if ($count > 0) {
			echo "<span style='color:red'> El número telefónico ingresado ya existe. Ingresa uno nuevo o haz clic en <a href='registered-user-testing.php'>Usuarios registrados</span>";
			echo "<script>$('#submit').prop('disabled',true);</script>";
		} else {
			echo "<span style='color:green'> Número telefónico disponible.</span>";
			echo "<script>$('#submit').prop('disabled',false);</script>";
		}
	}
	if (!empty($_POST["employeeid"])) {
		$empid = $_POST["employeeid"];
		$result = mysqli_query($con, "select id from project_08_phlebotomist where EmpID='$empid'");
		$count = mysqli_num_rows($result);
		if ($count > 0) {
			echo "<span style='color:red'> La clave ingresada ya existe. Intente con otra combinación.</span>";
			echo "<script>$('#submit').prop('disabled',true);</script>";
		} else {
			echo "<span style='color:green'> Clave de empleado disponible.</span>";
			echo "<script>$('#submit').prop('disabled',false);</script>";
		}
	}
?>