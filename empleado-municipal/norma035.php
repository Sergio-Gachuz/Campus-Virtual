<?php
    include('../empleado.class.php');
    include('../config.php');
    if(isset($_POST['enviar'])){
        $data = $_POST;
        $trabajador->norma_realizada($data);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/inicio.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/Iconos/campus.ico">
    <title>Norma 035</title>
    <style>
        #pregunta {
            outline: none;
            font-size: 18px;
            font-weight: 500;
            border-radius: 12px;
            padding: 6px 15px;
            border: none;
            margin: 0 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: #ffffff;
            color: #080710;
            text-decoration: none;
            justify-content: center;
            margin-bottom: 25px;
            text-align: center;
        }
        input[type="submit"] {
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
        body {
            background-color: #99d6f2;
            background-image: url("../img/Fondo 1.png");
            background-position: center center;
            /* El fonde no se repite */
            background-repeat: no-repeat;
            /* Fijamos la imagen a la ventana para que no supere el alto de la ventana */
            background-attachment: fixed;
            /* El fonde se re-escala automáticamente */
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <img src="../img/Iconos/norma.png" alt="norma">
                    <h4>NORMA 035</h4>
                    <h6>En los últimos 6 meses, ¿ha realizado la norma 035?</h6>
                    <button type="button" id="pregunta" style="background-color: white;" data-bs-toggle="modal" data-bs-target="#modalNorma">Si, ya la realicé.</button>
                    <a id="pregunta" href="cargar_preguntas_norma.html">No, aún no.</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Citas -->
    <div class="modal fade" id="modalNorma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="
                margin: auto;
                background: rgba( 255, 255, 255, 0.55 );
                box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
                backdrop-filter: blur( 11.5px );
                -webkit-backdrop-filter: blur( 11.5px );
                border-radius: 10px;
                border: 1px solid rgba( 255, 255, 255, 0.18 );
                font-family: 'Poppins', sans-serif;
                color: black;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Información sobre Norma 035</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 ms-auto">
                            <form method='POST' action='norma035.php' enctype='multipart/form-data'>
                                <label>Introduce los datos solicitados.</label>
                                <div class='form-group'>
                                    <br>
                                    <label>Fecha en que se realizó</label>
                                    <input type='date' class='form-control' name='fecha' required>
                                </div>
                                <div class='form-group'>
                                    <input type='submit' value='Guardar Información' name="enviar"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/Vanilla-tilt.js"></script>
    <script type="text/javascript">
        VanillaTilt.init(document.querySelectorAll(".card"), {
            max: 10,
            speed: 400
        });
    </script>
</body>
</html>