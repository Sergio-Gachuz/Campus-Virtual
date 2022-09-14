<?php
include('../empleado.class.php');
include('../config.php');
if (isset($_POST['enviar'])) {
    if ($_POST['contrasena'] == $_POST['contrasena2']) {
        $data = $_POST;
        $trabajador->registrar($data);
    } else {
        echo "<script> alert('Las contraseñas no coinciden. Favor de llenar los datos correctamente'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/log-sign.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/Iconos/campus.ico">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Registrarse</title>
    <style>
        input[type="number"],
        input[type="text"],
        input[type="tel"],
        input[type="password"] {
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.671);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        ::placeholder {
            color: black;
            font-weight: bold;
        }

        input[type=submit] {
            margin-top: 40px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape" id="figura"></div>
    </div>
    <div id="formulario">
        <form method="POST" action="sign-in.php" id="registro">
            <h3>
                <img src="../img/Iconos/sign.png" alt="registrar" width="50">
                Registrarse
            </h3>
            <div class="row g-3">
                <div class="form-group col-md-6">
                    <select name="id_nomina" id="id_nomina" class="form-control" required style="display: block;
                                            height: 50px;
                                            width: 100%;
                                            background-color: rgba(255, 255, 255, 0.671);
                                            border-radius: 3px;
                                            padding: 0 10px;
                                            margin-top: 8px;
                                            font-size: 14px;
                                            font-weight: 300;" oninput="buscar()">
                        <option value="">Tipo de Nómina</option>
                        <option value="1">Quincenal</option>
                        <option value="2">Catorcena</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="num_nomina" placeholder="No. Nómina (5 Dígitos)" required min="1" id="num_nomina" onkeyup="GetDetail(this.value, document.getElementById('id_nomina').value)">
                </div>
                <div class="form-group col-md-8">
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre/s" required>
                </div>
                <div class="form-group col-md-4">
                    <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" required>
                </div>
                <div class="form-group col-md-6">
                    <select name="id_direccion" id="id_direccion" class="form-control" required style="display: block;
                                            height: 50px;
                                            width: 100%;
                                            background-color: rgba(255, 255, 255, 0.671);
                                            border-radius: 3px;
                                            padding: 0 10px;
                                            margin-top: 8px;
                                            font-size: 14px;
                                            font-weight: 300;">
                        <option value="">Dirección</option>
                        <?php
                        $direccion = $trabajador->direccion();
                        foreach ($direccion as $clave => $dir) {
                            echo "<option value='" . $dir['id_direccion'] . "'>" . $dir['descripcion'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                <select name="id_departamento" id="id_departamento" class="form-control" required style="display: block;
                                            height: 50px;
                                            width: 100%;
                                            background-color: rgba(255, 255, 255, 0.671);
                                            border-radius: 3px;
                                            padding: 0 10px;
                                            margin-top: 8px;
                                            font-size: 14px;
                                            font-weight: 300;">
                        <option value="">Departamento</option>
                        <?php
                        $direccion = $trabajador->departamentos();
                        foreach ($direccion as $clave => $dir) {
                            echo "<option value='" . $dir['id_departamento'] . "'>" . $dir['descripcion'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <select name="id_rol" class="form-control" required style="display: block;
                                            height: 50px;
                                            width: 100%;
                                            background-color: rgba(255, 255, 255, 0.671);
                                            border-radius: 3px;
                                            padding: 0 10px;
                                            margin-top: 8px;
                                            font-size: 14px;
                                            font-weight: 300;">
                        <option value="">Tipo de Usuario</option>
                        <?php
                        $rol = $trabajador->roles();
                        foreach ($rol as $clave => $puesto) {
                            echo "<option value='" . $puesto['id_rol'] . "'>" . $puesto['rol'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <input id="password" type="password" class="form-control" name="contrasena" placeholder="Contraseña" required oninput="strengthChecker()">
                    <div id="strength-bar"></div>
                    <p id="msg"></p>
                </div>
                <div class="form-group col-md-4">
                    <input id="password2" type="password" class="form-control" name="contrasena2" placeholder="Confirmar contraseña" required oninput="verificarPasswords()">
                    <p id="iguales" style="margin-top: 4%;"></p>
                </div>
                <div class="form-group">
                    <input type="submit" name="enviar" value="Registrar" id="boton">
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="../js/Verificar Contraseña.js"></script>
    <script type="text/javascript">
        let iguales = document.getElementById("iguales");

        function verificarPasswords() {
            let pass1 = document.getElementById('password').value;
            let pass2 = document.getElementById('password2').value;

            if (pass1 != pass2) {
                iguales.textContent = "No coinciden";
            } else {
                iguales.textContent = "Las contraseñas coinciden";
            }
        }
    </script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript">
        function GetDetail(str1, str2) {
            if (str1.length < 5 || str2 == 0) {
                document.getElementById("nombre").value = "";
                document.getElementById("id_direccion").value = "";
                document.getElementById("id_departamento").value = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var myObj = JSON.parse(this.responseText);
                        document.getElementById("nombre").value = myObj[0];
                        document.getElementById("id_direccion").value = myObj[1];
                        document.getElementById("id_departamento").value = myObj[2];
                    }
                }
                xmlhttp.open("GET", "busqueda.php?num_nomina=" + str1 + "&id_nomina=" + str2, true);
                xmlhttp.send();
            }
        }
    </script>
</body>

</html>