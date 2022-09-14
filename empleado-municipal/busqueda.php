<?php
    $num_nomina = $_REQUEST['num_nomina'];
    $id_nomina = $_REQUEST['id_nomina'];
    $con = mysqli_connect("localhost","root","","campus");
    if($num_nomina !== "" && $id_nomina > 0){
        $query = mysqli_query($con, "SELECT nombre, id_direccion, id_departamento FROM datos WHERE num_nomina = '$num_nomina' AND id_nomina = '$id_nomina'");
        $row = mysqli_fetch_array($query);
        $nombre = $row["nombre"];
        $direccion = $row['id_direccion'];
        $depto = $row['id_departamento'];
    }
    $result = array("$nombre","$direccion","$depto");
    $myJSON = json_encode($result);
    echo $myJSON;
?>