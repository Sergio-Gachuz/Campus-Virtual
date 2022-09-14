<?php
    include('../empleado.class.php');
    include('../config.php');
    if (isset($_POST['empleado'])) {
        $data = $_POST;
        $trabajador->log_in_empleado($data['num_nomina'], $data['id_nomina'], $data['contrasena']);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/log-sign.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/Iconos/campus.ico">
    <title>Iniciar Sesión</title>
    
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST" action="log-in.php">
        <h3>
            <img src="../img/Iconos/log.png" width="50" alt="logo"> Iniciar Sesión
            <span>Empleado Municipal</span>
        </h3>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="No. Nómina (5 Dígitos)" name="num_nomina" min="1">
        </div>
        <div class="form-group">
            <select name="id_nomina" class="form-control" id="id_nomina">
                <option value="0" selected class="opciones">Tipo de Nómina</option>
                <option value="1" class="opciones">Quincenal</option>
                <option value="2" class="opciones">Catorcena</option>
            </select>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Contraseña" name="contrasena">
        </div>
        <div class="form-group" align="center">
            <input type="submit" class="btnSubmit" name="empleado" value="Ingresar" />
        </div>
        <br>
        <div class="form-group" align="center">
            <a href="sign-in.php">Registrarse</a>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>