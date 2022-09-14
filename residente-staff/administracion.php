<?php
    include('../staff.class.php');
    include('../config.php');
    if (isset($_POST['guardar_cita'])) {
        $data = $_POST;
        $residente->crear_cita($data);
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
    <link rel="stylesheet" href="../css/staff.css">
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
                        <a href='index.php'><img src='../img/Iconos/inicio.png' alt='lista' width='30' height='30' /> Regresar</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <br>
    <div class="container" id="perfil">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h2><img src="../img/Iconos/guia.png" alt="citas" width="50"> CREAR CITA</h2>
                        <hr class="my-2">
                        <form method="POST" action="administracion.php" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="form-group col-md-4">
                                    <label>Fecha</label>
                                    <input type="date" class="form-control" name="fecha">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Horario</label>
                                    <input type="time" class="form-control" placeholder="HH:MM" name="hora_inicial">
                                </div>
                                <div class="form-group col-md-4" style="margin-top: -10px;">
                                    <input type="submit" name="guardar_cita" value="Guardar"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">            
                        <div class="table-responsive" id="citas">
                            <h2><img src="../img/Iconos/citas.png" alt="citas" width="50"> LISTA DE CITAS</h2>
                            <hr class="my-2">
                            <table class="table table-bordered table-fill" id="dataTable" width="100%" cellspacing="0">
                                <?php
                                $citas = $residente->citas($_SESSION['id_staff']);
                                if (empty($citas)) {
                                    echo "<label>No hay citas creadas</label>";
                                } else {
                                    $i = 1;
                                    echo "<thead>";
                                    echo "<tr>";
                                    echo "<th align='center'>#</th>";
                                    echo "<th align='center'>Día/Mes</th>";
                                    echo "<th align='center'>Horario</th>";
                                    echo "<th align='center'>Eliminar</th>";
                                    echo "</tr>";
                                    echo "</thead>";
                                    foreach ($citas as $clave => $citaInf) {
                                        echo "<tbody class='table-hover'>";
                                        echo "<tr>";
                                        echo "<td align='center'>" . $i++ . "</td>";
                                        echo "<td align='center'>" . $citaInf['fecha'] . "</td>";
                                        echo "<td align='center'>" . $citaInf['horario'] . "</td>";
                                        echo "<td align='center'><a data-bs-toggle='tooltip' data-bs-placement='top' 
                                                    title='Eliminar cita' href='borrar_cita.php?id_cita=$clave'>
                                                    <img src='../img/Iconos/eliminar.png' width='30' height='30' alt='eliminar'/> </a></td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                }
                                ?>
                            </table>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/Vanilla-tilt.js"></script>
    <script type="text/javascript">
        VanillaTilt.init(document.querySelectorAll("#tarjetas"), {
            max: 5,
            speed: 400
        });
    </script>
</body>
</html>