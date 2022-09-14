<?php
include('../empleado.class.php');
include('../config.php');
$sexo = $_GET['sexo'];
$altura = $_GET['altura'];
$peso = $_GET['peso'];
$imc = $peso / ($altura * $altura);
$texto = "";
if ($imc >= 25) {
    $texto = "Te sugerimos realizar una cita con nuestro personal de nutrición.";
    $gasto_energetico = 0;
} else {
    if ($sexo == "M") {
        $gasto_energetico = $peso * 35;
    } else {
        $gasto_energetico = $peso * 30;
    }
}
if (1200 <= $gasto_energetico && $gasto_energetico < 1400) {
    $verduras = 5;
    $frutas = 7;
    $cereal = 5;
    $leguminosas = 1;
    $aoa = 3;
    $lacteos = 1;
    $ayg = 5;
}
if (1400 <= $gasto_energetico && $gasto_energetico < 1500) {
    $verduras = 5;
    $frutas = 4;
    $cereal = 5;
    $leguminosas = 1;
    $aoa = 4;
    $lacteos = 2;
    $ayg = 5;
}
if (1500 <= $gasto_energetico && $gasto_energetico < 1600) {
    $verduras = 5.5;
    $frutas = 5;
    $cereal = 6;
    $leguminosas = 1.5;
    $aoa = 5;
    $lacteos = 2;
    $ayg = 5.5;
}
if (1600 <= $gasto_energetico && $gasto_energetico < 1800) {
    $verduras = 6;
    $frutas = 5;
    $cereal = 6;
    $leguminosas = 2;
    $aoa = 5;
    $lacteos = 2;
    $ayg = 6;
}
if (1800 <= $gasto_energetico && $gasto_energetico < 2000) {
    $verduras = 6.5;
    $frutas = 5;
    $cereal = 6.5;
    $leguminosas = 2;
    $aoa = 6;
    $lacteos = 2;
    $ayg = 6.5;
}
if (2000 <= $gasto_energetico && $gasto_energetico < 2500) {
    $verduras = 7.5;
    $frutas = 7;
    $cereal = 7;
    $leguminosas = 2.5;
    $aoa = 8;
    $lacteos = 3;
    $ayg = 7.5;
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
    <title>Recomendaciones Alimentarias</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar">
                    <div class="logo"><a href="#"><img src="../img/logo.png" alt="logo" width="45" height="45" /></a></div>
                    <div class="buttons">
                        <a href='index.php'><img src='../img/Iconos/inicio.png' alt='lista' width='30' height='30' /> Inicio</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <br>
    <div class="container" id="perfil">
        <div class="row">
            <div class="col-sm-6">
                <div class="card" style="height: 30rem;">
                    <div class="card-body">
                        <p>De acuerdo a los datos proporcionados anteriormente, tu Índice de Masa Corporal (IMC) es:</p>
                        <p class="card-text">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2 class="card-title" align="center">Peso</h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <h2 class="card-text"><?php echo $peso; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </p>
                        <p class="card-text">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2 class="card-title" align="center">Estatura</h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <h2 class="card-text"><?php echo $altura; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </p>
                        <hr class="my-2">
                        <p class="card-text">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2 class="card-title" align="center">IMC</h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <h2 class="card-text"><?php echo round($imc, 4); ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <?php
                if ($imc >= 25) {
                    echo "
                            <div class='card' style='height: 30rem;'>
                                <div class='card-body' align='center'>
                                    <h2>¡URGENTE!</h2>
                                    <br>
                                    <img src='../img/Iconos/alerta.png' alt='alerta' width='30%'/>
                                    <p class='card-text'>$texto</p>
                                    <p class='card-text'>Regresa a la página anterior para realizarlo.</p>
                                </div>
                            </div>
                        ";
                } else {
                    echo "
                            <div class='card' style='height: 30rem;'>
                                <div class='card-header'>
                                    Recomendaciones según su IMC
                                </div>
                                <div class='card-body'>
                                    <div class='table-responsive'>
                                        <table class='table table-bordered table-fill' id='dataTable' width='100%' cellspacing='0'>
                                            <thead>
                                                <tr>
                                                    <th>Grupo</th>
                                                    <th>Porción</th>
                                                    <th>Lista</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Verduras</td>
                                                    <td align='center'>$verduras</td>
                                                    <td align='center'>
                                                    <button type='button' class='btn btn-sm' style='height: 30px; margin-left: 10px;' data-bs-toggle='modal' data-bs-target='#modalVer'>
                                                    <img src='../img/Iconos/mas.png' width='25' height='25' alt='ver_lista'/>
                                                </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Frutas</td>
                                                    <td align='center'>$frutas</td>
                                                    <td align='center'>
                                                    <button type='button' class='btn btn-sm' style='height: 30px; margin-left: 10px;' data-bs-toggle='modal' data-bs-target='#modalFru'>
                                                    <img src='../img/Iconos/mas.png' width='25' height='25' alt='ver_lista'/>
                                                </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Cereales</td>
                                                    <td align='center'>$cereal</td>
                                                    <td align='center'>
                                                    <button type='button' class='btn btn-sm' style='height: 30px; margin-left: 10px;' data-bs-toggle='modal' data-bs-target='#modalCer'>
                                                        <img src='../img/Iconos/mas.png' width='25' height='25' alt='ver_lista'/>
                                                    </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Leguminosas</td>
                                                    <td align='center'>$leguminosas</td>
                                                    <td align='center'>
                                                    <button type='button' class='btn btn-sm' style='height: 30px; margin-left: 10px;' data-bs-toggle='modal' data-bs-target='#modalLegu'>
                                                    <img src='../img/Iconos/mas.png' width='25' height='25' alt='ver_lista'/>
                                                </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Alimentos de Origen Animal</td>
                                                    <td align='center'>$aoa</td>
                                                    <td align='center'>
                                                    <button type='button' class='btn btn-sm' style='height: 30px; margin-left: 10px;' data-bs-toggle='modal' data-bs-target='#modalAOA'>
                                                    <img src='../img/Iconos/mas.png' width='25' height='25' alt='ver_lista'/>
                                                </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Lácteos</td>
                                                    <td align='center'>$lacteos</td>
                                                    <td align='center'>
                                                    <button type='button' class='btn btn-sm' style='height: 30px; margin-left: 10px;' data-bs-toggle='modal' data-bs-target='#modalLac'>
                                                    <img src='../img/Iconos/mas.png' width='25' height='25' alt='ver_lista'/>
                                                </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Aceites y Grasas</td>
                                                    <td align='center'>$ayg</td>
                                                    <td align='center'>
                                                    <button type='button' class='btn btn-sm' style='height: 30px; margin-left: 10px;' data-bs-toggle='modal' data-bs-target='#modalAYG'>
                                                    <img src='../img/Iconos/mas.png' width='25' height='25' alt='ver_lista'/>
                                                </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        ";
                }
                ?>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <a id="boton" href="final_habitos.php">Regresar</a>
            </div>
            <div class="col-sm-12">
                <hr class="my-4">
            </div>
        </div>
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

    <!-- Modal DashBoard -->
    <div class="modal fade" id="modalVer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
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
                    <h5 class="modal-title" id="exampleModalLabel">Verduras</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <img src="../img/Tablas/verduras.png" alt="verduras">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalFru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
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
                    <h5 class="modal-title" id="exampleModalLabel">Frutas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <img src="../img/Tablas/frutas.png" alt="verduras">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalCer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
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
                    <h5 class="modal-title" id="exampleModalLabel">Cereales</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <img src="../img/Tablas/cereal.png" alt="verduras" width="80%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalLegu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
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
                    <h5 class="modal-title" id="exampleModalLabel">Leguminosas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <img src="../img/Tablas/legum.png" alt="verduras">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAOA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
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
                    <h5 class="modal-title" id="exampleModalLabel">Alimentos de Origen Animal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <img src="../img/Tablas/carne.png" alt="verduras">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalLac" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
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
                    <h5 class="modal-title" id="exampleModalLabel">Lácteos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <img src="../img/Tablas/leche.png" alt="verduras">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAYG" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
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
                    <h5 class="modal-title" id="exampleModalLabel">Grasas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <img src="../img/Tablas/grasas.png" alt="verduras">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/Vanilla-tilt.js"></script>
    <script type="text/javascript">
        VanillaTilt.init(document.querySelectorAll(".jumbotron"), {
            max: 5,
            speed: 400
        });
    </script>
</body>

</html>