<?php
include('../empleado.class.php');
include('../config.php');
$rol = $trabajador->validar_rol(array('Administrador', 'Enlace'));
$Object = new DateTime();
$Date = $Object->format("Y") . "-01";
if (isset($_POST['enviar_datos'])) {
    $data = $_POST;
    $trabajador->registro_accidentes($data);
}
$id_direccion = $_SESSION['id_direccion'];
$connect = mysqli_connect("localhost", "root", "", "campus");
$query = "SET lc_time_names = 'es_MX'";
mysqli_query($connect, $query);

$sql = "SELECT MONTHNAME(fecha) AS mes, cantidad FROM accidente WHERE id_direccion = $id_direccion AND YEAR(fecha) = YEAR(NOW()) ORDER BY MONTH(fecha)";
$result = mysqli_query($connect, $sql);
$chart_data = '';
while ($row = mysqli_fetch_array($result)) {
    $chart_data .= "{ mes: '" . $row["mes"] . "', cantidad: " . $row["cantidad"] . "}, ";
}
$chart_data = substr($chart_data, 0, -2);

$consulta = "SELECT d.descripcion AS nombre, SUM(a.cantidad) AS total FROM accidente a INNER JOIN direccion d ON a.id_direccion = d.id_direccion WHERE YEAR(fecha) = YEAR(NOW()) GROUP BY a.id_direccion ORDER BY SUM(a.cantidad) DESC";
$result = mysqli_query($connect, $consulta);
$chart_data2 = '';
while ($row = mysqli_fetch_array($result)) {
    $chart_data2 .= "{ Direccion: '" . $row["nombre"] . "', Total: " . $row["total"] . "}, ";
}
$chart_data2 = substr($chart_data2, 0, -2);

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

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <link rel="shortcut icon" href="../img/Iconos/campus.ico">
    <title>Dashboard | Accidentes</title>
</head>

<body>
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
                        <div class="row">
                            <div class="col-sm-7">
                                <h2><img src='../img/Iconos/accidente.png' alt='accidentes' width='50'> REGISTRO DE ACCIDENTES</h2>
                                <p style="text-align: justify;">
                                    Tener un control y registro de los accidentes, permite generar un análisis y
                                    determinar acciones preventivas.
                                </p>
                                <p style="text-align: justify;">
                                    Por consiguiente, es necesario registrar el número de accidentes de su respectiva
                                    dirección, que se sucitaron durante el mes.
                                </p>
                            </div>
                            <div class="col-sm-5" align="center">
                                <form method="POST" action="estadisticas_accidentes.php">
                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="Cantidad de accidentes" name="cantidad" min="0">
                                    </div>
                                    <div class="form-group">
                                        <input type="month" class="form-control" name="fecha" min="<?php echo $Date ?>">
                                    </div>
                                    <input type="submit" id="accidentes" name="enviar_datos" value="Registrar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <h2><img src='../img/Iconos/dashboard.png' alt='accidentes' width='50'> ACCIDENTES DURANTE EL AÑO</h2>
                        <div class="row">
                            <div id="chart"></div>
                        </div>
                    </div>
                </div>
                <?php
                if ($rol == 'Enlace') {
                    echo " 
                        <br>
                        <div class='card'>
                            <div class='card-body'>
                                <h2><img src='../img/Iconos/dashboard.png' alt='estadistica' width='50'> ACCIDENTES POR DIRECCIÓN DURANTE EL AÑO</h2>
                                <div class='row'>
                                    <div id='chart2'></div>
                                </div>
                            </div>
                        </div>
                    ";
                }
                ?>

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
    <script>
        new Morris.Bar({
            element: 'chart',
            data: [<?php echo $chart_data; ?>],
            xkey: 'mes',
            ykeys: ['cantidad'],
            labels: ['cantidad'],
            hideHover: 'auto',
            stacked: true,
            barColors: ['#af62b3'],
            gridTextColor: '#000000',
            resize: true
        });
        new Morris.Bar({
            element: 'chart2',
            data: [<?php echo $chart_data2; ?>],
            xkey: 'Direccion',
            ykeys: ['Total'],
            labels: ['Total'],
            hideHover: 'auto',
            stacked: true,
            barColors: ['#af62b3'],
            gridTextColor: '#000000',
            resize: true
        });
    </script>
</body>

</html>