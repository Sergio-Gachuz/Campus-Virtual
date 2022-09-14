<?php
    include('../empleado.class.php');
    require_once('../config2.php');
    $id_direccion = $_SESSION['id_direccion'];;
    $select = $conn->prepare("SELECT 
    d.descripcion as descripcion,
    (SELECT count(id_persona) FROM persona WHERE persona.id_direccion = :id_direccion AND id_persona IN (SELECT id_persona FROM persona_examen where id_examen = 6)) as realizado,
    (SELECT count(id_persona) FROM persona WHERE id_direccion = :id_direccion) - (SELECT count(id_persona) FROM persona WHERE persona.id_direccion = :id_direccion AND id_persona IN (SELECT id_persona FROM persona_examen where id_examen = 6)) as norealizado
from persona p inner join persona_examen pe on p.id_persona = pe.id_persona inner join direccion d on p.id_direccion = d.id_direccion where p.id_direccion = :id_direccion group by p.id_direccion;");
    $select->bindParam(':id_direccion', $id_direccion);
    $select->execute();
    $data = array();
    while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
    print json_encode($data);
?>