<?php
include('../staff.class.php');
include('../config.php');
$id_persona = $_GET['id_persona'];
$id_cita = $_GET['id_cita'];
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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://www.clubdesign.at/floatlabels.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="../img/Iconos/campus.ico">
    <title>Respuestas | Test | Norma 035</title>
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
                        <h2><img src="../img/Iconos/norma.png" alt="act" width="50">CALIFICACION POR GUÍA</h2>
                        <hr>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link" id="tomo1-tab" data-toggle="tab" href="#tomo1" role="tab" aria-controls="tomo1" aria-selected="true" style="color: black;">Guía de Referencia I</a>
                                <a class="nav-item nav-link" id="tomo2-tab" data-toggle="tab" href="#tomo2" role="tab" aria-controls="tomo2" aria-selected="false" style="color: black;">Guía de Referencia II</a>
                                <a class="nav-item nav-link" id="tomo3-tab" data-toggle="tab" href="#tomo3" role="tab" aria-controls="tomo3" aria-selected="false" style="color: black;">Guía de Referencia III</a>
                                <a class="nav-item nav-link active" id="tomo4-tab" data-toggle="tab" href="#tomo4" role="tab" aria-controls="tomo4" aria-selected="false" style="color: black;">Criterios para la toma de acciones</a>
                            </div>
                        </nav>
                        <br>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade" id="tomo1" role="tabpanel" aria-labelledby="tomo1-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-fill" id="dataTable" width="100%" cellspacing="0">
                                                        <?php
                                                        $resultados = $residente->ver_norma1_I($id_persona);
                                                        echo "<thead>";
                                                        echo "<tr>";
                                                        echo "<th>Sección / Pregunta</th>";
                                                        echo "<th>Respuesta</th>";
                                                        echo "</tr>";
                                                        echo "</thead>";
                                                        foreach ($resultados as $clave => $res) {
                                                            echo "<tbody";
                                                            echo "<tr>";
                                                            echo "<th align='center'>1.- ¿Ha presenciado o sufrido alguna vez, durante o con motivo del trabajo un acontecimiento
                                                    como los siguientes:
                                                    <ul>
                                                        <li>Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave?</li>
                                                        <li>Asaltos?</li>
                                                        <li>Actos violentos que derivaron en lesiones graves?</li>
                                                        <li>Secuestro?</li>
                                                        <li>Amenazas?, o</li>
                                                        <li>Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas?</li>
                                                    </ul></th>";
                                                            echo "<td align='center'>" . $res['p1_1'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr align ='center'>";
                                                            echo "<th COLSPAN=2 ><font color ='#7E108F'>II.- Recuerdos persistentes sobre el acontecimiento (durante el último mes):</font></th>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>2.- ¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan malestares?</th>";
                                                            echo "<td align='center'>" . $res['p1_2'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>3.- ¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar?</th>";
                                                            echo "<td align='center'>" . $res['p1_3'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr align ='center'>";
                                                            echo "<th COLSPAN=2><font color ='#7E108F'>III. Esfuerzo por evitar circunstancias parecidas o asociadas al acontecimiento (durante el último mes):</font></th>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>4.- ¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento?</th>";
                                                            echo "<td align='center'>" . $res['p1_4'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>5.- ¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento?</th>";
                                                            echo "<td align='center'>" . $res['p1_5'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>6.- ¿Ha tenido dificultad para recordar alguna parte importante del evento?</th>";
                                                            echo "<td align='center'>" . $res['p1_6'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>7.- ¿Ha disminuido su interés en sus actividades cotidianas?</th>";
                                                            echo "<td align='center'>" . $res['p1_7'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>8.- ¿Se ha sentido usted alejado o distante de los demás?</th>";
                                                            echo "<td align='center'>" . $res['p1_8'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>9.- ¿Ha notado que tiene dificultad para expresar sus sentimientos?</th>";
                                                            echo "<td align='center'>" . $res['p1_9'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>10.- ¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado?</th>";
                                                            echo "<td align='center'>" . $res['p1_10'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr align ='center'>";
                                                            echo "<th COLSPAN=2><font color ='#7E108F'>IV. Afectación (durante el último mes): </font></th>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>11.- ¿Ha tenido usted dificultades para dormir?</th>";
                                                            echo "<td align='center'>" . $res['p1_11'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>12.- ¿Ha estado particularmente irritable o le han dado arranques de coraje?</th>";
                                                            echo "<td align='center'>" . $res['p1_12'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>13.- ¿Ha tenido dificultad para concentrarse?</th>";
                                                            echo "<td align='center'>" . $res['p1_13'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>14.- ¿Ha estado nervioso o constantemente en alerta?</th>";
                                                            echo "<td align='center'>" . $res['p1_14'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>15.- ¿Se ha sobresaltado fácilmente por cualquier cosa?</th>";
                                                            echo "<td align='center'>" . $res['p1_15'] . "</td>";
                                                            echo "</tr>";
                                                        }
                                                        echo "</tbody>";
                                                        ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tomo2" role="tabpanel" aria-labelledby="tomo2-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-fill" id="dataTable" width="100%" cellspacing="0">
                                                        <?php
                                                        $resultados = $residente->ver_norma2_II($id_persona);
                                                        echo "<thead>";
                                                        echo "<tr>";
                                                        echo "<th>Criterio</th>";
                                                        echo "<th>Resultado</th>";
                                                        echo "</tr>";
                                                        echo "</thead>";
                                                        foreach ($resultados as $clave => $res) {
                                                            echo "<tbody>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Calificación Final</th>";
                                                            echo "<td align='center'>" . $res['calif_final'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr align ='center'>";
                                                            echo "<th COLSPAN=2 ><font color ='#7E108F'>Calificación por Categoría</font></th>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Ambiente de trabajo</th>";
                                                            echo "<td align='center'>" . $res['categoria_ambiente'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Factores propios de la actividad</th>";
                                                            echo "<td align='center'>" . $res['categoria_factores'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Organización del tiempo de trabajo</th>";
                                                            echo "<td align='center'>" . $res['categoria_tiempo'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<tr align ='center'>";
                                                            echo "<th COLSPAN=2><font color ='#7E108F'>Calificación por Dominio</font></th>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Condiciones en el ambiente de trabajo</th>";
                                                            echo "<td align='center'>" . $res['dominio_ambiente'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Carga de trabajo</th>";
                                                            echo "<td align='center'>" . $res['dominio_trabajo'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Falta de control sobre el trabajo</th>";
                                                            echo "<td align='center'>" . $res['dominio_falta'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Jornada de trabajo</th>";
                                                            echo "<td align='center'>" . $res['dominio_jornada'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Interferencia en la relación trabajo-familia</th>";
                                                            echo "<td align='center'>" . $res['dominio_interferencia'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Liderazgo</th>";
                                                            echo "<td align='center'>" . $res['dominio_liderazgo'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Relaciones en el trabajo</th>";
                                                            echo "<td align='center'>" . $res['dominio_relaciones'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Violencia</th>";
                                                            echo "<td align='center'>" . $res['dominio_violencia'] . "</td>";
                                                            echo "</tr>";
                                                        }
                                                        echo "</tbody>";
                                                        ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tomo3" role="tabpanel" aria-labelledby="tomo3-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-fill" id="dataTable" width="100%" cellspacing="0">
                                                        <?php
                                                        $resultados = $residente->ver_norma3_III($id_persona);
                                                        echo "<thead>";
                                                        echo "<tr>";
                                                        echo "<th>Criterio</th>";
                                                        echo "<th>Resultado</th>";
                                                        echo "</tr>";
                                                        echo "</thead>";
                                                        foreach ($resultados as $clave => $res) {
                                                            echo "<tbody'>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Calificación Final</th>";
                                                            echo "<td align='center'>" . $res['calif_final'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr align ='center'>";
                                                            echo "<th COLSPAN=2 ><font color ='#7E108F'>Calificación por Categoría</font></th>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Ambiente de trabajo</th>";
                                                            echo "<td align='center'>" . $res['categoria_ambiente'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Factores propios de la actividad</th>";
                                                            echo "<td align='center'>" . $res['categoria_factores'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Organización del tiempo de trabajo</th>";
                                                            echo "<td align='center'>" . $res['categoria_tiempo'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Liderazgo y relaciones en el trabajo</th>";
                                                            echo "<td align='center'>" . $res['categoria_liderazgo'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Entorno organizacional</th>";
                                                            echo "<td align='center'>" . $res['categoria_organizacional'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr align ='center'>";
                                                            echo "<th COLSPAN=2><font color ='#7E108F'>Calificación por Dominio</font></th>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Condiciones en el ambiente de trabajo</th>";
                                                            echo "<td align='center'>" . $res['dominio_ambiente'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Carga de trabajo</th>";
                                                            echo "<td align='center'>" . $res['dominio_trabajo'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Falta de control sobre el trabajo</th>";
                                                            echo "<td align='center'>" . $res['dominio_falta'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Jornada de trabajo</th>";
                                                            echo "<td align='center'>" . $res['dominio_jornada'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Interferencia en la relación trabajo-familia</th>";
                                                            echo "<td align='center'>" . $res['dominio_interferencia'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Liderazgo</th>";
                                                            echo "<td align='center'>" . $res['dominio_liderazgo'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Relaciones en el trabajo</th>";
                                                            echo "<td align='center'>" . $res['dominio_relaciones'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Violencia</th>";
                                                            echo "<td align='center'>" . $res['dominio_violencia'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Reconocimiento del desempeño</th>";
                                                            echo "<td align='center'>" . $res['dominio_desempeno'] . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<th align='center'>Insuficiente sentido de pertenencia e, inestabilidad</th>";
                                                            echo "<td align='center'>" . $res['dominio_pertenencia'] . "</td>";
                                                            echo "</tr>";
                                                        }
                                                        echo "</tbody>";
                                                        ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="tomo4" role="tabpanel" aria-labelledby="tomo4-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive" id="norma3calif">
                                                    <table class="table table-bordered table-fill" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th width="25%">Nivel de Riesgo</th>
                                                                <th>Necesidad de Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th align='center' style="background-color: #fc0404;">Muy Alto</th>
                                                                <td align='justify'>
                                                                    Se requiere realizar el análisis de cada categoría y dominio
                                                                    para establecer las acciones de intervención apropiadas, mediante un programa
                                                                    de intervención que deberá incluir evaluaciones específicas, y contemplar
                                                                    campañas de sensibilización, revisar la política de prevención de riesgos
                                                                    psicosociales y programas para la prevención de los factores de riesgo psicosocial,
                                                                    la promoción de un entorno organizacional favorable y la prevención de la violencia
                                                                    laboral, así como reforzar su aplicación y difusión.
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align='center' style="background-color: #ffc404;">Alto</th>
                                                                <td align='justify'>
                                                                    Se requiere realizar un análisis de cada categoría y dominio, de manera
                                                                    que se puedan determinar las acciones de intervención apropiadas a través de un programa de
                                                                    intervención, que podrá incluir una evaluación específica y deberá incluir una campaña de
                                                                    sensibilización, revisar la política de prevención de riesgos psicosociales y programas para
                                                                    la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional
                                                                    favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align='center' style="background-color: #fffc04;">Medio</th>
                                                                <td align='justify'>
                                                                    Se requiere revisar la política de prevención de riesgos psicosociales y programas para
                                                                    la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional
                                                                    favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión,
                                                                    mediante un programa de intervención.
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align='center' style="background-color: #70f46c;">Bajo</th>
                                                                <td align='justify'>
                                                                    Es necesario una mayor difusión de la política de prevención de riesgos psicosociales y
                                                                    programas para: la prevención de los factores de riesgo psicosocial, la promoción de un
                                                                    entorno organizacional favorable y la prevención de la violencia laboral.
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align='center' style="background-color: #a0e4f4;">Nulo</th>
                                                                <td align='justify'>
                                                                    El riesgo resulta despreciable por lo que no se requiere medidas adicionales.
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/Vanilla-tilt.js"></script>
</body>

</html>