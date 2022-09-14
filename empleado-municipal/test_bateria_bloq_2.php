<?php
    include('../empleado.class.php');
    include('../config.php');
    $id_persona = $_SESSION['id_persona'];
	if (isset($_POST['enviar'])) {
        $data = $_POST;
        $data['id_persona'] = $id_persona;
        $_SESSION['bloque2'] = $data;
        header('Location: test_bateria_inst_3.php');
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
    <title>Bateria para Conductores | Bloque 2</title>
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
                    <form class="col-sm-12" method="POST" action="test_bateria_bloq_2.php">
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        1. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_1" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_1" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb1.PNG" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        2. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_2" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_2" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb2.PNG" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        3. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_3" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_3" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb3.PNG" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        4. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_4" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_4" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb4.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        5. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_5" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_5" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb5.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        6. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_6" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_6" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb6.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        7. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_7" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_7" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb7.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        8. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_8" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_8" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb8.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        9. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_9" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_9" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb9.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        10. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_10" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_10" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb10.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        11. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_11" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_11" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb11.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        12. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_12" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_12" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb12.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        13. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_13" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_13" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb13.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        14. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_14" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_14" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb14.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        15. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_15" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_15" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb15.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        16. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_16" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_16" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb16.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        17. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_17" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_17" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb17.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        18. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_18" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_18" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb18.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        19. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_19" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_19" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb19.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        20. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_20" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_20" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb20.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        21. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_21" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_21" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb21.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        22. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_22" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_22" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb22.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        23. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_23" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_23" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb23.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        24. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_24" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_24" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb24.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        25. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_25" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_25" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb25.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        26. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_26" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_26" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb26.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        27. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_27" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_27" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb27.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        28. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_28" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_28" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb28.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        29. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_29" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_29" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb29.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        30. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_30" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_30" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb30.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        31. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_31" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_31" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb31.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        32. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_32" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_32" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb32.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        33. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_33" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_33" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb33.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        34. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_34" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_34" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb34.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        35. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_35" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_35" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb35.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria">
                                    <div class="card-body text-center">
                                        <img src="../img/b1.png" alt="MDN" class="circulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bateria" style="height: 26rem;">
                                    <div class="card-header">
                                        36. 
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_36" value="Si" required>
                                            <label class="form-check-label" for="respuesta1">A. Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p2_36" value="No">
                                            <label class="form-check-label" for="respuesta2">B. No</label>
                                        </div> 
                                        <div class="text-center">
                                            <img src="../img/bb36.png" alt="MDN" width="278" height="278">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </
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
    <script src="../js/Tiempo Bloque2.js"></script>
</body>
</html>