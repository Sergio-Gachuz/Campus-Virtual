<?php
    include('../empleado.class.php');
    include('../config.php');
    $id_persona = $_SESSION['id_persona'];
    
    if (isset($_POST['guardar_examen'])) {
        $data = $_POST;
        $data['id_persona'] = $id_persona;
        $trabajador->habitos_alimenticios($data);
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
    <title>Test | Hábitos Alimenticios</title>
    <style>
        body{
            background-image: url("../img/Fondo 2.png");
            background-position: center center;
            /* El fonde no se repite */
            background-repeat: no-repeat;
            /* Fijamos la imagen a la ventana para que no supere el alto de la ventana */
            background-attachment: fixed;
            /* El fonde se re-escala automáticamente */
            background-size: cover;
        }
        input[type="number"], input[type="text"] {
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
        input[type=submit]{
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
                            <h2> <img src='../img/Iconos/habitos.png' alt='habitos' width='50'> TEST DE HÁBITOS ALIMENTICIOS</h2>
                            <hr class="my-2">
                            <h4>INDICACIONES</h4>
                            <p style="text-align: justify;">
                                La salud y bienestar siempre han sido muy importantes para el desempeño en el ámbito laboral. 
                                Con este test, sabremos si tus hábitos alimenticios son correctos en caso de posteriormente
                                agendar una cita y además recibirás sugerencias para mejorarlos.
                            </p>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="test_habitos_alimenticios.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>1. Seleccione su sexo</label>
                                    <select name="p1" class="form-control" required 
                                        style="display: block;
                                        height: 50px;
                                        width: 100%;
                                        background-color: rgba(255, 255, 255, 0.671);
                                        border-radius: 3px;
                                        padding: 0 10px;
                                        margin-top: 8px;
                                        font-size: 14px;
                                        font-weight: 300;">
                                        <option value="">Seleccionar</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>2. ¿Cuál es su peso actualmente? </label>
                                    <input type="number" step="0.01" class="form-control" placeholder="Escribir en kilogramos. Ej: 70.5" name="p2" required>
                                </div>
                                <div class="form-group">
                                    <label>3. ¿Cuál es su talla?</label>
                                    <input type="number" step="0.01" class="form-control" placeholder="Escribir en metros. Ej: 1.70" name="p3" required>
                                </div>
                                <div class="row g-3">
                                    <div class="form-group col-md-6">
                                        <label>4. ¿Cuántos días a la semana consume cereales?</label>
                                        <input type="number" class="form-control" name="p4" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>5. ¿Cuántos días a la semana consume frutas?</label>
                                        <input type="number" class="form-control" name="p5" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>6. ¿Cuántos días a la semana consume verduras?</label>
                                        <input type="number" class="form-control" name="p6" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>7. ¿Cuántos días a la semana consume legumbres?</label>
                                        <input type="number" class="form-control" name="p7" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>8. ¿Cuántos días a la semana consume carnes rojas?</label>
                                        <input type="number" class="form-control" name="p8" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>9. ¿Cuántos días a la semana consume carnes blancas?</label>
                                        <input type="number" class="form-control" name="p9" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>10. ¿Cuántos días a la semana consume grasas?</label>
                                        <input type="number" class="form-control" name="p10" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>11. ¿Cuántos días a la semana consume lácteos?</label>
                                        <input type="number" class="form-control" name="p11" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>12. ¿Cuántos días a la semana consume azúcares?</label>
                                        <input type="number" class="form-control" name="p12" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>13. ¿Cuántos días a la semana consume alimentos de pastelería y bollería?</label>
                                        <input type="number" class="form-control" name="p13" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>14. ¿Cuántas horas al día realiza ejercicio?</label>
                                        <input type="number" class="form-control" name="p14" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>15. ¿Cuántos litros de agua consume al día?</label>
                                        <input type="number" class="form-control" name="p15" required>
                                    </div>
                                </div>
                                <input type="submit" name="guardar_examen" value="Finalizar"/>
                            </form>
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
    <script type="text/javascript" src="../js/Vanilla-tilt.js"></script>
    <script type="text/javascript">
        VanillaTilt.init(document.querySelectorAll("#loading"), {
            max: 40,
            speed: 400
        });
    </script>
</body>
</html>