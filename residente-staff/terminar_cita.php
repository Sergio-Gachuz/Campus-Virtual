<?php
	include('../staff.class.php');
    include('../config.php');
	$id_cita = $_GET['id_cita'];
	$residente->terminar_cita($id_cita);
	header("Location: index.php")
?>