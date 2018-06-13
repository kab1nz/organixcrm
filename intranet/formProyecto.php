<?php
session_start();
if(!isset( $_SESSION['idcli'])){
    header("Location: http://localhost/organixcrm/index.php");
}
$usu=$_SESSION["usuario"];

require_once("../bd/conexion.php");
$bd= new mysqli("localhost","root","root",$_SESSION['idcli']);


if(isset($_REQUEST['nombreProyecto'])){
    
//Recogida Datos
$nombre=$_REQUEST['nombreProyecto'];

    
   


       
}
if(isset($_POST['guardarProyecto'])){
    $insertarPRO="insert into proyectos (nombre,tipo) values ('$nombre','1');";
    $resultado=mysqli_query($bd, $insertarPRO);
   
}

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Welcome To | ORGANIXCRM</title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- Bootstrap Core Css -->
        <link href="../backend/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="../backend/plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="../backend/plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Morris Chart Css-->
        <link href="../backend/plugins/morrisjs/morris.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="../backend/css/style.css" rel="stylesheet">
        <link href="../backend/css/estilo.css" rel="stylesheet">


    </head>

    <body class="theme-red" style="background: white;">
        <!-- Page Loader -->
        <div class="container">
            <div class="row">
                <form action="index_crearproyecto.php" method="post" name="form">

                    <div class="col-md-12 mgtopgrande">
                        <div class="col-md-11 " style="margin-top:50px;">Nuevo Proyecto</div>
                        <div class="col-md-1"></div>
                        <div class="col-md-8 mgtoppeque">
                            <div class="form-group">
                                <div class="form-line">
                                    <input class="form-control" type="text" name="nombreProyecto" style="margin-top:25px;" placeholder="NOMBRE">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-block btn-lg bg-red waves-effect cblanco" name="guardarProyecto" type="submit" onclick="valida_envia();">Guardar</button>
                            <br>
                        </div>
                    </div>
                </form>
                <div class="col-md-12">
                    <div class="col-md-12" style="margin-top:10px;">
                        <button class="btn btn-block btn-lg bg-red waves-effect cblanco" id="volver" name="volver ">Volver</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Jquery Core Js -->
        <script async="" src="https://www.google-analytics.com/analytics.js"></script>
        <script src="../backend/plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="../backend/plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Select Plugin Js -->
        <script src="../backend/plugins/bootstrap-select/js/bootstrap-select.js"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="../backend/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- My Script -->

        <!-- Waves Effect Plugin Js -->
        <script src="../backend/plugins/node-waves/waves.js"></script>

        <!-- Jquery CountTo Plugin Js -->
        <script src="../backend/plugins/jquery-countto/jquery.countTo.js"></script>

        <!-- Morris Plugin Js -->
        <script src="../backend/plugins/raphael/raphael.min.js"></script>
        <script src="../backend/plugins/morrisjs/morris.js"></script>

        <!-- ChartJs -->
        <script src="../backend/plugins/chartjs/Chart.bundle.js"></script>

        <!-- Flot Charts Plugin Js -->
        <script src="../backend/plugins/flot-charts/jquery.flot.js"></script>
        <script src="../backend/plugins/flot-charts/jquery.flot.resize.js"></script>
        <script src="../backend/plugins/flot-charts/jquery.flot.pie.js"></script>
        <script src="../backend/plugins/flot-charts/jquery.flot.categories.js"></script>
        <script src="../backend/plugins/flot-charts/jquery.flot.time.js"></script>

        <!-- Sparkline Chart Plugin Js -->
        <script src="../backend/plugins/jquery-sparkline/jquery.sparkline.js"></script>

        <!-- Custom Js -->
        <script src="../backend/js/admin.js"></script>
        <script src="../backend/js/pages/index.js"></script>

        <!-- Demo Js -->
        <script src="../backend/js/demo.js"></script>


    </body>

    </html>