<?php
    include('../empleado.class.php');
    include('../config.php');
	$id_empleado = $_GET['id_empleado'];
	$trabajador->borrar_empleado($id_empleado);
	header("Location: listado.php")
?>