<?php
    include('../empleado.class.php');
    include('../config.php');
    $id_persona = $_SESSION['id_persona'];
	if (isset($_POST['enviar'])) {
        $data = $_POST;
        $data['id_persona'] = $id_persona;
        $_SESSION['bloque3'] = $data;
        header('Location: test_bateria_inst_4.php');
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
    <title>Bateria para Conductores | Bloque 3</title>
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
                    <form class="col-sm-12" method="POST" action="test_bateria_bloq_3.php">
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        1.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_1" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_1" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_1" value="c">
                                                    <label class="form-check-label" for="respuesta3">C. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_1" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-1.png" alt="bloque3-1" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        2.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_2" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_2" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_2" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_2" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-2.png" alt="bloque3-1" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        3.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_3" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_3" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_3" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_3" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-3.png" alt="bloque3-1" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        4.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_4" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_4" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_4" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_4" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-4.png" alt="bloque3-1" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        5.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_5" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_5" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_5" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_5" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-5.png" alt="bloque3-5" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        6.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_6" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_6" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_6" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_6" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9" text-align="center">
                                                <img src="../img/b3-6.png" alt="bloque3-6" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        7.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_7" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_7" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_7" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_7" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-7.png" alt="bloque3-7" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        8.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_8" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_8" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_8" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_8" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-8.png" alt="bloque3-8" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        9.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_9" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_9" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_9" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_9" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-9.png" alt="bloque3-1" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        10.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_10" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_10" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_10" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_10" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-10.png" alt="bloque3-10" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        11.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_11" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_11" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_11" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_11" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-11.png" alt="bloque3-1" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        12.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_12" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_12" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_12" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_12" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-12.png" alt="bloque3-12" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        13.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_13" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_13" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_13" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_13" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-12.png" alt="bloque3-12" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        14.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_14" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_14" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_14" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_14" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-14.png" alt="bloque3-1" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        15.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_15" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_15" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_15" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_15" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-15.png" alt="bloque3-1" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        16.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_16" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_16" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_16" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_16" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-16.png" alt="bloque3-1" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        17.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_17" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_17" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_17" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_17" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-17.png" alt="bloque3-5" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        18.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_18" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_18" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_18" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_18" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-18.png" alt="bloque3-6" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        19.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_19" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_19" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_19" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_19" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-19.png" alt="bloque3-7" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        20.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_20" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_20" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_20" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_20" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-20.png" alt="bloque3-8" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        21.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_21" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_21" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_21" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_21" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-21.png" alt="bloque3-1" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        22.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_22" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_22" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_22" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_22" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-22.png" alt="bloque3-10" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        23.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_23" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_23" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_23" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_23" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-23.png" alt="bloque3-1" width="260" height="230">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-header">
                                        24.
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-xl-12 col-md-6 mb-12">
                                            <div class="col-xl-3 col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_24" value="a" required>
                                                    <label class="form-check-label" for="respuesta1">A. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_24" value="b">
                                                    <label class="form-check-label" for="respuesta2">B. </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_24" value="c">
                                                    <label class="form-check-label" for="respuesta3">C.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="p3_24" value="d">
                                                    <label class="form-check-label" for="respuesta4">D. </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-9 mb-9">
                                                <img src="../img/b3-24.png" alt="bloque3-12" width="260" height="230">
                                            </div>
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
    <script src="../js/Tiempo Bloque3.js"></script>
</body>
</html>