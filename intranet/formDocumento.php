<?php
require_once("../bd/conexion.php");
session_start();
if(!isset($_SESSION['idcli'])){
    header("Location: http://localhost/organixcrm/index.php");
}
$bd= new mysqli("localhost","root","root", $_SESSION['idcli']);

if(isset($_POST['enviar'])){

    if(isset($_REQUEST['nombreDocumento']) && isset($_REQUEST['sproyecto'])){
    $nombre=$_REQUEST['nombreDocumento'];
    $proyecto=$_REQUEST['sproyecto'];
    $categoria=$_REQUEST['scategoria'];

    $nombrefichero = $_FILES['file']['name'];
    $tipo = $_FILES['file']['type'];
    $tamanio = $_FILES['file']['size'];
    $ruta = $_FILES['file']['tmp_name'];
    $destino="upload/".$nombrefichero;
    $carpeta="upload/";
    opendir($carpeta);
    $desti = $carpeta.$nombrefichero;
    copy($ruta,$desti);
    
 

    
            $insertdoc = "insert into documentos (NOMBRE,IDPROYECTO,IDCATEGORIA,DATOS) values ('$nombre','$proyecto','$categoria','$destino');";
            $docmy=mysqli_query($bd,$insertdoc);
        
           

    
    
        }
}
if(isset($_POST['volver'])){
    header("location: indexCliente.php");
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

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

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

                <form action="formDocumento.php" method="post" enctype="multipart/form-data">

                    <div class="col-md-12" style="margin-top:50px;">
                        <div class="col-md-11 mgtopgrande" style="margin-bottom:30px;">Nuevo documento</div>
                        <div class="col-md-1"></div>
                        <div class="col-md-8 mgtoppeque"  style="margin-bottom:30px;">
                            <div class="form-group">
                                <div class="form-line">
                                    <input class="form-control" type="text" name="nombreDocumento" id="nombreDocumento" placeholder="NOMBRE DOCUMENTO">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mgtoppeque">
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control w20" id="sproyecto" name="sproyecto" required>                         
                             <option selected disabled>Seleccione un proyecto</option>
                             <?php
                              $query= 'select NOMBRE, GUID from proyectos';
                              $resultado =mysqli_query($bd,$query);

                             while( $intent = mysqli_fetch_array($resultado)){

                            

                                echo '<option value="'.$intent[1].'">'.$intent[0].'</option>';
                                }

                                echo "</select></div>"; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6 mgtoppeque"  style="margin-bottom:30px;">
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control w20" id="scategoria" name="scategoria" required>                         
                             <option selected disabled>Seleccione una categoria</option>
                             <?php
                              $query1= 'select NOMBRE, GUID from categoria';
                              $resultado1 =mysqli_query($bd,$query1);

                             while( $intent = mysqli_fetch_array($resultado1)){

                            

                                echo '<option value="'.$intent[1].'">'.$intent[0].'</option>';
                                }

                                echo "</select></div>"; ?>
                            </div>
                        </div>
                        <div class="col-md-6 mgtoppeque">
                            <div class="form-group">
                                <input type="file" name="file" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-block btn-lg bg-red waves-effect cblanco" type="submit" name="enviar" id="enviar">Guardar</button>
                        <br>
                        <button class="btn btn-block btn-lg bg-red waves-effect cblanco" type="button" name="volver">Volver</button>
                    </div>
                </form>
            </div>
            </section>



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