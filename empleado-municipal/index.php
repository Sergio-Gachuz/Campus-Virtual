<?php
include('../empleado.class.php');
include('../config.php');
$id_usuario = $_SESSION['id_usuario'];
$id_persona = $_SESSION['id_persona'];
$id_direccion = $_SESSION['id_direccion'];
$_SESSION['bloque1'] = '';
$_SESSION['bloque2'] = '';
$_SESSION['bloque3'] = '';
$_SESSION['bloque4'] = '';
$data = $trabajador->persona($id_usuario);
$dato = $trabajador->progreso();
$rol = $trabajador->validar_rol(array('Administrador', 'Empleado', 'Enlace'));

$exibirModal = false;
if (!isset($_COOKIE["modalWelcome"])) {
    $expirar = 604800;
    setcookie('modalWelcome', 'SI', (time() + $expirar));
    $exibirModal = true;
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
    <link rel="stylesheet" href="../css/empleado.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../img/Iconos/campus.ico">
    <title>Campus Virtual | Inicio</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar">
                    <div class="logo"><a href="#"><img src="../img/logo.png" alt="logo" width="45" height="45" /></a></div>
                    <div class="buttons">
                        <?php
                        if ($rol == 'Administrador') {
                            echo "<a href='listado.php'><img src='../img/Iconos/listado.png' alt='lista' width='30' height='30'/> Lista de Empleados</a>";
                        }
                        ?>
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
                        <div class="card" data-tilt-glare data-tilt-max-glare="0.5" id='tarjetas' style="height: 38rem; align-items: center; justify-content:center;">
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <div style="text-align: center;">
                                        <img src="../img/empleado.png" alt="perfil" width="30%">
                                        <h2>MI PERFIL</h2>
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre:</label>
                                        <input type="text" class="form-control" readonly value="<?php echo $data['nombre']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Teléfono:</label>
                                        <input type="text" class="form-control" placeholder="Dirección" readonly name="direccion" value="<?php echo $data['telefono']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Dirección:</label>
                                        <input type="text" class="form-control" placeholder="Dirección" readonly name="direccion" value="<?php echo $data['descripcion']; ?>">
                                    </div>
                                    <div class="form-group detalle">
                                        <label>Progreso</label>
                                        <label><?php echo $dato['avance']; ?>%</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $dato['avance']; ?>%"></div>
                                        </div>
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
                        <div class="card" data-tilt-glare data-tilt-max-glare="0.5" id='tarjetas' style="height: 22rem">
                            <div class="card-body">
                                <h2> <img src="../img/Iconos/historico.png" alt="historico" width="50"> HISTÓRICO</h2>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-fill" id="dataTable" width="100%" cellspacing="0">
                                        <?php
                                        $i = 1;
                                        $personal = $trabajador->historico($id_persona);
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Test</th>";
                                        echo "<th>Fecha</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        foreach ($personal as $clave => $personas) {
                                            echo "<tbody>";
                                            echo "<tr>";
                                            echo "<td>" . $i++ . "</td>";
                                            echo "<td>" . $personas['examen'] . "</td>";
                                            echo "<td>" . $personas['fecha'] . "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card" data-tilt-glare data-tilt-max-glare="0.5" id='tarjetas'>
                            <div class="card-body">
                                <h2><img src="../img/Iconos/test.png" alt="historico" width="50"> TESTS</h2>
                                <div class="row">
                                    <div class="col-sm-4 col-md-3 iconApp text-center">
                                        <a href="cargar_preguntas_bateria.html" class="thumbnail">
                                            <img src="../img/Iconos/bateria.png" alt="examen" width="60" height="60"></img>
                                            <div class="caption">
                                                <p class="text-center">Batería para Conductores</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-4 col-md-3 iconApp text-center">
                                        <a href="cargar_preguntas_habitos.html" class="thumbnail">
                                            <img src="../img/Iconos/habitos.png" alt="examen" width="60" height="60"></img>
                                            <div class="caption">
                                                <p class="text-center">Hábitos Alimenticios</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-4 col-md-3 iconApp text-center">
                                        <a href="norma035.php" class="thumbnail">
                                            <img src="../img/Iconos/norma.png" alt="examen" width="60" height="60"></img>
                                            <div class="caption">
                                                <p class="text-center">Norma 035</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if ($rol == 'Administrador' || $rol == 'Enlace') {
            echo "<div class='row'>
                    <div class='col-sm-12'>
                        <div class='card' id='tarjetas' data-tilt-glare data-tilt-max-glare='0.5'>
                            <div class='card-body'>
                                <div class='dashboard'>
                                    <h2><img src='../img/Iconos/dashboard.png' alt='estadistica' width='50'> DASHBOARD</h2>
                                    <button type='button' class='btn btn-light btn-sm' style='height: 30px; margin-left: 10px;' data-bs-toggle='modal' data-bs-target='#modalDash'>
                                        ?
                                    </button>
                                </div>
                                <br>
                                <div class='row'>
                                    <div class='col-sm-4 col-md-3 iconApp text-center'>
                                        <a href='estadisticas_accidentes.php' class='thumbnail'>
                                            <img src='../img/Iconos/accidente.png' alt='examen' width='60' height='60'></img>
                                            <div class='caption'>
                                                <p class='text-center'>Accidentes</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class='col-sm-4 col-md-3 iconApp text-center'>
                                        <a href='estadisticas_bateria.php' class='thumbnail'>
                                            <img src='../img/Iconos/bateria.png' alt='examen' width='60' height='60'></img>
                                            <div class='caption'>
                                                <p class='text-center'>Batería para Conductores</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class='col-sm-4 col-md-3 iconApp text-center'>
                                        <a href='estadisticas_habitos.php' class='thumbnail'>
                                            <img src='../img/Iconos/habitos.png' alt='examen' width='60' height='60'></img>
                                            <div class='caption'>
                                                <p class='text-center'>Hábitos Alimenticios</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class='col-sm-4 col-md-3 iconApp text-center'>
                                        <a href='estadisticas_norma.php' class='thumbnail'>
                                            <img src='../img/Iconos/norma.png' alt='examen' width='60' height='60'></img>
                                            <div class='caption'>
                                                <p class='text-center'>Norma 035</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        ?>
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

    <!-- Modal Welcome -->
    <div class="modal fade" id="modalWelcome" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
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
                    <h5 class="modal-title" id="exampleModalLabel">¿Qué esperar de un campus virtual?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 ms-auto">
                            <p style="text-align: justify;">
                                El campus virtual es una plataforma online de educación,
                                realizada y brindada por instituciones académicas, aunque también es un sistema utilizado por
                                instituciones u organizaciones que no son de naturaleza educativa que necesitan ofrecer cursos
                                virtuales sobre diversos. En el interior de esta plataforma podrás encontrar pruebas
                                de distintos ambitos.
                            </p>
                            <br>
                            <p style="text-align: justify;">
                                El campus virtual forma parte del programa de seguridad vial perteneciente a la Coordinación de Seguros.
                            </p>
                        </div>
                        <div class="col-md-6 ms-auto" align="center">
                            <img src="../img/sv.png" alt="campus" height="350" width="350" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal DashBoard -->
    <div class="modal fade" id="modalDash" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
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
                    <h5 class="modal-title" id="exampleModalLabel">¿Qué es un dashboard?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 ms-auto">
                            <p style="text-align: justify;">
                                Un dashboard o cuadro de mando es una herramienta de
                                inteligencia de negocios que representan las métricas que afectan en
                                el logro de los objetivos de una estrategia. En él, podemos visualizar de forma ordenada
                                y en base a la selección de parámetros e
                                indicadores que interese monitorizar, el estado del negocio o de un proyecto.
                            </p>
                            <br>
                            <p style="text-align: justify;">
                                Un dashboard puede indicarnos que tenemos un problema o que todo o algo marcha muy
                                bien. Nos presentará
                                un hecho, que nos llevará a un origen global, no particular, que nos pondrá
                                en alerta para, posteriormente, poder llegar al origen último y tomar medidas
                                correctoras, si fuera
                                el caso, o potenciarlo, si el hecho que se nos ha presentado fuera positivo.
                            </p>
                        </div>
                        <div class="col-md-6 ms-auto" align="center">
                            <img src="../img/Iconos/grafico.png" alt="campus" width="50%" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <?php
    if ($exibirModal === true) :
    ?>
        <script>
            $(document).ready(function() {
                $("#modalWelcome").modal("show");
            });
        </script>
    <?php
    endif;
    ?>
    <script type="text/javascript" src="../js/Vanilla-tilt.js"></script>
    <script type="text/javascript">
        VanillaTilt.init(document.querySelectorAll("#tarjetas"), {
            max: 5,
            speed: 400
        });
    </script>
</body>

</html>