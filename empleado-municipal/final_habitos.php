<?php
    include('../empleado.class.php');
    include('../config.php');
    $id_persona = $_SESSION['id_persona'];
    $area = 1;
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
    <title>Test | Hábitos Alimenticios</title>
    <style>
        input[type="number"],
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

        .final {
            background-color: rgba(80, 199, 133, 0.5);
            margin: auto;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 20px 20px 22px rgba(80, 199, 133, 0.534);
            border-radius: 8px;
            font-family: "Poppins", sans-serif;
            color: black;
            border-color: #50c785;
        }

        #opciones {
            outline: none;
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
            text-decoration: none;
            justify-content: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="preguntas">
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
                    <div class="card final" data-tilt-scale="1.1">
                        <div class="row g-0">
                            <div class="col-md-4" align="center">
                                <img src="../img/meta.gif" alt="meta">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title">¡FELICIDADES!</h2>
                                    <p class="card-text" align="justify">Te damos las más grandes felicitaciones por haber terminado este test.
                                        Este es sólo un pequeño paso para finalizar tu recorrido en este campus virtual.
                                        Te esperan muchos más retos que cumplir.
                                        ¡Bien hecho!</p>
                                    <p class="card-text"><small class="text-muted"></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="row" align="center">
                <h2><img src="../img/Iconos/opciones.png" width="40" height="40" alt="opciones"> TE OFRECEMOS</h2>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="tarjeta-opciones">
                                <div class="card front-face">
                                    <img src="../img/Iconos/recomendaciones.png" alt="recomendaciones">
                                    <h2>RECOMENDACIONES</h2>
                                </div>
                                <div class="card back-face">
                                    <div class="info">
                                        <div class="title">Recomendaciones</div>
                                        <p class="card-text">
                                            Si deseas saber cómo mejorar tus hábitos alimenticios,
                                            haz click en el botón de abajo para conocer algunas recomendaciones.</p>
                                        <a href="recomendaciones.html" id="opciones">Ver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="tarjeta-opciones">
                                <div class="card front-face">
                                    <img src="../img/Iconos/citas.png" alt="recomendaciones">
                                    <h2>CITAS</h2>
                                </div>
                                <div class="card back-face">
                                    <div class="info">
                                        <div class="title">Citas</div>
                                        <p class="card-text">
                                            Si deseas un asesoramiento con nuestro personal de nutrición, haz click
                                            en el botón de abajo para agendar una cita.
                                        </p>
                                        <button type='button' class='btn btn-light btn-sm' data-bs-toggle='modal' data-bs-target='#modalCitas' style="outline: none;
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
                                            height:38px;">
                                            Agendar Cita
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="tarjeta-opciones">
                                <div class="card front-face">
                                    <img src="../img/Iconos/guia.png" alt="recomendaciones">
                                    <h2>GUÍA RÁPIDA</h2>
                                </div>
                                <div class="card back-face">
                                    <div class="info">
                                        <div class="title">Guía Rapida</div>
                                        <p class="card-text">
                                            Si deseas obtener recomendaciones de acuerdo a tu peso y altura, haz click
                                            en el botón de abajo para tener una guía rápida.
                                        </p>
                                        <button type='button' class='btn btn-light btn-sm' data-bs-toggle='modal' data-bs-target='#modalGuia' style="outline: none;
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
                                            height:38px;">
                                            Realizar Guia
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-3">
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
    </div>

    <!-- Modal Citas -->
    <div class="modal fade" id="modalCitas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <h5 class="modal-title" id="exampleModalLabel">Citas Disponibles</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 ms-auto">
                            <div class="alert alert-light border-dark alert-dismissible fade show" role="alert" id="alert">
                                <img src="../img/Iconos/ubicacion.png" alt="ubicacion" width="45" height="45">
                                <strong>Ubicación de las citas: José Maria Morelos 139, Col. Centro, 38000 Celaya, Gto.</strong>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-fill" id="dataTable" width="100%" cellspacing="0">
                                    <?php
                                    $citas = $trabajador->citasDisponibles($area);
                                    if (empty($citas)) {
                                        echo "<label>No hay citas disponibles</label>";
                                    } else {
                                        $i = 1;
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th align='center'>#</th>";
                                        echo "<th align='center'>Dia/Mes</th>";
                                        echo "<th align='center'>Horario</th>";
                                        echo "<th align='center'>Personal</th>";
                                        echo "<th align='center'>Agendar</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        foreach ($citas as $clave => $citasDisp) {
                                            echo "<tbody>";
                                            echo "<tr>";
                                            echo "<td align='center'>" . $i++ . "</td>";
                                            echo "<td align='center'>" . $citasDisp['fecha'] . "</td>";
                                            echo "<td align='center'>" . $citasDisp['horario'] . "</td>";
                                            echo "<td align='center'>" . $citasDisp['personal'] . "</td>";
                                            echo "<td align='center'><a href='agendar_cita_nutricion.php?id_cita=$clave&id_persona=$id_persona'>
                                                    <img src='../img/Iconos/agendar.png' width='40' height='40' alt='agendar'/></td>";
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
        </div>
    </div>

    <!-- Modal Guia -->
    <div class="modal fade" id="modalGuia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <h5 class="modal-title" id="exampleModalLabel"><img src='../img/Iconos/guia.png' alt='estadistica' width='50'> Guía Rápida</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 ms-auto">
                            <form method='GET' action='guia_rapida.php' enctype='multipart/form-data'>
                                <label>Introducir los datos solicitados.</label>
                                <div class='form-group'>
                                    <label>Sexo</label>
                                    <select class='form-control' name='sexo' required style="display: block;
                                        height: 50px;
                                        width: 100%;
                                        background-color: rgba(255, 255, 255, 0.671);
                                        border-radius: 3px;
                                        padding: 0 10px;
                                        margin-top: 8px;
                                        font-size: 14px;
                                        font-weight: 300;">>
                                        <option selected> Seleccionar</option>
                                        <option value="M"> Masculino</option>
                                        <option value="F"> Femenino</option>
                                    </select>
                                </div>
                                <div class='form-group'>
                                    <label>Peso</label>
                                    <input type='number' step="0.01" class='form-control' name='peso' required placeholder="Escribir en kilogramos. Ej: 70.5">
                                </div>
                                <div class='form-group'>
                                    <label>Altura</label>
                                    <input type='number' step="0.01" class='form-control' name='altura' required placeholder="Escribir en metros. Ej: 1.70">
                                </div>
                                <div class='form-group'>
                                    <input type='submit' value='Calcular'/>
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
    <script type="text/javascript">
        VanillaTilt.init(document.querySelectorAll(".final"), {
            max: 1,
            speed: 300
        });
    </script>
</body>

</html>