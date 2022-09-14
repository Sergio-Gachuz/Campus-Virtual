<?php
    include('../staff.class.php');
    include('../config.php');
    if (isset($_POST['staff'])) {
        $data = $_POST;
        $residente->log_in_staff($data['email'], $data['contrasena']);
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
    <title>Iniciar Sesión</title>
    <link rel="shortcut icon" href="../img/Iconos/campus.ico">
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST" action="log-in.php">
        <h3>
            <img src="../img/celaya.png" width="35" height="40" alt="logo"> Iniciar Sesión
            <span>Staff</span>
        </h3>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Correo Electrónico" name="email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Contraseña" name="contrasena">
        </div>
        <div class="form-group" align="center">
            <input type="submit" class="btnSubmit" name="staff" value="Ingresar" />
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>