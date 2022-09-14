<?php
    include('../empleado.class.php');
    include('../config.php');
    $persona = $_SESSION['id_persona'];
    if (isset($_POST['guardar_tomo_1'])) {
        $data = $_POST;
        $data['id_persona'] = $persona;
        $trabajador->norma035_I($data);
    }

    if (isset($_POST['guardar_tomo_2'])) {
        $data = $_POST;
        $data['id_persona'] = $persona;
        if($data['p2_A'] == "No"){
            $data['p2_41'] = 0;
            $data['p2_42'] = 0;
            $data['p2_43'] = 0;
        }
        if($data['p2_B'] == "No"){
            $data['p2_44'] = 0;
            $data['p2_45'] = 0;
            $data['p2_46'] = 0;
        }
        $trabajador->norma035_II($data);
        $trabajador->calificar_norma035_II();
    }

    if (isset($_POST['guardar_tomo_3'])) {
        $data = $_POST;
        $data['id_persona'] = $persona;
        if($data['p3_A'] == "No"){
            $data['p3_65'] = 0;
            $data['p3_66'] = 0;
            $data['p3_67'] = 0;
            $data['p3_68'] = 0;
        }
        if($data['p3_B'] == "No"){
            $data['p3_69'] = 0;
            $data['p3_70'] = 0;
            $data['p3_71'] = 0;
            $data['p3_72'] = 0;
        }
        $trabajador->norma035_III($data);
        $trabajador->calificar_norma035_III($data);
    }
?>
<!DOCTYPE html>
<html lang="en">

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
    <script type="text/javascript" src="http://www.clubdesign.at/floatlabels.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="../img/Iconos/campus.ico">
    <title>Norma035</title>
    <style>
        body{
            background-image: url("../img/Fondo 2.png");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
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
                            <h2><img src='../img/Iconos/norma.png' alt='norma' width='50'> NORMA 035</h2>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="tomo1-tab" data-toggle="tab" href="#tomo1" role="tab" aria-controls="tomo1" aria-selected="true" style="text-decoration: none; color: black;">Guia de Referencia I</a>
                                    <a class="nav-item nav-link" id="tomo2-tab" data-toggle="tab" href="#tomo2" role="tab" aria-controls="tomo2" aria-selected="false" style="text-decoration: none; color: black;">Guia de Referencia II</a>
                                    <a class="nav-item nav-link" id="tomo3-tab" data-toggle="tab" href="#tomo3" role="tab" aria-controls="tomo3" aria-selected="false" style="text-decoration: none; color: black;">Guia de Referencia III</a>
                                </div>
                            </nav>
                            <br>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="tomo1" role="tabpanel" aria-labelledby="tomo1-tab">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h2>INDICACIONES</h2>
                                                    <div class="align-items-center center-content-between mb-4">
                                                        <p style="text-align: center;">
                                                            <strong>CUESTIONARIO PARA IDENTIFICAR A LOS TRABAJADORES QUE FUERON SUJETOS A ACONTECIMIENTOS
                                                                TRAUMÁTICOS SEVEROS </strong>
                                                        </p>
                                                    </div>
                                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                        <p style="text-align: justify;">
                                                            Seleccione a la respuesta que se le indica
                                                        </p>
                                                    </div>
                                                    <hr class="my-2">
                                                    <br>
                                                    <form method="POST" action="test_norma035.php" enctype="multipart/form-data">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sección / Pregunta</th>
                                                                        <th>Si</th>
                                                                        <th>No</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>I. Acontecimiento traumático severo </strong></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>1.- ¿Ha presenciado o sufrido alguna vez, durante o con motivo del trabajo un acontecimiento
                                                                            como los siguientes:
                                                                            <ul>
                                                                                <li>Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave?</li>
                                                                                <li>Asaltos?</li>
                                                                                <li>Actos violentos que derivaron en lesiones graves?</li>
                                                                                <li>Secuestro?</li>
                                                                                <li>Amenazas?, o</li>
                                                                                <li>Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas?</li>
                                                                            </ul>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input trauma" type="radio" name="p1_1" value="Si" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input trauma" type="radio" name="p1_1" value="No">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table class="table table-bordered" id="traumas" style="display:none;">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Seccion / Pregunta</th>
                                                                        <th>Si</th>
                                                                        <th>No</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>II. Recuerdos persistentes sobre el acontecimiento (durante el último mes): </strong></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2.- ¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan malestares?</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_2" value="Si" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_2" value="No">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3.- ¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar?</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_3" value="Si" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_3" value="No">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>III. Esfuerzo por evitar circunstancias parecidas o asociadas al acontecimiento (durante el último mes): </strong></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>4.- ¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento?</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_4" value="Si" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_4" value="No">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>5.- ¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento?</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_5" value="Si" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_5" value="No">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>6.- ¿Ha tenido dificultad para recordar alguna parte importante del evento?</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_6" value="Si" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_6" value="No">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>7.- ¿Ha disminuido su interés en sus actividades cotidianas?</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_7" value="Si" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_7" value="No">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>8.- ¿Se ha sentido usted alejado o distante de los demás?</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_8" value="Si" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_8" value="No">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>9.- ¿Ha notado que tiene dificultad para expresar sus sentimientos?</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_9" value="Si" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_9" value="No">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>10.- ¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado?</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_10" value="Si" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_10" value="No">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>IV. Afectación (durante el último mes): </strong></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>11.- ¿Ha tenido usted dificultades para dormir?</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_11" value="Si">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_11" value="No">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>12.- ¿Ha estado particularmente irritable o le han dado arranques de coraje?</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_12" value="Si" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_12" value="No">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>13.- ¿Ha tenido dificultad para concentrarse?</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_13" value="Si" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_13" value="No">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>14.- ¿Ha estado nervioso o constantemente en alerta?</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_14" value="Si">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_14" value="No">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>15.- ¿Se ha sobresaltado fácilmente por cualquier cosa?</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_15" value="Si">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p1_15" value="No">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <input type="submit" name="guardar_tomo_1" value="Finalizar" />
                                                    </form>
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
                                                    <h2>INDICACIONES</h2>
                                                    <div class="align-items-center center-content-between mb-4">
                                                        <p style="text-align: center;">
                                                            <strong>CUESTIONARIO PARA IDENTIFICAR LOS FACTORES DE RIESGO PSICOSOCIAL EN LOS CENTROS DE TRABAJO </strong>
                                                        </p>
                                                    </div>
                                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                        <p style="text-align: justify;">
                                                            Para responder las preguntas siguientes considere las condiciones de su centro de trabajo,
                                                            así como la cantidad y ritmo de trabajo.
                                                        </p>
                                                    </div>
                                                    <hr class="my-2">
                                                    <form method="POST" action="test_norma035.php">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces</th>
                                                                        <th>Casi nunca</th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1
                                                                        </td>
                                                                        <td>Mi trabajo me exige hacer mucho esfuerzo físico</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_1" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_1" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_1" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_1" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_1" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Me preocupa sufrir un accidente en mi trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_2" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_2" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_2" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_2" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_2" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Considero que las actividades que realizo son peligrosas</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_3" value="4"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_3" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_3" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_3" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_3" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>4</td>
                                                                        <td>Por la cantidad de trabajo que tengo debo quedarme tiempo adicional a mi turno</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_4" value="4"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_4" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_4" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_4" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_4" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>5</td>
                                                                        <td>Por la cantidad de trabajo que tengo debo trabajar sin parar </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_5" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_5" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_5" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_5" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_5" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>6</td>
                                                                        <td>Considero que es necesario mantener un ritmo de trabajo acelerado</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_6" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_6" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_6" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_6" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_6" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>7</td>
                                                                        <td>Mi trabajo que esté muy concentrado exige </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_7" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_7" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_7" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_7" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_7" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>8</td>
                                                                        <td>Mi trabajo requiere que memorice mucha información</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_8" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_8" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_8" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_8" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_8" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>9</td>
                                                                        <td>Mi trabajo exige que atienda varios asuntos al mismo tiempo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_9" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_9" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_9" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_9" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_9" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="my-2">
                                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                                <p style="text-align: justify;">
                                                                    Las preguntas siguientes están relacionadas con las actividades que realiza en su trabajo y las responsabilidades que tiene.
                                                                </p>
                                                            </div>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces </th>
                                                                        <th>Casi nunca </th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>10
                                                                        </td>
                                                                        <td>En mi trabajo soy responsable de cosas de mucho valor</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_10" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_10" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_10" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_10" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_10" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>11</td>
                                                                        <td>Respondo ante mi jefe por los resultados de toda mi área de trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_11" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_11" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_11" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_11" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_11" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>12</td>
                                                                        <td>En mi trabajo me dan órdenes contradictorias</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_12" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_12" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_12" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_12" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_12" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>13</td>
                                                                        <td>Considero que en mi trabajo me piden hacer cosas innecesarias</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_13" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_13" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_13" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_13" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_13" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="my-2">
                                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                                <p style="text-align: justify;">
                                                                    Las preguntas siguientes están relacionadas con el tiempo destinado a su trabajo y sus responsabilidades familiares.
                                                                </p>
                                                            </div>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces </th>
                                                                        <th>Casi nunca </th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>14
                                                                        </td>
                                                                        <td>Trabajo horas extras más de tres veces a la semana</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_14" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_14" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_14" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_14" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_14" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>15</td>
                                                                        <td>Mi trabajo me exige laborar en días de descanso, festivos o fines de semana</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_15" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_15" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_15" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_15" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_15" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>16</td>
                                                                        <td>Considero que el tiempo en el trabajo es mucho y perjudica mis actividades familiares o personales</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_16" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_16" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_16" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_16" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_16" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>17</td>
                                                                        <td>Pienso en las actividades familiares o personales cuando estoy en mi trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_17" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_17" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_17" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_17" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_17" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="my-2">
                                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                                <p style="text-align: justify;">
                                                                    Las preguntas siguientes están relacionadas con las decisiones que puede tomar en su trabajo.
                                                                </p>
                                                            </div>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces </th>
                                                                        <th>Casi nunca </th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>18
                                                                        </td>
                                                                        <td>Mi trabajo permite que desarrolle nuevas habilidades </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_18" value="0" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_18" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_18" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_18" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_18" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>19</td>
                                                                        <td>En mi trabajo puedo aspirar a un mejor puesto</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_19" value="0" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_19" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_19" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_19" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_19" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>20</td>
                                                                        <td>Durante mi jornada de trabajo puedo tomar pausas cuando las necesito</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_20" value="0" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_20" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_20" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_20" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_20" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>21</td>
                                                                        <td>Puedo decidir la velocidad a la que realizo mis actividades en mi trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_21" value="0" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_21" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_21" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_21" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_21" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>22</td>
                                                                        <td>Puedo cambiar el orden de las actividades que realizo en mi trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_22" value="0" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_22" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_22" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_22" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_22" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="my-2">
                                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                                <p style="text-align: justify;">
                                                                    Las preguntas siguientes están relacionadas con la capacitación e información que recibe sobre su trabajo
                                                                </p>
                                                            </div>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces </th>
                                                                        <th>Casi nunca </th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>23
                                                                        </td>
                                                                        <td>Me informan con claridad cuáles son mis funciones </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_23" value="0" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_23" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_23" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_23" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_23" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>24</td>
                                                                        <td>Me explican claramente los resultados que debo obtener en mi trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_24" value="0" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_24" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_24" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_24" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_24" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>25</td>
                                                                        <td>Me informan con quién puedo resolver problemas o asuntos de trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_25" value="0" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_25" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_25" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_25" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_25" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>26</td>
                                                                        <td>Me permiten asistir a capacitaciones relacionadas con mi trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_26" value="0" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_26" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_26" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_26" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_26" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>27</td>
                                                                        <td>Recibo capacitación útil para hacer mi trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_27" value="0" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_27" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_27" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_27" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_27" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="my-2">
                                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                                <p style="text-align: justify;">
                                                                    Las preguntas siguientes se refieren a las relaciones con sus compañeros de trabajo y su jefe.
                                                                </p>
                                                            </div>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces</th>
                                                                        <th>Casi nunca</th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>28
                                                                        </td>
                                                                        <td>Mi jefe tiene en cuenta mis puntos de vista y opiniones </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_28" value="0" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_28" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_28" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_28" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_28" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>29</td>
                                                                        <td>Mi jefe ayuda a solucionar los problemas que se presentan en el trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_29" value="0" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_29" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_29" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_29" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_29" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>30</td>
                                                                        <td>Puedo confiar en mis compañeros de trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_30" value="0" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_30" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_30" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_30" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_30" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>31</td>
                                                                        <td>Cuando tenemos que realizar trabajo de equipo los compañeros colaboran</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_31" value="0" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_31" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_31" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_31" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_31" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>32</td>
                                                                        <td>Mis compañeros de trabajo me ayudan cuando tengo dificultades</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_32" value="0" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_32" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_32" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_32" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_32" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>33
                                                                        </td>
                                                                        <td>En mi trabajo puedo expresarme libremente sin interrupciones </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_33" value="0" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_33" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_33" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_33" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_33" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>34</td>
                                                                        <td>Recibo críticas constantes a mi persona y/o trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_34" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_34" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_34" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_34" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_34" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>35</td>
                                                                        <td>Recibo burlas, calumnias, difamaciones, humillaciones o ridiculizaciones</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_35" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_35" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_35" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_35" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_35" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>36</td>
                                                                        <td>Se ignora mi presencia o se me excluye de las reuniones de trabajo y en la toma de decisiones</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_36" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_36" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_36" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_36" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_36" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>37</td>
                                                                        <td>Se manipulan las situaciones de trabajo para hacerme parecer un mal trabajador</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_37" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_37" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_37" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_37" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_37" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>38</td>
                                                                        <td>Se ignoran mis éxitos laborales y se atribuyen a otros trabajadores</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_38" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_38" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_38" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_38" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_38" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>39</td>
                                                                        <td>Me bloquean o impiden las oportunidades que tengo para obtener ascenso o mejora en mi trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_39" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_39" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_39" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_39" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_39" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>40</td>
                                                                        <td>He presenciado actos de violencia en mi centro de trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_40" value="4" required >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_40" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_40" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_40" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_40" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="my-2">
                                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                                <p style="text-align: justify;">
                                                                    Las preguntas siguientes están relacionadas con la atención a clientes y usuarios.
                                                                </p>
                                                            </div>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>Si</th>
                                                                        <th>No</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            En mi trabajo debo brindar servicio a clientes o usuarios:
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input cliente" type="radio" name="p2_A" value="Si" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input cliente" type="radio" name="p2_A" value="No">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <br>
                                                            <table class="table table-bordered" width="100%" cellspacing="0" id="clientes" style="display:none;">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces</th>
                                                                        <th>Casi nunca</th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>41
                                                                        </td>
                                                                        <td>Atiendo clientes o usuarios muy enojados </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_41" value="4">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_41" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_41" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_41" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_41" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>42</td>
                                                                        <td>Mi trabajo me exige atender personas muy necesitadas de ayuda o enfermas</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_42" value="4">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_42" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_42" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_42" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_42" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>43</td>
                                                                        <td>Para hacer mi trabajo debo demostrar sentimientos distintos a los míos</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_43" value="4">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_43" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_43" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_43" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_43" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <br>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>Si</th>
                                                                        <th>No</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            Soy jefe de trabajadores:
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input jefe" type="radio" name="p2_B" value="Si" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input jefe" type="radio" name="p2_B" value="No">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <br>
                                                            <table class="table table-bordered" width="150%" cellspacing="0" id="jefes" style="display:none;">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces </th>
                                                                        <th>Casi nunca </th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>44
                                                                        </td>
                                                                        <td>Comunican tarde los asuntos de trabajo </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_44" value="4">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_44" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_44" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_44" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_44" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>45</td>
                                                                        <td>Dificultan el logro de los resultados del trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_45" value="4">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_45" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_45" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_45" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_45" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>46</td>
                                                                        <td>Ignoran las sugerencias para mejorar su trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_46" value="4">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_46" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_46" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_46" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p2_46" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <input type="submit" name="guardar_tomo_2" value="Finalizar" />
                                                    </form>
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
                                                    <h2>INDICACIONES</h2>
                                                    <div class="align-items-center center-content-between mb-4">
                                                        <p style="text-align: center;">
                                                            <strong>CUESTIONARIO PARA IDENTIFICAR LOS FACTORES DE RIESGO PSICOSOCIAL Y EVALUAR EL ENTORNO ORGANIZACIONAL EN LOS CENTROS DE TRABAJO </strong>
                                                        </p>
                                                    </div>
                                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                        <p style="text-align: justify;">
                                                            Para responder las preguntas siguientes considere las condiciones ambientales de su centro de trabajo.
                                                        </p>
                                                    </div>
                                                    <hr class="my-2">
                                                    <br>
                                                    <form method="POST" action="test_norma035.php" enctype="multipart/form-data">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces</th>
                                                                        <th>Casi nunca</th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1
                                                                        </td>
                                                                        <td>El espacio donde trabajo me permite realizar mis actividades de manera segura e higiénica</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_1" value="0" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_1" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_1" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_1" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_1" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Mi trabajo me exige hacer mucho esfuerzo físico</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_2" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_2" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_2" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_2" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_2" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Me preocupa sufrir un accidente en mi trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_3" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_3" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_3" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_3" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_3" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>4</td>
                                                                        <td>Considero que en mi trabajo se aplican las normas de seguridad y salud en el trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_4" value="0" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_4" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_4" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_4" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_4" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>5</td>
                                                                        <td>Considero que las actividades que realizo son peligrosas </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_5" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_5" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_5" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_5" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_5" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="my-2">
                                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                                <p style="text-align: justify;">
                                                                    Para responder a las preguntas siguientes piense en la cantidad y ritmo de trabajo que tiene.
                                                                </p>
                                                            </div>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces</th>
                                                                        <th>Casi nunca</th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>6
                                                                        </td>
                                                                        <td>Por la cantidad de trabajo que tengo debo quedarme tiempo adicional a mi turno</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_6" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_6" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_6" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_6" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_6" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>7</td>
                                                                        <td>Por la cantidad de trabajo que tengo debo trabajar sin parar</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_7" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_7" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_7" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_7" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_7" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>8</td>
                                                                        <td>Considero que es necesario mantener un ritmo de trabajo acelerado</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_8" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_8" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_8" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_8" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_8" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                            <hr class="my-2">
                                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                                <p style="text-align: justify;">
                                                                    Las preguntas siguientes están relacionadas con el esfuerzo mental que le exige su trabajo.
                                                                </p>
                                                            </div>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces</th>
                                                                        <th>Casi nunca</th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>9
                                                                        </td>
                                                                        <td>Mi trabajo exige que esté muy concentrado</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_9" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_9" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_9" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_9" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_9" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>10</td>
                                                                        <td>Mi trabajo requiere que memorice mucha información</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_10" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_10" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_10" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_10" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_10" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>11</td>
                                                                        <td>En mi trabajo tengo que tomar decisiones difíciles muy rápido</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_11" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_11" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_11" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_11" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_11" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>12</td>
                                                                        <td>Mi trabajo exige que atienda varios asuntos al mismo tiempo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_12" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_12" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_12" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_12" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_12" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="my-2">
                                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                                <p style="text-align: justify;">
                                                                    Las preguntas siguientes están relacionadas con las actividades que realiza en su trabajo y las responsabilidades que tiene.
                                                                </p>
                                                            </div>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces</th>
                                                                        <th>Casi nunca</th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>13
                                                                        </td>
                                                                        <td>En mi trabajo soy responsable de cosas de mucho valor </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_13" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_13" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_13" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_13" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_13" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>14</td>
                                                                        <td>Respondo ante mi jefe por los resultados de toda mi área de trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_14" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_14" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_14" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_14" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_14" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>15</td>
                                                                        <td>En el trabajo me dan órdenes contradictorias</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_15" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_15" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_15" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_15" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_15" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>16</td>
                                                                        <td>Considero que en mi trabajo me piden hacer cosas innecesarias</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_16" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_16" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_16" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_16" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_16" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="my-2">
                                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                                <p style="text-align: justify;">
                                                                    Las preguntas siguientes están relacionadas con su jornada de trabajo.
                                                                </p>
                                                            </div>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces</th>
                                                                        <th>Casi nunca</th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>17
                                                                        </td>
                                                                        <td>Trabajo horas extras más de tres veces a la semana </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_17" value="4" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_17" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_17" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_17" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_17" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>18</td>
                                                                        <td>Mi trabajo me exige laborar en días de descanso, festivos o fines de semana</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_18" value="4"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_18" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_18" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_18" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_18" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>19</td>
                                                                        <td>Considero que el tiempo en el trabajo es mucho y perjudica mis actividades familiares o personales</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_19" value="4"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_19" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_19" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_19" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_19" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>20</td>
                                                                        <td>Debo atender asuntos de trabajo cuando estoy en casa</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_20" value="4"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_20" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_20" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_20" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_20" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>21</td>
                                                                        <td>Pienso en las actividades familiares o personales cuando estoy en mi trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_21" value="4"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_21" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_21" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_21" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_21" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>22</td>
                                                                        <td>Pienso que mis responsabilidades familiares afectan mi trabajo </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_22" value="4"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_22" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_22" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_22" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_22" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="my-2">
                                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                                <p style="text-align: justify;">
                                                                    Las preguntas siguientes están relacionadas con las decisiones que puede tomar en su trabajo.
                                                                </p>
                                                            </div>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces</th>
                                                                        <th>Casi nunca</th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>23
                                                                        </td>
                                                                        <td>Mi trabajo permite que desarrolle nuevas habilidades </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_23" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_23" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_23" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_23" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_23" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>24</td>
                                                                        <td>En mi trabajo puedo aspirar a un mejor puesto</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_24" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_24" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_24" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_24" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_24" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>25</td>
                                                                        <td>Durante mi jornada de trabajo puedo tomar pausas cuando las necesito</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_25" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_25" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_25" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_25" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_25" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>26</td>
                                                                        <td>Puedo decidir cuánto trabajo realizo durante la jornada laboral</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_26" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_26" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_26" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_26" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_26" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>27</td>
                                                                        <td>Puedo decidir la velocidad a la que realizo mis actividades en mi trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_27" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_27" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_27" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_27" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_27" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>28
                                                                        </td>
                                                                        <td>Puedo cambiar el orden de las actividades que realizo en mi trabajo </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_28" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_28" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_28" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_28" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_28" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="my-2">
                                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                                <p style="text-align: justify;">
                                                                    Las preguntas siguientes están relacionadas con cualquier tipo de cambio que ocurra en su trabajo (considere los últimos cambios realizados).
                                                                </p>
                                                            </div>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces</th>
                                                                        <th>Casi nunca</th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>29
                                                                        </td>
                                                                        <td>Los cambios que se presentan en mi trabajo dificultan mi labor </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_29" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_29" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_29" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_29" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_29" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>30</td>
                                                                        <td>Cuando se presentan cambios en mi trabajo se tienen en cuenta mis ideas o aportaciones</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_30" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_30" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_30" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_30" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_30" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="my-2">
                                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                                <p style="text-align: justify;">
                                                                    Las preguntas siguientes están relacionadas con la capacitación e información que se le proporciona sobre su trabajo.
                                                                </p>
                                                            </div>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces</th>
                                                                        <th>Casi nunca</th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>31
                                                                        </td>
                                                                        <td>Me informan con claridad cuáles son mis funciones </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_31" alue="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_31" alue="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_31" alue="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_31" alue="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_31" alue="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>32</td>
                                                                        <td>Me explican claramente los resultados que debo obtener en mi trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_32" alue="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_32" alue="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_32" alue="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_32" alue="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_32" alue="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>33</td>
                                                                        <td>Me explican claramente los objetivos de mi trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_33" alue="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_33" alue="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_33" alue="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_33" alue="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_33" alue="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>34</td>
                                                                        <td>Me informan con quién puedo resolver problemas o asuntos de trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_34" alue="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_34" alue="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_34" alue="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_34" alue="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_34" alue="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>35</td>
                                                                        <td>Me permiten asistir a capacitaciones relacionadas con mi trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_35" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_35" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_35" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_35" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_35" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>36
                                                                        </td>
                                                                        <td>Recibo capacitación útil para hacer mi trabajo </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_36" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_36" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_36" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_36" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_36" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="my-2">
                                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                                <p style="text-align: justify;">
                                                                    Las preguntas siguientes están relacionadas con el o los jefes con quien tiene contacto.
                                                                </p>
                                                            </div>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces</th>
                                                                        <th>Casi nunca</th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>37
                                                                        </td>
                                                                        <td>Mi jefe ayuda a organizar mejor el trabajo </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_37" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_37" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_37" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_37" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_37" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>38</td>
                                                                        <td>Mi jefe tiene en cuenta mis puntos de vista y opiniones</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_38" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_38" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_38" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_38" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_38" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>39</td>
                                                                        <td>Mi jefe me comunica a tiempo la información relacionada con el trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_39" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_39" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_39" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_39" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_39" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>40</td>
                                                                        <td>La orientación que me da mi jefe me ayuda a realizar mejor mi trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_40" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_40" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_40" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_40" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_40" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>41</td>
                                                                        <td>Mi jefe ayuda a solucionar los problemas que se presentan en el trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_41" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_41" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_41" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_41" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_41" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="my-2">
                                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                                <p style="text-align: justify;">
                                                                    Las preguntas siguientes se refieren a las relaciones con sus compañeros.
                                                                </p>
                                                            </div>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces</th>
                                                                        <th>Casi nunca</th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>42
                                                                        </td>
                                                                        <td>Puedo confiar en mis compañeros de trabajo </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_42" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_42" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_42" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_42" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_42" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>43</td>
                                                                        <td>Entre compañeros solucionamos los problemas de trabajo de forma respetuosa</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_43" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_43" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_43" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_43" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_43" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>44</td>
                                                                        <td>En mi trabajo me hacen sentir parte del grupo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_44" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_44" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_44" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_44" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_44" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>45</td>
                                                                        <td>Cuando tenemos que realizar trabajo de equipo los compañeros colaboran</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_45" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_45" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_45" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_45" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_45" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>46</td>
                                                                        <td>Mis compañeros de trabajo me ayudan cuando tengo dificultades</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_46" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_46" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_46" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_46" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_46" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="my-2">
                                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                                <p style="text-align: justify;">
                                                                    Las preguntas siguientes están relacionadas con la información que recibe sobre su rendimiento en el trabajo, el reconocimiento, el sentido de pertenencia y la estabilidad que le ofrece su trabajo.
                                                                </p>
                                                            </div>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces</th>
                                                                        <th>Casi nunca</th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>47
                                                                        </td>
                                                                        <td>Me informan sobre lo que hago bien en mi trabajo </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_47" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_47" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_47" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_47" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_47" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>48</td>
                                                                        <td>La forma como evalúan mi trabajo en mi centro de trabajo me ayuda a mejorar mi desempeño</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_48" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_48" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_48" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_48" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_48" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>49</td>
                                                                        <td>En mi centro de trabajo me pagan a tiempo mi salario</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_49" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_49" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_49" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_49" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_49" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>50</td>
                                                                        <td>El pago que recibo es el que merezco por el trabajo que realizo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_50" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_50" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_50" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_50" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_50" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>51</td>
                                                                        <td>Si obtengo los resultados esperados en mi trabajo me recompensan o reconocen</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_51" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_51" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_51" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_51" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_51" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>52
                                                                        </td>
                                                                        <td>Las personas que hacen bien el trabajo pueden crecer laboralmente </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_52" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_52" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_52" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_52" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_52" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>53
                                                                        </td>
                                                                        <td>Considero que mi trabajo es estable </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_53" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_53" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_53" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_53" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_53" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>54
                                                                        </td>
                                                                        <td>En mi trabajo existe continua rotación de personal</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_54" value="4"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_54" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_54" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_54" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_54" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>55
                                                                        </td>
                                                                        <td>Siento orgullo de laborar en este centro de trabajo </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_55" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_55" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_55" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_55" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_55" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>56
                                                                        </td>
                                                                        <td>Me siento comprometido con mi trabajo </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_56" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_56" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_56" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_56" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_56" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="my-2">
                                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                                <p style="text-align: justify;">
                                                                    Las preguntas siguientes están relacionadas con actos de violencia laboral (malos tratos, acoso, hostigamiento, acoso psicológico).
                                                                </p>
                                                            </div>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces</th>
                                                                        <th>Casi nunca</th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>57
                                                                        </td>
                                                                        <td>En mi trabajo puedo expresarme libremente sin interrupciones </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_57" value="0"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_57" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_57" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_57" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_57" value="4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>58</td>
                                                                        <td>Recibo críticas constantes a mi persona y/o trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_58" value="4"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_58" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_58" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_58" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_58" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>59</td>
                                                                        <td>Recibo burlas, calumnias, difamaciones, humillaciones o ridiculizaciones</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_59" value="4"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_59" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_59" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_59" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_59" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>60</td>
                                                                        <td>Se ignora mi presencia o se me excluye de las reuniones de trabajo y en la toma de decisiones</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_60" value="4"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_60" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_60" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_60" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_60" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>61</td>
                                                                        <td>Se manipulan las situaciones de trabajo para hacerme parecer un mal trabajador</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_61" value="4"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_61" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_61" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_61" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_61" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>62
                                                                        </td>
                                                                        <td>Se ignoran mis éxitos laborales y se atribuyen a otros trabajadores</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_62" value="4"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_62" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_62" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_62" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_62" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>63
                                                                        </td>
                                                                        <td>Me bloquean o impiden las oportunidades que tengo para obtener ascenso o mejora en mi trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_63" value="4"required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_63" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_63" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_63" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_63" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>64
                                                                        </td>
                                                                        <td>He presenciado actos de violencia en mi centro de trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_64" value="4"required >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_64" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_64" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_64" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_64" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="my-2">
                                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                                <p style="text-align: justify;">
                                                                    Las preguntas siguientes están relacionadas con la atención a clientes y usuarios.
                                                                </p>
                                                            </div>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>Si</th>
                                                                        <th>No</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            En mi trabajo debo brindar servicio a clientes o usuarios:
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input customer" type="radio" name="p3_A" value="Si" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input customer" type="radio" name="p3_A" value="No">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <br>
                                                            <table class="table table-bordered" width="100%" cellspacing="0" id="customers" style="display:none;">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces</th>
                                                                        <th>Casi nunca</th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>65
                                                                        </td>
                                                                        <td>Atiendo clientes o usuarios muy enojados </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_65" value="4">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_65" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_65" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_65" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_65" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>66</td>
                                                                        <td>Mi trabajo me exige atender personas muy necesitadas de ayuda o enfermas</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_66" value="4">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_66" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_66" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_66" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_66" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>67</td>
                                                                        <td>Para hacer mi trabajo debo demostrar sentimientos distintos a los míos</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_67" value="4">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_67" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_67" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_67" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_67" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>68</td>
                                                                        <td>Mi trabajo me exige atender situaciones de violencia</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_68" value="4">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_68" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_68" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_68" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_68" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>Si</th>
                                                                        <th>No</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            Soy jefe de trabajadores:
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input boss" type="radio" name="p3_B" value="Si" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input boss" type="radio" name="p3_B" value="No">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <br>
                                                            <table class="table table-bordered" width="100%" cellspacing="0" id="bosses" style="display:none;">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2"></th>
                                                                        <th>Siempre</th>
                                                                        <th>Casi siempre</th>
                                                                        <th>Algunas veces</th>
                                                                        <th>Casi nunca</th>
                                                                        <th>Nunca</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>69
                                                                        </td>
                                                                        <td>Comunican tarde los asuntos de trabajo </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_69" value="4">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_69" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_69" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_69" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_69" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>70</td>
                                                                        <td>Dificultan el logro de los resultados del trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_70" value="4">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_70" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_70" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_70" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_70" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>71</td>
                                                                        <td>Cooperan poco cuando se necesita</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_71" value="4">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_71" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_71" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_71" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_71" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>72</td>
                                                                        <td>Ignoran las sugerencias para mejorar su trabajo</td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_72" value="4">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_72" value="3">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_72" value="2">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_72" value="1">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="p3_72" value="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <input type="submit" name="guardar_tomo_3" value="Finalizar" />
                                                    </form>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(".cliente").click(function(evento) {
                var valor = $(this).val();
                if (valor == 'Si') {
                    $("#clientes").css("display", "table");
                } else {
                    $("#clientes").css("display", "none");
                }
            });
            $(".jefe").click(function(evento) {
                var valor = $(this).val();
                if (valor == 'Si') {
                    $("#jefes").css("display", "table");
                } else {
                    $("#jefes").css("display", "none");
                }
            });
            $(".customer").click(function(evento) {
                var valor = $(this).val();
                if (valor == 'Si') {
                    $("#customers").css("display", "table");
                } else {
                    $("#customers").css("display", "none");
                }
            });
            $(".boss").click(function(evento) {
                var valor = $(this).val();
                if (valor == 'Si') {
                    $("#bosses").css("display", "table");
                } else {
                    $("#bosses").css("display", "none");
                }
            });
            $(".trauma").click(function(evento) {
                var valor = $(this).val();
                if (valor == 'Si') {
                    $("#traumas").css("display", "table");
                } else {
                    $("#traumas").css("display", "none");
                }
            });
        });
    </script>
</body>

</html>