<?php
    include('../staff.class.php');
    include('../config.php');
    $id_persona = $_GET['id_persona'];
    $id_cita = $_GET['id_cita'];
    $data = $residente->paciente_info($id_persona);
    $examen = $residente->ver_examen($id_persona);
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
    <title>Respuestas | Test | Hábitos Alimenticios</title>
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
                        <h2><img src="../img/Iconos/habitos.png" alt="info" width="50"> RESPUESTAS | HÁBITOS ALIMENTICIOS</h2>
                        <hr>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="form-group col-md-4">
                                    <label>1. Seleccione su sexo</label>
                                    <input type="text" class="form-control" readonly placeholder="Masculino / Femenino" name="p1" value="<?php echo $examen['p1']; ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>2. ¿Cuál es su peso actualmente? </label>
                                    <input type="number" class="form-control" readonly placeholder="Kg" name="p2" value="<?php echo $examen['p2']; ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>3. ¿Cuál es su talla?</label>
                                    <input type="number" class="form-control" readonly placeholder="M" name="p3" value="<?php echo $examen['p3']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>4. ¿Cuántos días a la semana consume ceréales?</label>
                                    <input type="number" class="form-control" readonly name="p4" value="<?php echo $examen['p4']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>5. ¿Cuántos días a la semana consume frutas?</label>
                                    <input type="number" class="form-control" readonly name="p5" value="<?php echo $examen['p5']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>6. ¿Cuántos días a la semana consume verduras?</label>
                                    <input type="number" class="form-control" readonly name="p6" value="<?php echo $examen['p6']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>7. ¿Cuántos días a la semana consume legumbres?</label>
                                    <input type="number" class="form-control" readonly name="p7" value="<?php echo $examen['p7']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>8. ¿Cuántos días a la semana consume carnes rojas?</label>
                                    <input type="number" class="form-control" readonly name="p8" value="<?php echo $examen['p8']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>9. ¿Cuántos días a la semana consume carnes blancas?</label>
                                    <input type="number" class="form-control" readonly name="p9" value="<?php echo $examen['p9']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>10. ¿Cuántos días a la semana consume grasas?</label>
                                    <input type="number" class="form-control" readonly name="p10" value="<?php echo $examen['p10']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>11. ¿Cuántos días a la semana consume lácteos?</label>
                                    <input type="number" class="form-control" readonly name="p11" value="<?php echo $examen['p11']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>12. ¿Cuántos días a la semana consume azúcares?</label>
                                    <input type="number" class="form-control" readonly name="p12" value="<?php echo $examen['p12']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>13. ¿Cuántos días a la semana consume alimentos de pastelería y bollería?</label>
                                    <input type="number" class="form-control" readonly name="p13" value="<?php echo $examen['p13']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>14. ¿Cuántas horas al día realiza ejercicio?</label>
                                    <input type="number" class="form-control" readonly name="p14" value="<?php echo $examen['p14']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>15. ¿Cuántos litros de agua consume al día?</label>
                                    <input type="number" class="form-control" readonly name="p15" value="<?php echo $examen['p15']; ?>">
                                </div>
                            </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/Vanilla-tilt.js"></script>
    <script type="text/javascript">
        VanillaTilt.init(document.querySelectorAll("#tarjetas"), {
            max: 5,
            speed: 400
        });
    </script>
</body>
</html>