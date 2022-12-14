<?php
    include('../empleado.class.php');
    include('../config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/empleado.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://www.clubdesign.at/floatlabels.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
    <script src="../js/Datos Guia 1.js"></script>
    <script src="../js/Datos Guia 2.js"></script>
    <script src="../js/Datos Guia 3.js"></script>
    <link rel="shortcut icon" href="../img/Iconos/campus.ico">
    <title>Dashboard | Norma 035</title>
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
                        <h2><img src="../img/Iconos/dashboard.png" alt="historico" width="50"> DASHBOARD | NORMA 035</h2>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="tomo1-tab" data-toggle="tab" href="#tomo1" role="tab" aria-controls="tomo1" aria-selected="true" style="text-decoration: none; color: black;">Gu??a de Referencia I</a>
                                <a class="nav-item nav-link" id="tomo2-tab" data-toggle="tab" href="#tomo2" role="tab" aria-controls="tomo2" aria-selected="false" style="text-decoration: none; color: black;">Gu??a de Referencia II</a>
                                <a class="nav-item nav-link" id="tomo3-tab" data-toggle="tab" href="#tomo3" role="tab" aria-controls="tomo3" aria-selected="false" style="text-decoration: none; color: black;">Gu??a de Referencia III</a>
                            </div>
                        </nav>
                        <br>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="tomo1" role="tabpanel" aria-labelledby="tomo1-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <canvas id="tomo_1"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h2><img src="../img/Iconos/listado.png" alt="historico" width="50"> EMPLEADOS SIN REALIZAR TEST</h2>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-fill" id="dataTable" width="100%" cellspacing="0">
                                                        <?php
                                                        $personal = $trabajador->personas_sin_realizar_normaI($_SESSION['id_direccion']);
                                                        if(empty($personal)){
                                                            echo "<label>Todos los empleados de la direcci??n han realizado el test</label>";
                                                        }else{
                                                            $i = 1;
                                                            echo "<thead>";
                                                            echo "<tr>";
                                                            echo "<th>#</th>";
                                                            echo "<th>Nombre</th>";
                                                            echo "<th>Tel??fono</th>";
                                                            echo "</tr>";
                                                            echo "</thead>";
                                                            foreach ($personal as $clave => $personas) {
                                                                echo "<tbody class='table-hover'>";
                                                                echo "<tr>";
                                                                echo "<td>" . $i++ . "</td>";
                                                                echo "<td>" . $personas['nombre'] . "</td>";
                                                                echo "<td>" . $personas['telefono'] . "</td>";
                                                                echo "</tr>";
                                                            }
                                                            echo "</tbody>";
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tomo2" role="tabpanel" aria-labelledby="tomo2-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <canvas id="tomo_2"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h2><img src="../img/Iconos/listado.png" alt="historico" width="50"> EMPLEADOS SIN REALIZAR TEST</h2>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-fill" id="dataTable" width="100%" cellspacing="0">
                                                        <?php
                                                        $personal = $trabajador->personas_sin_realizar_normaII($_SESSION['id_direccion']);
                                                        if(empty($personal)){
                                                            echo "<label>Todos los empleados de la direcci??n han realizado el test</label>";
                                                        }else{
                                                            $i = 1;
                                                            echo "<thead>";
                                                            echo "<tr>";
                                                            echo "<th>#</th>";
                                                            echo "<th>Nombre</th>";
                                                            echo "<th>Tel??fono</th>";
                                                            echo "</tr>";
                                                            echo "</thead>";
                                                            foreach ($personal as $clave => $personas) {
                                                                echo "<tbody class='table-hover'>";
                                                                echo "<tr>";
                                                                echo "<td>" . $i++ . "</td>";
                                                                echo "<td>" . $personas['nombre'] . "</td>";
                                                                echo "<td>" . $personas['telefono'] . "</td>";
                                                                echo "</tr>";
                                                            }
                                                            echo "</tbody>";
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tomo3" role="tabpanel" aria-labelledby="tomo3-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <canvas id="tomo_3"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h2><img src="../img/Iconos/listado.png" alt="historico" width="50"> EMPLEADOS SIN REALIZAR TEST</h2>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-fill" id="dataTable" width="100%" cellspacing="0">
                                                        <?php
                                                        $personal = $trabajador->personas_sin_realizar_normaIII($_SESSION['id_direccion']);
                                                        if(empty($personal)){
                                                            echo "<label>Todos los empleados de la direcci??n han realizado el test</label>";
                                                        }else{
                                                            $i = 1;
                                                            echo "<thead>";
                                                            echo "<tr>";
                                                            echo "<th>#</th>";
                                                            echo "<th>Nombre</th>";
                                                            echo "<th>Tel??fono</th>";
                                                            echo "</tr>";
                                                            echo "</thead>";
                                                            foreach ($personal as $clave => $personas) {
                                                                echo "<tbody class='table-hover'>";
                                                                echo "<tr>";
                                                                echo "<td>" . $i++ . "</td>";
                                                                echo "<td>" . $personas['nombre'] . "</td>";
                                                                echo "<td>" . $personas['telefono'] . "</td>";
                                                                echo "</tr>";
                                                            }
                                                            echo "</tbody>";
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
</body>
</html>