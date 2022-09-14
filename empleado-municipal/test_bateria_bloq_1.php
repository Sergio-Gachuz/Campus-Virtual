<?php
    include('../empleado.class.php');
    include('../config.php');
    $id_persona = $_SESSION['id_persona'];
	if (isset($_POST['enviar'])) {
        $data = $_POST;
        $data['id_persona'] = $id_persona;
        $_SESSION['bloque1'] = $data;
        header('Location: test_bateria_inst_2.php');
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
    <title>Batería para Conductores | Bloque 1</title>
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
                    <form class="col-sm-12" name="bloque1" method="POST" action="test_bateria_bloq_1.php" id="bloque1">
                        <div class="row row-cols-1 row-cols-md-1 g-4">
                            <div class="col">
                                <div class="card bateria" style="height: 20rem;">
                                    <div class="card-header">
                                        1. Ordene las palabras que vienen a continuación y busque la que falta para que
                                        tengan un sentido: En circulan los España automóviles por la...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_1" value="a" required >
                                            <label class="form-check-label" for="respuesta1">A. Cuneta</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_1" value="b">
                                            <label class="form-check-label" for="respuesta2">B. Izquierda</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_1" value="c">
                                            <label class="form-check-label" for="respuesta3">C. Derecha</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_1" value="d">
                                            <label class="form-check-label" for="respuesta4">D. Acera</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 20rem;">
                                    <div class="card-header">
                                        2. Para seguir el orden en que estan colocados, ¿qué número pondría a
                                        continuación?
                                        <br>
                                        5 6 9 10 13 14
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_2" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. 16</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_2" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. 15</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_2" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. 18</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_2" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. 17</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 20rem;">
                                    <div class="card-header">
                                        3. Para hacer completo el modelo que pieza sobra
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_3" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_3" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_3" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_3" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. </label>
                                        </div>
                                        <div class="text-center">
                                            <img src="../img/p3.PNG" alt="MDN">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 20rem;">
                                    <div class="card-header">
                                        4. Para seguir el orden en que estan colocados, ¿Que letra pondría a
                                        continuación?
                                        <br>
                                        a b a b a ..
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_4" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. a</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_4" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. b</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_4" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. c</label></div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_4" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. d</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 20rem;">
                                    <div class="card-header">
                                        5. ¿Qué recipiente tiene la escala de medida correctamente marcada?
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_5" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. A</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_5" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. B</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_5" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. C</label></div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_5" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. No se sabe</label>
                                        </div>
                                        <div class="text-center">
                                            <img src="../img/p5.PNG" alt="MDN">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 20rem;">
                                    <div class="card-header">
                                        6. BARCO es a TIMÓN, como AUTOMÓVIL es a...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_6" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Volante</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_6" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Embrage</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_6" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Motor</label></div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_6" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Acelerador</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 20rem;">
                                    <div class="card-header">
                                        7. Para seguir el orden en que estan colocadas, ¿qué letra pondría a
                                        continuación?
                                        <br>
                                        a b b a c c a ...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_7" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. a</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_7" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. b</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_7" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. c</label></div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_7" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. d</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 20rem;">
                                    <div class="card-header">
                                        8. ¿Qué trozo de cadena es más necesario para que se sostengan los 50 kg?
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_8" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. 1</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_8" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. 2</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_8" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. 3</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_8" value="d">
                                            <label class="form-check-label" for="exampleRadios4">D. Todos igual</label>
                                        </div>
                                        <div class="text-center">
                                            <img src="../img/p8.PNG" alt="MDN">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 20rem;">
                                    <div class="card-header">
                                        9. LOCOMOTORA es a VAGÓN, como CAMIÓN es a ...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_9" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Cabina</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_9" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Transporte</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_9" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Remolque</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_9" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Eje</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 20rem;">
                                    <div class="card-header">
                                        10. ¿Qué rodillo gira en dirección contraria al rodillo X?
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_10" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. A</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_10" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. B</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_10" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. C</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_10" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. D</label>
                                        </div>
                                        <div class="text-center">
                                            <img src="../img/p10.PNG" alt="MDN" height="100px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 20rem;">
                                    <div class="card-header">
                                        11. Para seguir el orden de los dibujos de la izquierda, ¿Cuál de los dos están a la derecha pondría en el lugar vacio?
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_11" value="a" required>
                                            <label class="form-check-label" for="respuesta1">A. A</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_11" value="b">
                                            <label class="form-check-label" for="respuesta2">B. B</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_11" value="c">
                                            <label class="form-check-label" for="respuesta3">C. C</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_11" value="d">
                                            <label class="form-check-label" for="respuesta4">D. D</label>
                                        </div>
                                        <div class="text-center">
                                            <img src="../img/p11.jpg" alt="MDN">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 20rem;">
                                    <div class="card-header">
                                        12. ¿Cuál de las siguientes palabras significa lo mismo que APOCADO?
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_12" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Ficticio</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_12" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Tímido</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_12" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Valioso</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_12" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Alfabético</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 23rem;">
                                    <div class="card-header">
                                        13. ¿Cómo quedarían el aceite y el agua después de haberlos mezclado y agitado?
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_13" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Dibujo A</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_13" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Dibujo B</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_13" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Dibujo C </label></div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_13" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. No se puede saber </label>
                                        </div>
                                        <div class="text-center">
                                            <img src="../img/p13.PNG" alt="MDN" height="130px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 20rem;">
                                    <div class="card-header">
                                        14. Si la flecha continuase su camino, ¿a qué punto tocaría?
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_14" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. A</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_14" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. B</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_14" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. C</label></div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_14" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. D</label>
                                        </div>
                                        <div class="text-center">
                                            <img src="../img/p14.PNG" alt="MDN" height="120px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 20rem;">
                                    <div class="card-header">
                                        15. En las calles de una ciudad, los números pares de las casas están a la derecha, y los impares a la izquierda. Si usted está perpendicularmente en una calle, enfrente ve una casa con el número 22, y desea ir al número 38, entonces, deberá:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_15" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Torcer a la derecha</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_15" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Conocer dónde comienza la calle</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_15" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Conocer la longitud de la calle </label></div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_15" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Torcer a izquierda</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 20rem;">
                                    <div class="card-header">
                                        16. Un aprendiz recibe cada día 12 euros, y se gasta 5 euros diarios. ¿Al cabo de cuántos días habrá ahorrado 42 euros?
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_16" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. 7 días</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_16" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. 5 días</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_16" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. 6 días</label></div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_16" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. 4 días</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 20rem;">
                                    <div class="card-header">
                                        17. Si la flecha continuase su camino, ¿a qué punto tocaría?
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_17" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. A</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_17" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. B</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_17" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. C</label></div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_17" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. D</label>
                                        </div>
                                        <div class="text-center">
                                            <img src="../img/p17.PNG" alt="MDN" height="115px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 20rem;">
                                    <div class="card-header">
                                        18. MARTILLO es a CLAVO como LLAVE INGLESA es a:
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_18" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Remache</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_18" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Alicate</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_18" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Tuerca</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_18" value="d">
                                            <label class="form-check-label" for="exampleRadios4">D. Enchufe</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 20rem;">
                                    <div class="card-header">
                                        19. Para seguir el orden en que están colocadas, ¿Qué letra pondría a continuación?
                                        <br>
                                        x y a x y c x y e x y g x y ....
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_19" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. K</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_19" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. h</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_19" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. i</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_19" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. j</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 20rem;">
                                    <div class="card-header">
                                        20. Las tres cuartas partes del dinero de Juan son 66 euros, ¿Cuánto dinero tiene Juan?
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_20" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. 99 euros</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_20" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. 90 euros</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_20" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. 88 euros</label></div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_20" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. 80 euros</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 23rem;">
                                    <div class="card-header">
                                        21. Si las cajas son iguales en volumen y peso, y las cadenas de igual resistencia, ¿en cuál es más probable que se rompan las cadenas?
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_21" value="a" required>
                                            <label class="form-check-label" for="respuesta1">A. En el caso A</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_21" value="b">
                                            <label class="form-check-label" for="respuesta2">B. En el caso B</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_21" value="c">
                                            <label class="form-check-label" for="respuesta3">C. En ambos a la vez</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_21" value="d">
                                            <label class="form-check-label" for="respuesta4">D. No se puede saber</label>
                                        </div>
                                        <div class="text-center">
                                            <img src="../img/p21.PNG" alt="MDN" width="320" height="140">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 20rem;">
                                    <div class="card-header">
                                        22. En un viaje de 135 kilómetros de distancia se puede lograr una media de 54 km/hr. Si se sale a las diez de la mañana ¿A qué hora se llegará?
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_22" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. 11:30 horas</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_22" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. 12:45 horas</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_22" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. 12:30 horas</label></div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_22" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. 11:45 horas</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 20rem;">
                                    <div class="card-header">
                                        23. Para seguir el orden en que están colocadas, ¿qué letra pondría a continuación?
                                        <br>
                                        a b a b h i c d c d h i e f ...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_23" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. d </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_23" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. e</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_23" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. f </label></div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_23" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. g</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 20rem;">
                                    <div class="card-header">
                                        24. Si la primera hora de conferencia con el extranjero cuesta 30 euros cada 15 minutos, y en las horas siguientes cuesta 20 euros cada 15 minutos, ¿Cuánto cuesta una conferencia de dos horas y media?
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_24" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. 400 euros</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_24" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. 220 euros</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_24" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. 240 euros</label></div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_24" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. 300 euros</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 20rem;">
                                    <div class="card-header">
                                        25. ¿De qué recipiente saldrá el líquido con más fuerza?
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_25" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Del 1</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_25" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Del 2</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_25" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Del 3</label></div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_25" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. No se puede saber</label>
                                        </div>
                                        <div class="text-center">
                                            <img src="../img/p25.PNG" alt="MDN">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 20rem;">
                                    <div class="card-header">
                                        26. ¿Cuál de las palabras significa lo mismo que AUTÓNOMO?
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_26" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Independiente</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_26" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Anónimo</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_26" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Tranquilo</label></div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_26" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Análogo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 23rem;">
                                    <div class="card-header">
                                        27. ¿Cuántas circunferencias cortan el triángulo en dos y solamente dos lados?
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_27" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. 2 circunferencias</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_27" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. 5 circunferencias</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_27" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. 3 circunferencias</label></div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_27" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. 4 circunferencias</label>
                                        </div>
                                        <div class="text-center">
                                            <img src="../img/p27.PNG" alt="MDN" width="260" height="170">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 20rem;">
                                    <div class="card-header">
                                        28. Comenzamos un viaje a las 10 de la mañana. En la primera hora la velocidad media es de 55 km/hr, y luego esta media va aumentando 5 km/hr cada hora. Al llegar las dos de la tarde, la media comienza a reducirse en 7 km/hr cada hora. ¿Cuál es la media a las 5 de la tarde?
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_28" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. 70 km/hr</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_28" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. 65 km/hr</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_28" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. 49 km/hr</label></div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_28" value="d">
                                            <label class="form-check-label" for="exampleRadios4">D. 56 km/hr</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria"style="height: 28rem;">
                                    <div class="card-header">
                                        29. Sabemos que, en el plano dibujado, el garaje está al oeste de Sevilla. Si usted está en la gasolinera y quiere ir a cargar madera, debería salir hacia el....
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_29" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Norte</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_29" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Sur</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_29" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Este</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_29" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Oeste</label>
                                        </div>
                                        <div class="text-center">
                                            <img src="../img/p29.PNG" alt="MDN" width="260" height="225">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 20rem;">
                                    <div class="card-header">
                                        30. Siguiendo sobre el plano anterior, cuando cargue la madera, para ir a Sevilla deberá salir hacia el...
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_30" value="a" required>
                                            <label class="form-check-label" for="exampleRadios1">A. Noroeste</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_30" value="b">
                                            <label class="form-check-label" for="exampleRadios2">B. Sur</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_30" value="c">
                                            <label class="form-check-label" for="exampleRadios3">C. Sureste</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p1_30" value="d">
                                            <label class="form-check-label" for="exampleRadios3">D. Norte</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <input type="submit" name="enviar" value="Siguiente Bloque"/>
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
    <script src="../js/Tiempo Bloque1.js"></script>
</body>
</html>