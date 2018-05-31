<?php
session_start();
$usu=$_SESSION["usuario"];

require_once("../bd/conexion.php");
$bd= new mysqli("localhost","root","root",'empresa'.$_SESSION['bd']);


if(isset($_REQUEST['nombreCategoria'])){
    
//Recogida Datos
$nombre=$_REQUEST['nombreCategoria'];

    
   


       
}

if(isset($_POST['guardarProyecto'])){
    $insertarPRO="call INSERT_PROYECTOS('$nombre','1');";
    $resultado=mysqli_query($bd, $insertarPRO);
    mysqli_next_result($conexion);
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
            <form action="index_crearproyecto.php" method="post" name="form">
            <?php echo "GUID: ". $_SESSION['bd']?>

                <div class="col-md-12">
                    <div class="col-md-11 mgtopgrande">Nueva Categoria</div>
                    <div class="col-md-1"></div>
                    <div class="col-md-8 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" type="text" name="nombreCategoria" placeholder="NOMBRE">
                                <div class="form-group">
                            <div class="form-line">
                                 <select class="form-control w20" id="idproca" name="idproca" placeholder="Proyecto" required>
                                     <option selected disabled value="">Seleccione un Proyecto</option>
                                        <?php
                                            $pais='select CODIGOISO,NOMBRE from paises order by NOMBRE';
                                            $query = mysqli_query($conexion, $pais);                                    
                                    
                                             while( $fila = mysqli_fetch_array($query)){
                                                echo '<option value="'.$fila[0].'">'.$fila[1].'</option>';
                                            }
                                        ?>    
                                </select>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
  
                    <div class="col-md-12">
                        <button class="btn btn-block btn-lg bg-red waves-effect cblanco" name="guardarCategoria" type="submit" onclick="valida_envia()">Guardar</button>
                        <br>
                         <button class="btn btn-block btn-lg bg-red waves-effect cblanco"  name="volver">Volver</button>
                    </div>
                </div>
                    </form>

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