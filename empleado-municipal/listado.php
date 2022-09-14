<?php
    include('../empleado.class.php');
    include('../config.php');
    $rol = $trabajador->validar_rol(array('Administrador'));
    $direccion = $_SESSION['id_direccion'];
    if (isset($_POST['enviar'])) {
        $data = $_POST;
        $trabajador->registro_staff($data);
    }
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
    <link rel="stylesheet" href="../css/empleado.css">
    <link rel="shortcut icon" href="../img/Iconos/campus.ico">
    <title>Lista de Empleados</title>
    <style>
        input[type="email"],
        input[type="password"],
        input[type="text"] {
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
                        <a href='index.php'><img src='../img/Iconos/inicio.png' alt='lista' width='30' height='30' /> Inicio</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <br>
    <div class="container" id="perfil">
        <div class="row">
            <div class="col-sm-12">
                <div class="card lista">
                    <div class="card-body">
                        <h2><img src="../img/Iconos/listado.png" alt="historico" width="50"> LISTA DE EMPLEADOS</h2>
                        <div class="table-responsive" id="citas">
                            <table class="table table-bordered table-fill" id="dataTable" width="100%" cellspacing="0">
                                <?php
                                $empleados = $trabajador->listado_empleados($_SESSION['id_direccion']);
                                if(empty($empleados)){
                                    echo "<label>No hay empleados en esta dirección</label>";
                                }else{
                                    echo "<thead>";
                                    echo "<tr>";
                                    echo "<th colspan=2></th>";
                                    echo "<th colspan=3>Tests</th>";
                                    echo "<th colspan=1></th>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<th align='center'>No. Nómina</th>";
                                    echo "<th align='center'>Nombre</th>";
                                    echo "<th align='center'>Batería</th>";
                                    echo "<th align='center'>Hábitos A.</th>";
                                    echo "<th align='center'>Norma 035</th>";
                                    echo "<th align='center'>Eliminar</th>";
                                    echo "</tr>";
                                    echo "</thead>";
                                    foreach ($empleados as $clave => $employee) {
                                        echo "<tbody>";
                                        echo "<tr>";
                                        echo "<td align='center'>" . $employee['num_nomina'] . "</td>";
                                        echo "<td align='center'>" . $employee['nombre']."</td>";
                                        if(!is_null($employee['bateria'])){
                                            echo "<td align='center'><img src='../img/Iconos/realizado.png' width='40' height='40' alt='si'/></td>";
                                        }else{
                                            echo "<td align='center'><img src='../img/Iconos/no realizado.png' width='40' height='40' alt='si'/></td>";
                                        }
                                        if(!is_null($employee['habitos'])){
                                            echo "<td align='center'><img src='../img/Iconos/realizado.png' width='40' height='40' alt='si'/></td>";
                                        }else{
                                            echo "<td align='center'><img src='../img/Iconos/no realizado.png' width='40' height='40' alt='si'/></td>";
                                        }
                                        if(!is_null($employee['guia1']) && !is_null($employee['guia2']) && !is_null($employee['guia3'])){
                                            echo "<td align='center'><img src='../img/Iconos/realizado.png' width='40' height='40' alt='si'/></td>";
                                        }else{
                                            echo "<td align='center'><img src='../img/Iconos/no realizado.png' width='40' height='40' alt='si'/></td>";
                                        }
                                        echo "<td align='center'><a data-bs-toggle='tooltip' data-bs-placement='top' 
                                                    title='Eliminar' href='eliminar_empleado.php?id_empleado=$clave'>
                                                    <img src='../img/Iconos/eliminar.png' width='40' height='40' alt='Eliminar'/> </a>
                                            </td>";
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
                <?php
                    if($direccion == 7){
                        echo "<div class='card lista'>
                                <div class='card-body'>
                                    <div class='dashboard' id='staff'>
                                        <h2><img src='../img/Iconos/listado.png' alt='historico' width='50'> LISTA DE STAFF</h2>
                                        <button type='button' class='btn btn-light btn-sm' id='nuevo' style='outline: none;
                                            position:relative;
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
                                            right:-55%;
                                            height:38px;' data-bs-toggle='modal' data-bs-target='#modalStaff'>
                                            <img src='../img/Iconos/plus.png' alt='salir' width='30' height='30' /> Agregar nuevo
                                        </button>
                                    </div>
                                    ";
                                    echo "<div class='table-responsive' id='citas'>";
                                        echo "<table class='table table-bordered table-fill' width='100%' cellspacing='0'>";
                                        $staff = $trabajador->listado_staff();
                                        if (empty($staff)) {
                                            echo "<label>No hay residentes o personal de staff registrados.</label>";
                                        }else{
                                            $i = 1;
                                            echo "<thead>";
                                            echo "<tr>";
                                            echo "<th align='center'>#</th>";
                                            echo "<th align='center'>Nombre</th>";
                                            echo "<th align='center'>Área</th>";
                                            echo "<th align='center'>Programa</th>";
                                            echo "<th align='center'>Eliminar</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            foreach ($staff as $clave => $employee) {
                                                echo "<tbody>";
                                                echo "<tr>";
                                                echo "<td align='center'>" . $i++ . "</td>";
                                                echo "<td align='center'>" . $employee['apellido'] . " " . $employee['nombre'] . "</td>";
                                                echo "<td align='center'>" . $employee['area'] . "</td>";
                                                echo "<td align='center'>" . $employee['programa'] . "</td>";
                                                echo "<td align='center'><a data-bs-toggle='tooltip' data-bs-placement='top' 
                                                            title='Eliminar' href='eliminar_staff.php?id_staff=$clave'>
                                                            <img src='../img/Iconos/eliminar.png' width='40' height='40' alt='Eliminar'/> </a></td>";
                                                echo "</tr>";
                                            }
                                            echo "</tbody>";
                                        echo "</table>";
                                        }
                                    echo "</div>";
                            echo "</div>
                        </div>";
                    }
                ?>
                <hr class="my-4">
            </div>
        </div>
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

    <!-- Modal Staff -->
    <div class="modal fade" id="modalStaff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <h5 class="modal-title" id="exampleModalLabel"><img src='../img/Iconos/plus.png' alt='estadistica' width='50'> Nuevo Integrante de Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 ms-auto">
                            <form method='POST' action='listado.php' enctype='multipart/form-data'>
                                <label>Introducir los datos solicitados.</label>
                                <div class='form-group'>
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre/s" required>
                                </div>
                                <div class='form-group'>
                                    <input type="text" class="form-control" name="apellido" placeholder="Apellidos" required>
                                </div>
                                <div class='form-group'>
                                    <select class='form-control' name='id_area' required style="display: block;
                                        height: 50px;
                                        width: 100%;
                                        background-color: rgba(255, 255, 255, 0.671);
                                        border-radius: 3px;
                                        padding: 0 10px;
                                        margin-top: 8px;
                                        font-size: 14px;
                                        font-weight: 300;">
                                        <option value="">Área</option>
                                        <?php
                                            $area = $trabajador->areas();
                                            foreach ($area as $clave => $depto) {
                                                echo "<option value='" . $depto['id_area'] . "'>" . $depto['area'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="programa" placeholder="Programa" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" required placeholder="Correo Electrónico">
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control" name="contrasena" placeholder="Contraseña" required>
                                </div>
                                <div class='form-group'>
                                    <input type="submit" name="enviar" value="Registrar" id="boton" style="margin-top: 10px;">
                                </div>
                                <br>
                                <div class='form-group'>
                                    <p>Proporcionar la contraseña al nuevo integrante del staff.</p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>