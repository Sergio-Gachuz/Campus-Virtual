<?php
	include('../empleado.class.php');
    include('../config.php');
	$id_cita = $_GET['id_cita'];
    $id_persona = $_GET['id_persona'];
	$trabajador->agendar_cita($id_cita, $id_persona);
	header("Location: final_habitos.php")
?>