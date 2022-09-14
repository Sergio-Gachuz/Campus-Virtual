<?php
include('../staff.class.php');
include('../config.php');
    $id_persona = $_GET['id_persona'];
    $id_cita = $_GET['id_cita'];
    if (isset($_POST['enviar'])) {
        $dato = $_POST;
        $dato['id_persona'] = $id_persona;
        $dato['id_cita'] = $id_cita;
        $residente->guardar_expediente($dato);
    }
    $expediente = $residente->expedientes($id_persona);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="../img/Iconos/campus.ico">
    <title>Expediente</title>
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
    </style>
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
                <div class="card">
                    <div class="card-body">
                        <h2><img src="../img/Iconos/expediente.png" alt="info" width="50"> EXPEDIENTE</h2>
                        <hr>
                        <?php 
                            if(empty($expediente)){
                                echo "<label>Llenar los siguientes datos de acuerdo al paciente en turno.</label>
                                        <hr>";
                                echo "<form method='POST' action='expedientes.php?id_persona=$id_persona&id_cita=$id_cita' enctype='multipart/form-data'>
                                    <div class='row g-3'>
                                        <h3>Ficha de Identificación</h3>
                                        <div class='form-group col-md-3'>
                                            <label>Edad:</label>
                                            <input type='number' name='edad' class='form-control' min='1' required>
                                        </div>
                                        <div class='form-group col-md-3'>
                                            <label>Estado Civil:</label>
                                            <input type='text' name='edo_civil' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-3'>
                                            <label>Escolaridad:</label>
                                            <input type='text' name='escolaridad' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-3'>
                                            <label>Ocupación:</label>
                                            <input type='text' name='ocupacion' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-12'>
                                            <label>Motivo de la Consulta:</label>
                                            <input type='text' name='motivo' class='form-control' required>
                                        </div>
                                        <hr>
                                        <h3>ANTECEDENTES</h3>
                                        <h4>Antecedentes Heredofamiliares</h4>
                                        <div class='form-group col-md-12'>
                                            <label>Enfermedad y parentesco:</label>
                                            <input type='text' name='heredofamiliares' class='form-control' required>
                                        </div>
                                        <h4>Personales No Patológicos</h4>
                                        <div class='form-group col-md-4'>
                                            <label>Toxicomanías (frecuencia y edad de inicio):</label>
                                            <input type='text' name='toxi' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-4'>
                                            <label>Actividad Física:</label>
                                            <input type='text' name='ejercicio' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-4'>
                                            <label>Horas de Trabajo y de sueño:</label>
                                            <input type='text' name='sueno' class='form-control' required>
                                        </div>
                                        <h4>Personales Patológicos:</h4>
                                        <div class='form-group col-md-12'>
                                            <label>Padecimientos actuales y síntomas:</label>
                                            <input type='text' name='padecimiento' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-12'>
                                            <label>Diagnostico Medico Actual (evolución):</label>
                                            <input type='text' name='evolucion' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-12'>
                                            <label>Tratamiento Farmacológico:</label>
                                            <input type='text' name='tratamiento' class='form-control' required>
                                        </div>
                                        <hr>
                                        <h3>Indicadores antropométricos e Interpretación</h3>
                                        <div class='form-group col-md-2'>
                                            <label>Peso Actual:</label>
                                            <input type='number' name='pesoA' min='1' step='0.01' id='pesoA' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-2'>
                                            <label>Peso Ideal:</label>
                                            <input type='number' name='pesoI' min='1' step='0.01' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-2'>
                                            <label>Peso Habitual:</label>
                                            <input type='number' name='pesoH' min='1' step='0.01' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-2'>
                                            <label>Talla:</label>
                                            <input type='number' name='talla' min='1' step='0.01' id='talla' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-2'>
                                            <label>IMC:</label>
                                            <input type='number' name='imc' min='1' step='0.01' id='imc' class='form-control' required readonly>
                                        </div>
                                        <hr>
                                        <h3>Indicadores dietéticos</h3>
                                        <h4>Lugar, hora, cantidad y preparación</h4>
                                        <div class='form-group col-md-12'>
                                            <label>Desayuno:</label>
                                            <input type='text' name='desayuno' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-12'>
                                            <label>Colación:</label>
                                            <input type='text' name='colacion1' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-12'>
                                            <label>Comida:</label>
                                            <input type='text' name='comida' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-12'>
                                            <label>Colación:</label>
                                            <input type='text' name='colacion2' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-12'>
                                            <label>Cena:</label>
                                            <input type='text' name='cena' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-4'>
                                            <label>No. de Comidas:</label>
                                            <input type='number' name='no_comidas' min='1' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-4' style='text-align: center;'>
                                            <label>¿Come entre comidas?:</label>
                                            <div class='form-check form-check-inline'>
                                                <input class='form-check-input' type='radio' id='inlineCheckbox1' name='entre' value='SI'>
                                                <label class='form-check-label' for='inlineCheckbox1'>SI</label>
                                            </div>
                                            <div class='form-check form-check-inline'>
                                                <input class='form-check-input' type='radio' id='inlineCheckbox2' name='entre' value='NO'>
                                                <label class='form-check-label' for='inlineCheckbox2'>NO</label>
                                            </div>
                                        </div>
                                        <div class='form-group col-md-4'>
                                            <label>¿Qué alimentos?:</label>
                                            <input type='text' name='alimentos' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-3' style='text-align: center;'>
                                            <label>Alergia o intolerancia a algún alimento:</label>
                                            <div class='form-check form-check-inline'>
                                                <input class='form-check-input' type='radio' id='inlineCheckbox1' name='alergia' value='SI'>
                                                <label class='form-check-label' for='inlineCheckbox1'>SI</label>
                                            </div>
                                            <div class='form-check form-check-inline'>
                                                <input class='form-check-input' type='radio' id='inlineCheckbox2' name='alergia' value='NO'>
                                                <label class='form-check-label' for='inlineCheckbox2'>NO</label>
                                            </div>
                                        </div>
                                        <div class='form-group col-md-9'>
                                            <label>¿Cuáles?:</label>
                                            <input type='text' name='alergia_des' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-3' style='text-align: center;'>
                                            <label>¿Agrega sal a la comida ya preparada?:</label>
                                            <div class='form-check form-check-inline'>
                                                <input class='form-check-input' type='radio' id='inlineCheckbox1' name='sal' value='SI'>
                                                <label class='form-check-label' for='inlineCheckbox1'>SI</label>
                                            </div>
                                            <div class='form-check form-check-inline'>
                                                <input class='form-check-input' type='radio' id='inlineCheckbox2' name='sal' value='NO'>
                                                <label class='form-check-label' for='inlineCheckbox2'>NO</label>
                                            </div>
                                        </div>
                                        <div class='form-group col-md-9'>
                                            <label>Grasa que utiliza para cocinar:</label>
                                            <input type='text' name='grasa' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-6'>
                                            <label>Vasos de agua natural/día:</label>
                                            <input type='number' name='vasos' min='0' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-6'>
                                            <label>Bebidas que consume:</label>
                                            <input type='text' name='bebidas' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-3' style='text-align: center;'>
                                            <label>Horarios establecidos de comida:</label>
                                            <div class='form-check form-check-inline'>
                                                <input class='form-check-input' type='radio' id='inlineCheckbox1' name='horario' value='SI'>
                                                <label class='form-check-label' for='inlineCheckbox1'>SI</label>
                                            </div>
                                            <div class='form-check form-check-inline'>
                                                <input class='form-check-input' type='radio' id='inlineCheckbox2' name='horario' value='NO'>
                                                <label class='form-check-label' for='inlineCheckbox2'>NO</label>
                                            </div>
                                        </div>
                                        <div class='form-group col-md-9'>
                                            <label>¿Métodos de preparación de alimentos?:</label>
                                            <input type='text' name='metodo' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-6'>
                                            <label>¿Suplementos/Complementos?:</label>
                                            <input type='text' name='suplemento' class='form-control' required>
                                        </div>
                                        <div class='form-group col-md-6'>
                                            <label>Horas de televisión/computadora:</label>
                                            <input type='text' name='television' class='form-control' required>
                                        </div>
                                    </div>
                                    <div class='d-grid gap-2 d-md-flex justify-content-md-center'>
                                        <input type='submit' name='enviar' value='Guardar Expediente' />
                                    </div>
                                </form>";
                            }else{
                                $edad = $expediente['edad'];
                                $edo_civil = $expediente['edo_civil'];
                                $escolaridad = $expediente['escolaridad'];
                                $ocupacion = $expediente['ocupacion'];
                                $motivo = $expediente['motivo'];
                                $heredofamiliares = $expediente['heredofamiliares'];
                                $toxi = $expediente['toxi'];
                                $ejercicio = $expediente['ejercicio'];
                                $sueno = $expediente['sueno'];
                                $padecimiento = $expediente['padecimiento'];
                                $evolucion = $expediente['evolucion'];
                                $tratamiento = $expediente['tratamiento'];
                                $pesoA = $expediente['pesoA'];
                                $pesoI = $expediente['pesoI'];
                                $pesoH = $expediente['pesoH'];
                                $talla = $expediente['talla'];
                                $imc = $expediente['imc'];
                                $desayuno = $expediente['desayuno'];
                                $colacion1 = $expediente['colacion1'];
                                $comida = $expediente['comida'];
                                $colacion2 = $expediente['colacion2'];
                                $cena = $expediente['cena'];
                                $no_comidas = $expediente['no_comidas'];
                                $entre = $expediente['entre'];
                                $alimentos = $expediente['alimentos'];
                                $alergia = $expediente['alergia'];
                                $alergia_des = $expediente['alergia_des'];
                                $sal = $expediente['sal'];
                                $grasa = $expediente['grasa'];
                                $vasos = $expediente['vasos'];
                                $bebidas = $expediente['bebidas'];
                                $horario = $expediente['horario'];
                                $metodo = $expediente['metodo'];
                                $suplemento = $expediente['suplemento'];
                                $tv = $expediente['television'];
                                echo "<form method='POST' enctype='multipart/form-data'>
                                <div class='row g-3'>
                                    <h3>Ficha de Identificación</h3>
                                    <div class='form-group col-md-3'>
                                        <label>Edad:</label>
                                        <input type='number' name='edad' class='form-control'value='$edad' readonly>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label>Estado Civil:</label>
                                        <input type='text' name='edo_civil' class='form-control' value='$edo_civil' readonly>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label>Escolaridad:</label>
                                        <input type='text' name='escolaridad' class='form-control' value='$escolaridad' readonly>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label>Ocupación:</label>
                                        <input type='text' name='ocupacion' class='form-control' value='$ocupacion' readonly>
                                    </div>
                                    <div class='form-group col-md-12'>
                                        <label>Motivo de la Consulta:</label>
                                        <input type='text' name='motivo' class='form-control' value='$motivo' readonly>
                                    </div>
                                    <hr>
                                    <h3>ANTECEDENTES</h3>
                                    <h4>Antecedentes Heredofamiliares</h4>
                                    <div class='form-group col-md-12'>
                                        <label>Enfermedad y parentesco:</label>
                                        <input type='text' name='heredofamiliares' class='form-control' value='$heredofamiliares' readonly>
                                    </div>
                                    <h4>Personales No Patológicos</h4>
                                    <div class='form-group col-md-4'>
                                        <label>Toxicomanías (frecuencia y edad de inicio):</label>
                                        <input type='text' name='toxi' class='form-control' value='$toxi' readonly>
                                    </div>
                                    <div class='form-group col-md-4'>
                                        <label>Actividad Física:</label>
                                        <input type='text' name='ejercicio' class='form-control' value='$ejercicio' readonly>
                                    </div>
                                    <div class='form-group col-md-4'>
                                        <label>Horas de Trabajo y de sueño:</label>
                                        <input type='text' name='sueno' class='form-control' value='$sueno' readonly>
                                    </div>
                                    <h4>Personales Patológicos:</h4>
                                    <div class='form-group col-md-12'>
                                        <label>Padecimientos actuales y síntomas:</label>
                                        <input type='text' name='padecimiento' class='form-control' value='$padecimiento' readonly>
                                    </div>
                                    <div class='form-group col-md-12'>
                                        <label>Diagnostico Medico Actual (evolución):</label>
                                        <input type='text' name='evolucion' class='form-control' value='$evolucion' readonly>
                                    </div>
                                    <div class='form-group col-md-12'>
                                        <label>Tratamiento Farmacológico:</label>
                                        <input type='text' name='tratamiento' class='form-control' value='$tratamiento' readonly>
                                    </div>
                                    <hr>
                                    <h3>Indicadores antropométricos e Interpretación</h3>
                                    <div class='form-group col-md-2'>
                                        <label>Peso Actual:</label>
                                        <input type='number' name='pesoA' class='form-control' value='$pesoA' readonly>
                                    </div>
                                    <div class='form-group col-md-2'>
                                        <label>Peso Ideal:</label>
                                        <input type='number' name='pesoI' class='form-control' value='$pesoI' readonly>
                                    </div>
                                    <div class='form-group col-md-2'>
                                        <label>Peso Habitual:</label>
                                        <input type='number' name='pesoH' class='form-control' value='$pesoH' readonly>
                                    </div>
                                    <div class='form-group col-md-2'>
                                        <label>Talla:</label>
                                        <input type='number' name='talla' class='form-control' value='$talla' readonly>
                                    </div>
                                    <div class='form-group col-md-2'>
                                        <label>IMC:</label>
                                        <input type='number' name='imc' class='form-control' value='$imc' readonly>
                                    </div>
                                    <hr>
                                    <h3>Indicadores dietéticos</h3>
                                    <h4>Lugar, hora, cantidad y preparación</h4>
                                    <div class='form-group col-md-12'>
                                        <label>Desayuno:</label>
                                        <input type='text' name='desayuno' class='form-control' value='$desayuno' readonly>
                                    </div>
                                    <div class='form-group col-md-12'>
                                        <label>Colación:</label>
                                        <input type='text' name='colacion1' class='form-control' value='$colacion1' readonly>
                                    </div>
                                    <div class='form-group col-md-12'>
                                        <label>Comida:</label>
                                        <input type='text' name='comida' class='form-control' value='$comida' readonly>
                                    </div>
                                    <div class='form-group col-md-12'>
                                        <label>Colación:</label>
                                        <input type='text' name='colacion2' class='form-control' value='$colacion2' readonly>
                                    </div>
                                    <div class='form-group col-md-12'>
                                        <label>Cena:</label>
                                        <input type='text' name='cena' class='form-control' value='$cena' readonly>
                                    </div>
                                    <div class='form-group col-md-4'>
                                        <label>No. de Comidas:</label>
                                        <input type='number' name='no_comidas' class='form-control' value='$no_comidas' readonly>
                                    </div>
                                    <div class='form-group col-md-4' style='text-align: center;'>
                                        <label>¿Come entre comidas?:</label>
                                        <input type='text' name='entre' class='form-control' value='$entre' readonly>
                                    </div>
                                    <div class='form-group col-md-4'>
                                        <label>¿Qué alimentos?:</label>
                                        <input type='text' name='alimentos' class='form-control' value='$alimentos' readonly>
                                    </div>
                                    <div class='form-group col-md-3' style='text-align: center;'>
                                        <label>Alergia o intolerancia a algún alimento:</label>
                                        <input type='text' name='alergia' class='form-control' value= '$alergia' readonly>
                                    </div>
                                    <div class='form-group col-md-9'>
                                        <label>¿Cuáles?:</label>
                                        <input type='text' name='alergia_des' class='form-control' value='$alergia_des' readonly>
                                    </div>
                                    <div class='form-group col-md-3' style='text-align: center;'>
                                        <label>¿Agrega sal a la comida ya preparada?:</label>
                                        <input type='text' name='sal' class='form-control' value='$sal' readonly>
                                    </div>
                                    <div class='form-group col-md-9'>
                                        <label>Grasa que utiliza para cocinar:</label>
                                        <input type='text' name='grasa' class='form-control' value='$grasa' readonly>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <label>Vasos de agua natural/día:</label>
                                        <input type='number' name='vasos' class='form-control' value='$vasos' readonly>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <label>Bebidas que consume:</label>
                                        <input type='text' name='bebidas' class='form-control' value='$bebidas' readonly>
                                    </div>
                                    <div class='form-group col-md-3' style='text-align: center;'>
                                        <label>Horarios establecidos de comida:</label>
                                        <input type='text' name='horarios' class='form-control' value='$horario' readonly>
                                    </div>
                                    <div class='form-group col-md-9'>
                                        <label>¿Métodos de preparación de alimentos?:</label>
                                        <input type='text' name='metodo' class='form-control' value='$metodo' readonly>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <label>¿Suplementos/Complementos?:</label>
                                        <input type='text' name='suplemento' class='form-control' value='$suplemento' readonly>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <label>Horas de televisión/computadora:</label>
                                        <input type='text' name='television' class='form-control' value='$tv' readonly>
                                    </div>
                                </div>
                            </form>";
                            }
                        ?>
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
    <script>
        $(document).ready(function() {
            function obtenerIMC() {
                var peso, talla, imc, operacion;
                peso = $('#pesoA');
                talla = $('#talla');
                imc = $('#imc');
                operacion = peso.val() / (talla.val() * talla.val());
                var resultado = operacion.toFixed(4);
                imc.val(resultado);
            }

            $("#pesoA").keyup(function() {
                var talla;
                talla = $('#talla').val();
                if (talla != "") {
                    obtenerIMC()
                }
            });

            $("#talla").keyup(function() {
                var pesoA;
                pesoA = $('#pesoA').val();
                if (talla != "") {
                    obtenerIMC()
                }
            });
        })
    </script>
</body>

</html>