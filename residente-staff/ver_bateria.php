<?php
    include('../staff.class.php');
    include('../config.php');
    $id_persona = $_GET['id_persona'];
    $id_cita = $_GET['id_cita'];
    $calif1 = $residente->ver_bloque1($id_persona);
    $calif2 = $residente->ver_bloque2($id_persona);
    $calif3 = $residente->ver_bloque3($id_persona);
    $calif4 = $residente->ver_bloque4($id_persona);
    if(isset($_POST['documento'])){
        $residente->documento($id_persona);
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
    <title>Respuestas | Test | Bateria para Conductores</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar">
                    <div class="logo"><a href="#"><img src="../img/logo.png" alt="logo" width="45" height="45" /></a></div>
                    <div class="buttons">
                        <?php
                            echo "<a href='cita_paciente.php?id_cita=$id_cita&id_persona=$id_persona'><img src='../img/Iconos/inicio.png' alt='lista' width='30' height='30' /> Regresar</a>";
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <br>
    <div class="container" id="perfil">
        <div class="row">
            <div class="col-sm-12">
                <div class="card" id="tarjetas" data-tilt-glare data-tilt-max-glare="0.5">
                    <div class="card-body">
                        <h2> <img src="../img/Iconos/actividades.png" alt="act" width="50"> CALIFICACIÓN POR BLOQUE</h2>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-fill" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th COLSPAN=2>Resultados</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <tr>
                                        <th align='center'>Bloque 1</th>
                                        <td align='center'><?php if(empty($calif1['calificacion'])){echo "Sin realizar";} else{  echo $calif1['calificacion'];} ?></td>
                                    </tr>
                                    <tr>
                                        <th align='center'>Bloque 2</th>
                                        <td align='center'><?php if(empty($calif2['calificacion'])){echo "Sin realizar";} else{ echo $calif2['calificacion'];} ?></td>
                                    </tr>
                                    <tr>
                                        <th align='center'>Bloque 3</th>
                                        <td align='center'><?php if(empty($calif3['calificacion'])){echo "Sin realizar";} else{ echo $calif3['calificacion'];}?></td>
                                    </tr>
                                    <tr>
                                        <th align='center'>Bloque 4</th>
                                        <td align='center'><?php if(empty($calif4['calificacion'])){echo "Sin realizar";} else{ echo $calif4['calificacion'];}?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                                echo "<form method='POST' action='ver_bateria.php?id_persona=$id_persona&id_cita=$id_cita'>
                                            <input type='submit' name='documento' value='Imprimir' target='_blank'/>
                                        </form>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-2">
            <div class="col-sm-12">
                <div class="card" id="tarjetas" data-tilt-glare data-tilt-max-glare="0.5">
                    <div class="card-body">
                        <h2><img src="../img/Iconos/criterio.png" alt="act" width="50"> CRITERIOS</h2>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-fill" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Resultado</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align='center'>S</td>
                                        <td align='justify'>
                                            <ul>
                                                <li>Conducen bajo una percepción y aceptación del riesgo adecuada.</li>
                                                <li>Realizan una conducción precavida, atenta y responsable.</li>
                                                <li>Conducen con un alto nivel de seguridad.</li>
                                                <li>Controlan adecuadamente su conducta.</li>
                                            </ul>
                                        </td>
                                    </tr>
                                   <tr>
                                        <td align='center'>N</td>
                                        <td align='justify'>
                                            <ul>
                                                <li>Presentan una deficiente percepción del riesgo.</li>
                                                <li>Son incapaces de reaccionar adecuadamente al "estrés" emocional.</li>
                                                <li>Manifiestan impulsividad, impaciencia, agresividad y tendencias antisociales.</li>
                                                <li>Poseen escaso control personal.</li>
                                                <li>Muestran conductas de falta de respeto a los demás usuarios y a las normas de tráfico.</li>
                                                <li>Tienden a exteriorizar sus respuestas a la frustración de forma excesiva y poco adecuada.</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='center'>I</td>
                                        <td align='justify'>Abarcaría a los sujetos que se situan en zonas intermedias de las distribuciones muestrales
                                            y que resultaría difícil definir comportamentalmente.</td>
                                    </tr>
                                </tbody>
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
</body>
</html>