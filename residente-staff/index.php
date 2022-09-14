<?php
    include('../staff.class.php');
    include('../config.php');
    $id_usuario = $_SESSION['id_usuario'];
	$id_staff = $_SESSION['id_staff'];
	$data = $residente->staff($id_usuario);
    if (isset($_POST['enviar'])) {
        if ($_POST['contrasena'] == $_POST['contrasena2']) {
            $dato = $_POST;
            $residente->actualizar_contrasena($dato);
        } else {
            echo "<script> alert('Las contraseñas no coinciden. Favor de llenar los datos correctamente'); </script>";
        }
    }
    ob_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/staff.css">
    <link rel="shortcut icon" href="../img/Iconos/campus.ico">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Campus Virtual | Inicio</title>
    <style>
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
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar">
                    <div class="logo"><a href="#"><img src="../img/logo.png" alt="logo" width="45" height="45" /></a></div>
                    <div class="buttons">
                        <button type='button' class='btn btn-light btn-sm' style='outline: none;
                            font-size: 18px;
                            font-weight: 500;
                            border-radius: 12px;
                            padding: 6px 15px;
                            border: none;
                            margin: 0 8px;
                            cursor: pointer;
                            transition: all 0.3s ease;
                            background-color: #ffffff;
                            color: #080710;
                            justify-content: center;
                            height:38px;' data-bs-toggle='modal' data-bs-target='#modalPassword'>
                            <img src="../img/Iconos/actualizar.png" alt="salir" width="30" height="30" /> Actualizar Contraseña
                        </button>
                        <button type='button' class='btn btn-light btn-sm' style='outline: none;
                            font-size: 18px;
                            font-weight: 500;
                            border-radius: 12px;
                            padding: 6px 15px;
                            border: none;
                            margin: 0 8px;
                            cursor: pointer;
                            transition: all 0.3s ease;
                            background-color: #ffffff;
                            color: #080710;
                            justify-content: center;
                            height:38px;' data-bs-toggle='modal' data-bs-target='#modalSalir'>
                            <img src="../img/Iconos/cerrar.png" alt="salir" width="30" height="30" /> Cerrar Sesión
                        </button>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <br>
    <div class="container" id="perfil">
        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card" data-tilt-glare data-tilt-max-glare="0.5" id='tarjetas'>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <div style="text-align: center;">
                                        <img src="../img/staff.png" alt="perfil" width="30%">
                                        <h2>MI PERFIL</h2>
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre:</label>
                                        <input type="text" class="form-control" readonly value="<?php echo $data['nombre'] . " " . $data['apellido']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Correo:</label>
                                        <input type="text" class="form-control" readonly value="<?php echo $data['email']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Área:</label>
                                        <input type="text" class="form-control" readonly value="<?php echo $data['area']; ?>">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card" data-tilt-glare data-tilt-max-glare="0.5" id='tarjetas' style="height: 15rem;">
                            <div class="card-body">
                                <h2> <img src="../img/Iconos/citas.png" alt="citas" width="50"> CITAS</h2>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-fill" id="dataTable" width="100%" cellspacing="0">
                                        <?php
                                            $citas = $residente->citas_hoy($_SESSION['id_staff']);
                                            if(empty($citas)){
                                                echo "<label>No hay citas agendadas para hoy.</label>";
                                            }else{
                                                $i = 1;
                                                echo "<thead>";
                                                echo "<tr>";
                                                echo "<th align='center'>#</th>";
                                                echo "<th align='center'>Día/Mes</th>";
                                                echo "<th align='center'>Horario</th>";
                                                echo "<th align='center'>Paciente</th>";
                                                echo "<th align='center'>Teléfono</th>";
                                                echo "<th align='center'>Iniciar</th>";
                                                echo "<th align='center'>Terminar</th>";
                                                echo "</tr>";
                                                echo "</thead>";
                                                foreach ($citas as $clave => $citaInf) {
                                                    echo "<tbody>";
                                                    echo "<tr>";
                                                    echo "<td align='center'>" . $i++ . "</td>";
                                                    echo "<td align='center'>" . $citaInf['fecha'] . "</td>";
                                                    echo "<td align='center'>" . $citaInf['horario'] . "</td>";
                                                    echo "<td align='center'>" . $citaInf['paciente'] . "</td>";
                                                    echo "<td align='center'>" . $citaInf['telefono'] . "</td>";
                                                    echo "<td align='center'><a data-bs-toggle='tooltip' data-bs-placement='top' 
                                                                title='Iniciar Cita' href='cita_paciente.php?id_cita=$clave&id_persona=".$citaInf['id_paciente']."'>
                                                                <img src='../img/Iconos/mas.png' width='30' height='30' alt='Ver Cita'/> </a></td>";
                                                    echo "<td align='center'><a data-bs-toggle='tooltip' data-bs-placement='top' 
                                                                title='Terminar Cita' href='terminar_cita.php?id_cita=$clave'>
                                                                <img src='../img/Iconos/eliminar.png' width='30' height='30' alt='Ver Cita'/> </a></td>";
                                                    echo "</tr>";
                                                }
                                                echo "</tbody>";
                                            }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="tarjeta-opciones">
                            <div class="card front-face" data-tilt-glare data-tilt-max-glare="0.5">
                                <img src="../img/Iconos/admi_citas.png" alt="recomendaciones">
                                <h2>ADMINISTRADOR DE CITAS</h2>
                            </div>
                            <div class="card back-face" data-tilt-glare data-tilt-max-glare="0.5">
                                <div class="info">
                                    <div class="title">Administrador de Citas</div>
                                    <p class="card-text">
                                        Esta opción te permitirá crear citas para que los demás empleados, al terminar sus respectivos tests, 
                                        puedan escoger alguna entre las opciones. De igual manera, en esta sección podrás
                                        eliminar alguna cita, siempre y cuando, estas no hayan sido ya agendadas.
                                    </p>
                                    <a href="administracion.php" id="boton">Ingresar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-4">
    </div>
    <div class="container">
        <div class="card" id="footer">
            <div class="row">
                <div class="col-sm-7">
                    <div class="row">
                        <div class="col-sm-12" align="center">
                            <br>
                            <h4>Coordinación de Seguros</h4>
                            <h4>Seguridad Vial</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="row">
                        <div class="col-sm-12" align="center">
                            <br>
                            <ul id="lista1">
                                <li>
                                    <a href="https://www.facebook.com/M%C3%A1s-vidas-a-salvo-111419330987436" target="_blank"><img src="../img/facebook.png" alt="facebook" width="40" height="40"></a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/channel/UC99OTeIdXhbwlzFNnh1H0IQ" target="_blank"><img src="../img/yt.png" alt="facebook" width="30" height="30"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Salir -->
    <div class="modal fade" id="modalSalir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="
                margin: auto;
                background: rgba( 255, 255, 255, 0.55 );
                box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
                backdrop-filter: blur( 11.5px );
                -webkit-backdrop-filter: blur( 11.5px );
                border-radius: 10px;
                border: 1px solid rgba( 255, 255, 255, 0.18 );
                font-family: 'Poppins', sans-serif;
                color: black;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cerrar Sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estas seguro de cerrar sesión?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color: #af62b3;" data-bs-dismiss="modal">Cancelar</button>
                    <a class="btn" href="log-out.php" style="background-color: #50c785">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="
                margin: auto;
                background: rgba( 255, 255, 255, 0.55 );
                box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
                backdrop-filter: blur( 11.5px );
                -webkit-backdrop-filter: blur( 11.5px );
                border-radius: 10px;
                border: 1px solid rgba( 255, 255, 255, 0.18 );
                font-family: 'Poppins', sans-serif;
                color: black;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><img src='../img/Iconos/actualizar.png' alt='estadistica' width='50'> Actualizar Contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 ms-auto">
                            <form method='POST' action='index.php' enctype='multipart/form-data'>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control" name="contrasena" placeholder="Contraseña" required oninput="strengthChecker()">
                                    <div id="strength-bar"></div>
                                    <p id="msg"></p>
                                </div>
                                <div class="form-group">
                                    <input id="password2" type="password" class="form-control" name="contrasena2" placeholder="Confirmar contraseña" required oninput="verificarPasswords()">
                                    <p id="iguales" style="margin-top: 4%;"></p>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="enviar" value="Actualizar" id="boton">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/Vanilla-tilt.js"></script>
    <script type="text/javascript" src="../js/Verificar Contraseña.js"></script>
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
    <script type="text/javascript">
        VanillaTilt.init(document.querySelectorAll("#tarjetas"), {
            max: 5,
            speed: 400
        });
    </script>
</body>
</html>