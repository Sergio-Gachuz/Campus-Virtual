<?php
    include('../empleado.class.php');
    include('../config.php');
	$id_staff = $_GET['id_staff'];
	$trabajador->borrar_staff($id_staff);
	header("Location: listado.php")
?>