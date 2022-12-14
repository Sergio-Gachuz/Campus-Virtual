<?php
    include('../empleado.class.php');
    include('../config.php');
    $id_persona = $_SESSION['id_persona'];
	if (isset($_POST['enviar'])) {
        $data = $_POST;
        $data['id_persona'] = $id_persona;
        $trabajador->bateria_bloq1($_SESSION['bloque1']);
        $trabajador->bateria_bloq2($_SESSION['bloque2']);
        $trabajador->bateria_bloq3($_SESSION['bloque3']);
        $trabajador->bateria_bloq4($data);
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
    <title>Bateria para Conductores | Bloque 4</title>
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
                    </nav>
                </div>
            </div>
        </div>
        <br>
        <div class="container" id="perfil">
            <div class="row">
                <div class="col-sm-12">
                    <form class="col-sm-12" method="POST" action="test_bateria_bloq_4.php">
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        1. Soy prudente, ante todo, cuando...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_1" value="a" required>
                                            <label class="form-check-label" for="respuesta1">A. Conduzco en
                                                ciudad</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_1" value="b">
                                            <label class="form-check-label" for="respuesta2">B. La carretera est?? en
                                                mal estado</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_1" value="c">
                                            <label class="form-check-label" for="respuesta3">C. Llevo vidas bajo mi
                                                responsabilidad</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_1" value="d">
                                            <label class="form-check-label" for="respuesta4">D. He tomado unas
                                                copas</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        2. Me muestro impertubable y tranquilo...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_2" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Ante otros
                                                conductores que me llaman la atenci??n o me hacen una "faena".</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_2" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Cuando se me cala
                                                el coche y me pitan los de atr??s.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_2" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Con los
                                                acompa??antes que constantemente me dicen lo que debo hacer y me
                                                advierten de las normas de circulaci??n.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_2" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Ante peatones
                                                osados.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        3. Me impaciento cuando...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_3" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Tengo que llegar
                                                pronto a alguna parte.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_3" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Voy detr??s de un
                                                veh??culo que circula lentamente y me impide adelantarme.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_3" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Me encuentro con
                                                atascos o alg??n contratiempo.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_3" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. En zona urbana,
                                                tengo que detenerme ante los pasos de peatones.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        4. Mi comportamiento es...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_4" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Correcto s??lo
                                                con conductores educados.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_4" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. De superioridad
                                                ante otros conductores.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_4" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Siempre educado
                                                y correcto.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_4" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Agresivo con los
                                                conductores que cometen infracciones.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        5. Me muestro intolerante ante conductores...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_5" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Novatos.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_5" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Que me ponen en
                                                situaciones d??ficiles.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_5" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Que infringen
                                                las normas importantes de tr??fico.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_5" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Poco
                                                educados.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        6. Cuando tengo prisa...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_6" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. No presto
                                                demasiada atenci??n a las se??ales.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_6" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Me irritan
                                                f??cilmente los peque??os percances.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_6" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Soy m??s
                                                impaciente.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_6" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Me muestro poco
                                                correcto con los dem??s conductores.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        7. Conduciendo soy sobre todo cort??s con...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_7" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Personas j??venes
                                                o interesantes del otro sexo.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_7" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Un anciano o
                                                minusv??lido.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_7" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Los
                                                novatos.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_7" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Los conocidos o
                                                las personas que me caen bien.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        8. Mi conducta es intrasigente con...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_8" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Automovilistas
                                                temerarios y obstinados.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_8" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Los que me hacen
                                                faenas.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_8" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Los jovenes de
                                                la moto ruidosa.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_8" value="d">
                                            <label class="form-check-label" for="exampleRadios4">D. Los novatos o
                                                inexpertos.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        9. Insulto -aunque no lo oigan- a otros conductores cuando...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_9" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Tengo paciencia
                                                y no me la ceden.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_9" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Intento
                                                adelantar y me impiden hacerlo.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_9" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Me pitan y me
                                                dan luces para llamarme la atenci??n.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_9" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. En ninguno de
                                                los casos anteriores.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        10. Me pongo nervioso e impaciente conduciendo...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_10" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. En caravanas o
                                                ante los atascos.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_10" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Si no puedo
                                                adelantar.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_10" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Ante las
                                                retenciones de tr??fico sin motivo aparente.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_10" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Si no llego a
                                                tiempo a una entrevista o cita.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        11. Si llevo prisa, lo que m??s me molesta es que...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_11" value="a" required>
                                            <label class="form-check-label" for="respuesta1">A. Los peatones crucen
                                                delante por donde no deben o cuando no les corresponde.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_11" value="b">
                                            <label class="form-check-label" for="respuesta2">B. El agente urbano
                                                detenga el tr??fico largamente.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_11" value="c">
                                            <label class="form-check-label" for="respuesta3">C. Otros conduzcan
                                                lentamente impidiendo adelantarles.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_11" value="d">
                                            <label class="form-check-label" for="respuesta4">D. Haya se??ales que
                                                limiten la velocidad.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        12. Llamo la atenci??n a los conductores que...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_12" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Cometen
                                                imprudencias.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_12" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Conducen
                                                lentamente sin movitvo aparente.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_12" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. No me ceden el
                                                paso.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_12" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Me deslumbran
                                                con los faros.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        13. Recrimino sin piedad la actuaci??n de los conductores...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_13" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Novatos o
                                                inexpertos.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_13" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B.
                                                "Listillos."</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_13" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C.
                                                Impacientes.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_13" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Poco educados y
                                                faltones.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        14. Me siento m??s contento conmigo cuando...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_14" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Cedo el paso,
                                                aunque no tengan preferencia-</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_14" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. He demostrado a
                                                los dem??s que soy un gran conductor.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_14" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Durante el viaje
                                                he respetado las normas de circulaci??n.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_14" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. He favorecido al
                                                adelantamiento a otros automovilistas.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        15. Me molesta que...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_15" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. No respeten el
                                                ritmo que llevo conduciendo.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_15" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Me adelanten
                                                veh??culos menos potentes que el m??o.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_15" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Me indiquen los
                                                fallos y errores cometidos.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_15" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Hablen y me
                                                distraigan cuando estoy conduciendo.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        16. Me comporto agresivamente si...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_16" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Me doy un
                                                peque??o golpe con otro veh??culo.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_16" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Tengo que hacer
                                                una maniobra bruscamente por la culpa de los otros.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_16" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Me llaman la
                                                atenci??n sin raz??n alguna.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_16" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Me quitan el
                                                lugar de aparcamiento.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        17. Tiendo a arriesgarme habitualmente...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_17" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. En los
                                                adelantamientos.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_17" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Cuando hay mala
                                                visibilidad.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_17" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Al tomar las
                                                curvas.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_17" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. En ninguna de
                                                estas circunstancias.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        18. Extremo las medidas de seguridad...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_18" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Siempre que me
                                                aproximo a un paso peatonal.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_18" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Cuando viajo en
                                                d??as se??alados de mucha circulaci??n.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_18" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. En d??as de
                                                lluvia.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_18" value="d">
                                            <label class="form-check-label" for="exampleRadios4">D. En los
                                                adelantamientos.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        19. Cuando llevo prisa...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_19" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Me pongo
                                                nervioso e impaciente ante los sem??foros.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_19" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Me pongo de mal
                                                humor por las actuaciones de los agentes de tr??fico.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_19" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. No presto
                                                demasiada atenci??n a la se??alizaci??n.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_19" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. No suele
                                                sucederme nada de lo anterior.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        20. Me muestro inseguro con el coche...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_20" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Cuando la
                                                carretera est?? mojada o resbaladiza.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_20" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Al realizar los
                                                adelantamiento.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_20" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Cuando fallan
                                                los mecanismos del coche.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_20" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Casi nunca</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        21. Usted est?? maniobrando para estacionar su coche en la calle, pero otros
                                        usuarios le pitan reiteradamente:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_21" value="a" required>
                                            <label class="form-check-label" for="respuesta1">A. Sigue maniobrando
                                                sin inmutarse.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_21" value="b">
                                            <label class="form-check-label" for="respuesta2">B. Aparca lo m??s r??pido
                                                posible, intentando no molestar a los dem??s.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_21" value="c">
                                            <label class="form-check-label" for="respuesta3">C. Reacciona de manera
                                                agresiva.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_21" value="d">
                                            <label class="form-check-label" for="respuesta4">D. Se marcha a otro
                                                lugar o deja pasar.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        22. Se encuentra ante una confluencia vial, con la se??al "ceda el paso" y
                                        tr??fico intenso:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_22" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Pasa si cree que
                                                no hay peligro.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_22" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Se incorpora
                                                r??pidamente sin parar.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_22" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Cede el paso con
                                                paciencia.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_22" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Si tiene prisa,
                                                no se detiene.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        23. Intenta aparcar en el lugar que acaba de quedar libre, pero otro
                                        automovilista m??s "listillo" se le adelanta:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_23" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Trata de
                                                indicarle que usted ha llegado antes y va a aparcar.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_23" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Atraviesa su
                                                coche y discute el asunto.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_23" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Reacciona
                                                agresivamente y toca el claxon.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_23" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Busca sin m??s
                                                otro aparcamiento.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        24. Est?? ante un sem??foro verde, pero el agente de tr??fico retiene la
                                        circulaci??n unos minutos, sin motivo aparente:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_24" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Se pone nervioso
                                                y se impacienta.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_24" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Hace caso del
                                                agente y se despreocupa del tema.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_24" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Se detiene y
                                                espera.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_24" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Si tarda un
                                                poco, le llama la atenci??n de alguna manera.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        25. Va conduciendo normalmente en carretera; inesperadamente se le coloca
                                        delante otro usuario haci??ndole realizar una brusca acci??n evasiva:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_25" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Si no ocurre
                                                nada, deja que siga.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_25" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Reacciona de
                                                forma agresiva y le llama la atencion.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_25" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Hace que se
                                                detenga para pedirle explicaciones.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_25" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Le adelanta y
                                                hace gestos insultantes.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        26. Conduciendo en caravana detr??s de un veh??culo lento, al intentar
                                        adelantarte, otros veh??culos se adelantan, le impiden el paso e incluso le
                                        pitan:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_26" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Adelanta, pase
                                                lo que pase.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_26" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Deja que le
                                                adelanten y se vayan.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_26" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Recrimina la
                                                acci??n de los otros conductores.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_26" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Se aguanta y
                                                espera para poder intentarlo de nuevo.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        27. Conduciendo por el carril central de una carretera de doble v??a a una
                                        velocidad reglamentaria, otro automovilista le da reiteradamente se??ales de
                                        luces para que se retire a un lado:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_27" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Continua, sin
                                                importarle la impaciencia del otro conductor.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_27" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Pide disculpas y
                                                se pasa al otro carril.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_27" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Reacciona con
                                                agresividad y le indica que, si tiene prisa, adelante por el otro
                                                carril.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_27" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Se retira al
                                                otro carril.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        28. Conduciendo con normalidad por carretera, ve c??mo el agente de tr??fico
                                        le adelanta, y le indica que se detenga:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_28" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Se inquieta,
                                                pensando que haya hecho algo mal.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_28" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Extra??ado, se
                                                detiene, esperando ver lo que desea.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_28" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Se detiene
                                                tranquilamente, seguro de no haber infringido ninguna norma de
                                                circulaci??n.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_28" value="d">
                                            <label class="form-check-label" for="exampleRadios4">D. Se detiene y
                                                sale del coche dando un fuerte portazo y voceando.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        29. Sale de viaje y alg??n miembro de su familia le va haciendo
                                        constantemente observaciones y recriminaciones:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_29" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Se siente
                                                molesto y le advierte de su actitud poco favorables para
                                                conducir.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_29" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Le manda callar,
                                                y si persiste, detiene el coche.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_29" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Tiene en cuenta
                                                alguna de sus observaciones.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_29" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. No hace caso a
                                                sus comentarios.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        30. Se encuentra en uno de los muchos atascos urbanos y ve c??mo pasa el
                                        tiempo y apenas avanza:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_30" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Se tranquiliza y
                                                se inquieta al ver que nadie hace nada.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_30" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Se llena de
                                                paciencia y espera.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_30" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Adelanta por
                                                otro carril o por el arc??n.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_30" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Procura salir
                                                por la primera calle.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        31. Por la ma??ana, debido a la densidad de tr??fico urbano, no puede llegar
                                        puntual a su destino...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_31" value="a" required>
                                            <label class="form-check-label" for="respuesta1">A. Se impacienta y toca
                                                el claxon.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_31" value="b">
                                            <label class="form-check-label" for="respuesta2">B. Si lleva mucha
                                                prisa, procura buscar alguna soluci??n o deja el coche aparcado y se
                                                va andando.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_31" value="c">
                                            <label class="form-check-label" for="respuesta3">C. Pacientemente espera,
                                                y si puede, cambia de ruta.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_31" value="d">
                                            <label class="form-check-label" for="respuesta4">D. Se enfurece y toca
                                                el claxon.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        32. Va conduciendo bastante lentamente por la carretera; otros
                                        automovilistas de atr??s le pitan o le dan las luces:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_32" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Reacciona
                                                agresivamente.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_32" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Se va a su
                                                derecha y deja pasar.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_32" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Sigue a su aire
                                                sin importarle.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_32" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Les indica que
                                                no puede ir m??s deprisa por alguna raz??n.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        33. Se encuentra ante una interrupci??n de tr??fico sin conocer las causas, no
                                        obstante, ve c??mo algunos automovilistas se cuelan por el arc??n y contin??an:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_33" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Los recrimina, y
                                                si es posible, obstaculiza su paso.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_33" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Espera
                                                tranquilamente.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_33" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Si otros pasan,
                                                usted les sigue.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_33" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Si lleva prisa,
                                                procura buscar una salida.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        34. Conduciendo, le sigue detr??s otro veh??culo que intenta adelantarle; le
                                        indica usted la presencia de veh??culos en sentido contrario y, sin embargo,
                                        insiste:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_34" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Sigue su
                                                camino.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_34" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Reitera el aviso
                                                y se retira lo m??s que puede a su derecha.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_34" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Le obstaculiza
                                                el paso.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_34" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Le recrimina
                                                agresivamente.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        35. De repente tiene que frenar ante la presencia de un peat??n que se cruza
                                        y ??ste ni se inmuta...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_35" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Se detiene y le
                                                advierte de su imprudencia.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_35" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Le increpa
                                                agresivamente.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_35" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Le intenta
                                                asustar.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_35" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Evita
                                                atropellarle y sigue su camino.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        36. El conductor que va delante da un frenazo bruscamente y usted se
                                        empotra en la parte trasera, sin que pueda evitarlo...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_36" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Recrimina la
                                                acci??n del otro usuario.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_36" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Discute y le
                                                hace saber de su faena.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_36" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Baja a ver los
                                                desperfectos e intenta dialogar sobre el tema.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_36" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Reconoce su
                                                despiste y acepta sus reclamaciones.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        37. Se acaba de poner para usted el sem??foro en verde, no obstante, observa
                                        que algunos peatones cruzan sin prisa, haci??ndole esperar:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_37" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Intenta salir
                                                cort??ndoles el paso.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_37" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Espera
                                                pacientemente que pasen.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_37" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Les hace saber
                                                de alguna forma que deben esperar.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_37" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Acelera
                                                intimid??ndoles.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        38. Otro automovilista le adelanta, haci??ndolo de forma temprana, y se
                                        coloca delante de su veh??culo; usted trata de frenar, pero le alcanza
                                        caus??ndole desperfectos:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_38" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Reacciona de
                                                forma agresiva contra el conductor.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_38" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Ve los da??os y
                                                trata de llegar a un acuerdo con ??l.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_38" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Le hace saber
                                                que ??l ha sido el culpable.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_38" value="d">
                                            <label class="form-check-label" for="exampleRadios4">D. Trata de
                                                intimidarle para que pague los desperfectos.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        39. Conduciendo con normalidad, de pronto otro automovilista, que no ha hecho
                                        el STOP, le alcanza lateralmente, caus??ndole grandes da??os en su coche:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_39" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Calmadamente le
                                                pide explicaciones.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_39" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Le hace saber
                                                que ??l es el causante y le advierte de su despiste.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_39" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Se muestra
                                                agresivo y le recrimina su error.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_39" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Se muestra
                                                agresivo e intransigente y hace ademanes de pegarle.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        40. Conduciendo en zona urbana son se??al de velocidad limitada, va
                                        ligeramente por encima de lo indicado:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_40" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Se disculpa e
                                                intenta convencerle de que no le sancione.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_40" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Discute su
                                                actuaci??n.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_40" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Acepta la
                                                sanci??n sin rechistar.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_40" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. No hace caso de
                                                la multa.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        41. Se encuentra un sem??foro en intermitencia y en verde para peatones:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_41" value="a" required>
                                            <label class="form-check-label" for="respuesta1">A. Acelera y pasa antes
                                                que ellos.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_41" value="b">
                                            <label class="form-check-label" for="respuesta2">B. Espera impacientemente
                                                a que pasen.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_41" value="c">
                                            <label class="form-check-label" for="respuesta3">C. Tranquilamente
                                                espera a que pase el ??ltimo.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_41" value="d">
                                            <label class="form-check-label" for="respuesta4">D. Sigue la marcha con
                                                preocupaci??n.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        42. Va a adelantar a otro veh??culo, pero cuando lo intenta, ??ste se lo
                                        impide a prop??sito aumentando la velocidad...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_42" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Toca el claxon
                                                insistentemente y pasa a toda costa.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_42" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Se muestra
                                                agresivo verbalmente o gestualmente.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_42" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Critica su
                                                acci??n, pero espera.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_42" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Le deja que se
                                                vaya.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        43. Otro conductor hace que usted cometa una acci??n evasiva (o cometa una
                                        infracci??n) y no le pide disculpas:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_43" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Procura anotar
                                                su matr??cula y denunciarle.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_43" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Se enfada mucho
                                                y le insulta aunque le oiga.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_43" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Trata de
                                                alcanzarle y le hace parar.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_43" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Se resigna, sin
                                                m??s.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        44. En una autov??a, con carril para veh??culos lentos, se encuentra con un
                                        cami??n que no hace uso de dicho carril, obstruy??ndole el paso:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_44" value="option_44_1">
                                            <label class="form-check-label" for="exampleRadios1">A. Le recrimina con
                                                gestos o palabras.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_44" value="option_44_2">
                                            <label class="form-check-label" for="exampleRadios2">B. Le indica que se
                                                retire al carril de veh??culos lentos.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_44" value="option_44_3">
                                            <label class="form-check-label" for="exampleRadios3">C. Le adelanta, sin
                                                m??s.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_44" value="option_44_4">
                                            <label class="form-check-label" for="exampleRadios3">D. Espera
                                                pacientemente.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        45. Va conduciendo acompa??ado de gente que le va distrayendo constantemente:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_45" value="option_45_1">
                                            <label class="form-check-label" for="exampleRadios1">A. Enfadado,
                                                recrimina su actuaci??n.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_45" value="option_45_1">
                                            <label class="form-check-label" for="exampleRadios2">B. Procura
                                                ignorarlos o les pide que le dejen en paz.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_45" value="option_45_1">
                                            <label class="form-check-label" for="exampleRadios3">C. Si no le hacen
                                                caso, detiene el coche.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_45" value="option_45_1">
                                            <label class="form-check-label" for="exampleRadios3">D. Participa en su
                                                conversaci??n y de sus bromas.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        46. Se encuentra detr??s de un conductor "novato" ante un sem??foro que se
                                        pone en verde, pero tarda bastante en iniciar marcha:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_46" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Toca el claxon y
                                                recrimina su inexperiencia.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_46" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Le indica que
                                                inicie la marcha.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_46" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Se impacienta
                                                ante la tardanza.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_46" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Espera
                                                pacientemente a que inicie la marcha.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        47. En caravana, usted y otros conductores han cedido el paso a una
                                        ambulancia; sin embargo, otros que vienen detr??s aprovecha la ocasi??n y le
                                        obstaculizan para incorporarse al carril:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_47" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Se enfada por
                                                ello y critica su actuaci??n.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_47" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Les deja que
                                                pasen.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_47" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Les avisa para
                                                que le dejen incorporarse al tr??fico.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_47" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Atraviesa el
                                                coche haci??ndoles frenar bruscamente.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        48. Al intentar salir, encuentra un coche aparcado en doble fila que le
                                        impide su salida durante un buen rato:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_48" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Se enfada mucho
                                                y toca reiteradamente el claxon.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_48" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Al llegar el
                                                due??o le recrimina e insulta.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_48" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Toca el claxon
                                                para avisar al propietario y espera un poco.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_48" value="d">
                                            <label class="form-check-label" for="exampleRadios4">D. Acepta sus
                                                disculpas.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        49. Conduciendo de noche, otro veh??culo que viene en sentido contrario le
                                        deslumbra, usted le avisa de ello, pero ??l no se da por enterado...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_49" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Le avisa de su
                                                negligencia.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_49" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Le insulta y le
                                                da luces.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_49" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Si persiste,
                                                hace lo mismo que ??l.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_49" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Disminuye la
                                                velocidad y deja que pase.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        50. Al intentar adelantar a un autob??s, ??ste de inmediato da la
                                        intermitencia, para y gira a la izquierda:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_50" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Toca
                                                reiteradamente el claxon e intenta adelantar.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_50" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Insulta e
                                                increpa su acci??n, pero no adelanta.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_50" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Desiste de
                                                adelantar.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_50" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Sigue la
                                                maniobra de adelantamiento y le insulta al pasar.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        51. De noche, una vez que ha adelantado a otro veh??culo, ??ste mantiene las
                                        luces largas, deslumbr??ndole un buen rato...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_51" value="a" required>
                                            <label class="form-check-label" for="respuesta1">A. Frena bruscamente
                                                para que se d?? cuenta de que le est??n molestando las luces.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_51" value="b">
                                            <label class="form-check-label" for="respuesta2">B. Le deja pasar y hace
                                                lo mismo que ??l.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_51" value="c">
                                            <label class="form-check-label" for="respuesta3">C. Le hace se??ales para
                                                que se d?? cuenta de que lleva luces largas.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_51" value="d">
                                            <label class="form-check-label" for="respuesta4">D. Aumenta la velocidad
                                                para dejarle atr??s.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        52. Va a entrar a una calle de direcci??n ??nica, pero otro coche viene por
                                        ella, haciendo caso omiso de la se??al de prohibido:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_52" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Le deja
                                                pasar.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_52" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Le hace
                                                retroceder, sin dudar.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_52" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Le advierte de
                                                su error.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_52" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Le increpa y le
                                                hace retroceder.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        53. Conduciendo en caravana, ve como otros veh??culos vienen adelantando por
                                        el arc??n hasta que les obstaculiza otro aparcado en ??l, entonces intentan
                                        colocarse delante de usted:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_53" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. No deja
                                                incorporarse a ninguno.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_53" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Da paso a uno o
                                                dos.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_53" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Recrimina su
                                                actuaci??n y no deja pasar a ninguno.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_53" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Si no tiene
                                                prisa, espera a que pasen.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        54. En un d??a de niebla abundante, va conduciendo en carretera detr??s de un
                                        veh??culo largo:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_54" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Intenta
                                                adelantar dando se??ales de luces.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_54" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Aguanta
                                                pacientemente hasta que le indique cu??ndo puede pasar.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_54" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Le hace se??ales
                                                para que le indicque cu??ndo puede pasar.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_54" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Adelanta sin
                                                m??s.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        55. En un d??a de lluvia, al pasar por un charco, empapa a los peatones que
                                        pasan por la acera:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_55" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Se disculpa de
                                                alguna forma.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_55" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Contin??a sin
                                                m??s.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_55" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Se r??e y piensa
                                                que la culpa es de ellos.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_55" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Tendr?? cuidado
                                                de que no vuelva a pasar en otra ocasi??n.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        56. Deja su coche estacionado en casco urbano; al regresar se encuentra con
                                        un agente mult??ndole:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_56" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Intenta
                                                convencer al agente de que el retraso fue involuntario.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_56" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Increpa al
                                                agente si no hace caso.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_56" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Paga la multa y
                                                procura aparcar mejor otro d??a.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_56" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Se niega
                                                rotundamente a pagar la multa.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 19rem;">
                                    <div class="card-header ">
                                        57. Se acerca a un cruce en el cual tiene preferencia; sin embargo, viene
                                        otro usuario que no parece dispuesto a cederle el paso:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_57" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Contin??a a la
                                                misma velocidad, ya que tiene preferencia.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_57" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Le hace se??ales
                                                para hacerle saber su presencia y preferencia.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_57" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Le deja pasar si
                                                lo hace.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p4_57" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Le insulta por
                                                su actitud.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <input type="submit" name="enviar" value="Finalizar"/>
                        </div>
                    </form>
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
                                <h4>Coordinaci??n de Seguros</h4>
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
    <script src="../js/Tiempo Bloque4.js"></script>
</body>
</html>