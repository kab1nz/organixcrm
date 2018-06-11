<?php
session_start();
$usu=$_SESSION["usuario"];

require_once("../bd/conexion.php");
$bd= new mysqli("localhost","root","root",'empresa'.$_SESSION['bd']);


if(isset($_REQUEST['nombreContacto']) && isset($_REQUEST['nifContacto']) && isset($_REQUEST['postalContacto']) && isset($_REQUEST['ciudadContacto']) && isset($_REQUEST['direccionContacto']) && isset($_REQUEST['provinciaContacto']) && isset($_REQUEST['pais']) && isset($_REQUEST['telefonoContacto'])){
    

        
        

    }

if(isset($_POST['volver'])){
    header("location: index_contactos.php");
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
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Morris Chart Css-->
        <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="css/style.css" rel="stylesheet">
        <link href="scss/estilo.css" rel="stylesheet">


        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="css/themes/all-themes.css" rel="stylesheet" />
        <script type="text/javascript" src="js/funciones.js"></script>

    </head>

    <body class="theme-red" style="background: white;">
        <!-- Page Loader -->
        <div class="container">
            <div class="row">
                <form action="form_documento.php" name="frmFileUpload" id="frmFileUpload" class="dropzone dz-clickable" method="post" enctype="multipart/form-data">

                    <div class="col-md-12">
                        <div class="col-md-11 mgtopgrande">Nuevo documento</div>
                        <div class="col-md-1"></div>
                        <div class="col-md-8 mgtoppeque">
                            <div class="form-group">
                                <div class="form-line">
                                    <input class="form-control" type="text" name="nombreDocumento" placeholder="NOMBRE DOCUMENTO">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mgtoppeque">
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control w20" id="empresa" name="empresa" required>                         
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
                    <div class="col-md-6 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control w20" id="empresa" name="empresa" required>                         
                             <option selected disabled>Seleccione un proyecto</option>
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
                            <input type="file" name="datoDocumento" />
                        </div>
                    </div>
                    </div>
            </div>

            </form>

            <div class="col-md-12">
                <button class="btn btn-block btn-lg bg-red waves-effect cblanco" type="button" onclick="valida_enviaContactos()">Guardar</button>
                <br>
                <button class="btn btn-block btn-lg bg-red waves-effect cblanco" type="submit" name="volver">Volver</button>
            </div>
        </div>
        </div>




        <!-- Jquery Core Js -->
        <script async="" src="https://www.google-analytics.com/analytics.js"></script>
        <script src="plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Select Plugin Js -->
        <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="plugins/node-waves/waves.js"></script>

        <!-- Jquery CountTo Plugin Js -->
        <script src="plugins/jquery-countto/jquery.countTo.js"></script>

        <!-- Morris Plugin Js -->
        <script src="plugins/raphael/raphael.min.js"></script>
        <script src="plugins/morrisjs/morris.js"></script>

        <script src="myscript.js"></script>

        <!-- ChartJs -->
        <script src="plugins/chartjs/Chart.bundle.js"></script>

        <!-- Flot Charts Plugin Js -->
        <script src="plugins/flot-charts/jquery.flot.js"></script>
        <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
        <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
        <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
        <script src="plugins/flot-charts/jquery.flot.time.js"></script>

        <!-- Sparkline Chart Plugin Js -->
        <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

        <!-- Custom Js -->
        <script src="js/admin.js"></script>
        <script src="js/pages/index.js"></script>


        <!-- Demo Js -->
        <script src="js/demo.js"></script>

        <?php
            mysqli_close($conexion);
        ?>



    </body>

    </html>