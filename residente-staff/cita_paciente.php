<?php
    include('../staff.class.php');
    include('../config.php');
    $area = $residente->validar_area(array('Nutrición', 'Psicología'));
    $id_persona = $_GET['id_persona'];
    $id_cita = $_GET['id_cita'];
    $data = $residente->paciente_info($id_persona);
    $examen = $residente->ver_examen($id_persona);
    $sig_cita = $residente->siguiente_cita($id_persona);

    if (empty($sig_cita) || $sig_cita['id'] == $id_cita) {
        $dia = "-";
        $hora = "-";
    }else{
        $dia = $sig_cita['fecha'];
        $hora = $sig_cita['horario'];
    }

    if (isset($_POST['guardar_cita'])) {
        $dato = $_POST;
        $dato['id_persona'] = $id_persona;
        $dato['id_cita'] = $id_cita;
        $residente->agendar_siguiente_cita($dato);
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
    <title>Campus Virtual | Cita</title>
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
                            height:38px;' data-bs-toggle='modal' data-bs-target='#modalCita'>
                            <img src="../img/Iconos/citas.png" alt="cita" width="30" height="30" /> Agendar Cita
                        </button>
                        <a href='index.php'><img src='../img/Iconos/inicio.png' alt='lista' width='30' height='30' /> Regresar</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <br>
    <div class="container" id="perfil">
        <div class="row">
            <div class="col-sm-8">
                <div class="card" style="height: 20rem;" id='tarjetas'>
                    <div class="card-body">
                        <h2> <img src="../img/Iconos/listado.png" alt="info" width="50"> DATOS DEL PACIENTE</h2>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="form-group col-md-12">
                                    <label>Nombre/s</label>
                                    <input type="text" class="form-control" placeholder="Nombre/s" readonly name="nombre" value="<?php echo $data['nombre']; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Dirección</label>
                                    <input type="text" class="form-control" placeholder="Dirección" readonly name="direccion" value="<?php echo $data['descripcion']; ?>">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card" style="height: 20rem;" id='tarjetas'>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php
                                if ($area == 'Nutrición') {
                                    echo "<div class='iconApp text-center'>
                                                <a href='ver_habitos.php?id_persona=$id_persona&id_cita=$id_cita' class='thumbnail'>
                                                    <img src='../img/Iconos/habitos.png' width='60' height='60' alt='examen' width='50' height='50'></img>
                                                    <div class='caption'>
                                                        <p class='text-center'>Ver Test</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class='iconApp text-center'>
                                                <a href='expedientes.php?id_persona=$id_persona&id_cita=$id_cita' class='thumbnail'>
                                                    <img src='../img/Iconos/expediente.png' width='60' height='60' alt='expediente' width='50' height='50'></img>
                                                    <div class='caption'>
                                                        <p class='text-center'>Expedientes</p>
                                                    </div>
                                                </a>
                                            </div>
                                    ";
                                }
                                if ($area == 'Psicología') {
                                    echo "<div class='iconApp text-center'>
                                                <a href='ver_bateria.php?id_persona=$id_persona&id_cita=$id_cita' class='thumbnail'>
                                                    <img src='../img/Iconos/bateria.png' width='60' height='60' alt='examen' width='50' height='50'></img>
                                                    <div class='caption'>
                                                        <p class='text-center'>Ver Batería para Conductores</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class='iconApp text-center'>
                                                <a href='ver_norma035.php?id_persona=$id_persona&id_cita=$id_cita' class='thumbnail'>
                                                    <img src='../img/Iconos/norma.png' width='60' height='60' alt='expediente' width='50' height='50'></img>
                                                    <div class='caption'>
                                                        <p class='text-center'>Ver Norma 035</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class='iconApp text-center'>
                                                <a href='https://edpuzzle.com/classes/60abf01cdd2770416ca05ea7' target='_blank' class='thumbnail'>
                                                    <img src='../img/Iconos/actividades.png' width='60' height='60' alt='expediente' width='50' height='50'></img>
                                                    <div class='caption'>
                                                        <p class='text-center'>Ver Actividades</p>
                                                    </div>
                                                </a>
                                            </div>
                                    ";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert" role="alert" style="background-color: #af62b3;">
                    <h4 class="alert-heading">Próxima Cita</h4>
                    <hr>
                    <p>
                        <?php
                        echo "Siguiente cita el: <strong>" . $dia . "</strong> a las: <strong>" . $hora . "</strong>.";
                        ?>
                    </p>
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

    <div class="modal fade" id="modalCita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 ms-auto">
                            <?php
                            echo "
                                    <h2>SIGUIENTE CITA...</h2>
                                    <form method='POST' action='cita_paciente.php?id_cita=$id_cita&id_persona=$id_persona' enctype='multipart/form-data'>
                                        <div class='row g-3'>
                                            <div class='form-group col-md-12'>
                                                <label>Fecha</label>
                                                <input type='date' class='form-control' name='fecha'>
                                            </div>
                                            <div class='form-group col-md-12'>
                                                <label>Horario</label>
                                                <input type='time' class='form-control' placeholder='HH:MM' name='hora_inicial'>
                                            </div>
                                            <div class='form-group col-md-12'>
                                                <input type='submit' name='guardar_cita' value='Guardar'/>
                                            </div>
                                        </div>
                                    </form>
                                    ";
                            ?>
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