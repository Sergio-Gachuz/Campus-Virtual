<?php
    include('../empleado.class.php');
    include('../config.php');
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
    <title>Bateria para Conductores | Instrucciones Bloque 2</title>
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
                    <div class="card">
                        <div class="card-body">
                            <h2>
                                BLOQUE 2
                                <span>INSTRUCCIONES</span>
                            </h2>
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <p style="text-align: justify;"> El dibujo que hay aqu?? abajo representa una rueda
                                    de un carro con muchos radios, y cada radio se distingue por una letra. En los ejercicios
                                    encontrar?? ruedas m??s peque??as con un solo radio en cuyo centro se ha indicado una letra.
                                    La tarea consiste en determinar si esta letra es la que le corresponde en la rueda grande.
                                </p>
                                <br>
                            </div>
                            <div class="text-center">
                                <img src="../img/b1.png" alt="MDN" width="300" height="300" style="margin-bottom: 10px;">
                            </div>
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <p style="text-align: justify;">
                                    Para contestar deber?? seleccionar SI o NO, dependiendo de si la letra de ese radio corresponde
                                    o no a la del radio de la rueda grande.
                                    <br>
                                    Vea los ejemplos de entrenamiento que vienen aqu?? debajo.
                                </p>
                            </div>
                            <div class="text-center">
                                <img src="../img/b2.PNG" alt="MDN" width="650" height="300" style="margin-bottom: 10px;">
                            </div>
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <p style="text-align: justify;">
                                    <div class="alert" role="alert" style="background-color: #af62b3;">
                                        <img src="../img/Iconos/tiempo.png" width="30" height="30" alt="tiempo"> Tiempo m??ximo: 3 minutos.
                                        <br>
                                        <label>En caso de no terminar a tiempo, deber?? iniciar de nuevo con el test.</label>
                                    </div>
                                </p>
                            </div>
                            <div class="text-center d-grid gap-2">
                                <a href="test_bateria_bloq_2.php" id="boton">Iniciar</a>
                                </br>
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
    <script type="text/javascript" src="../js/Vanilla-tilt.js"></script>
    <script type="text/javascript">
        VanillaTilt.init(document.querySelectorAll("#loading"), {
            max: 40,
            speed: 400
        });
    </script>
</body>
</html>