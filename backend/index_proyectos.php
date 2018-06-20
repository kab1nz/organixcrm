<?php
 require_once("../bd/conexion.php");
 session_start();
 if(!isset( $_SESSION['nombre'])){
    header("Location: http://localhost/organixcrm/index.php");
}
 $mysqli= new mysqli("localhost","root","root",'empresa'.$_SESSION['bd']);
$usu=$_SESSION["usuario"];
$guidusu=$_SESSION['guidusu'];

if(isset($_GET['bim'])) {
    $bim = $_GET['bim'];
    echo $bim;
    
    $aux = explode(",",$bim);
    
    for($i=0;$i<count($aux);$i++){
        $baja = "call delete_proyectos('$aux[$i]');";
            
        $resultadoBaja = mysqli_query($mysqli,$baja);
        
            if(!$resultadoBaja){
                echo "<br>Fallo la eliminar proyecto = ". mysqli_error($conexion);
            }else{
                echo "<br>Proyecto con GUID -> $aux[$i] ELIMINADO";
            }
    }    


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
    </head>

    <body class="theme-red" style="background: white;">
        <!-- Page Loader -->
        <div class="container">

            <div>
                <label class="mgtopgrande">Empresas</label>
            </div>
            <div class="mgbtngrande">
                <div class="btn btn-danger btn-cons" onclick="openCrearProyecto();">Nuevo proyecto</div>
                <div class="btn btn-danger btn-cons" name="bajaProyecto" id="bajaProyecto">Eliminar proyecto</div>
                <div class="btn btn-danger btn-cons" name="volver" id="volver">Volver</div>

            </div>
            
           
           
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header">
                        <div class="body">
                            <div class="table-responsive" style="    margin-top: 10px;">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nombre</th>
                                            
                                        </tr>
                                        <?php
                                $empresas='select NOMBRE,GUID from PROYECTOS';
                                $result = mysqli_query($mysqli, $empresas);
                                        $cont=0;

                                       while($mostrar=mysqli_fetch_array($result)){

                                        ?>
                                        <tr>
                                        <td>
                                             <input type="checkbox" id="<?php echo $mostrar['GUID']; ?>" name="checkProyecto_<?php echo $cont;?>" value="<?php echo $mostrar['NOMBRE'] ?>"/>
                                             <label for="<?php echo $mostrar['GUID'] ?>">Accept</label>
                                        </td>
                                            <td>
                                            <a href="index_editar_proyecto.php?idproyecto=<?php echo $mostrar['GUID'] ?>">

                                            <?php echo $mostrar['NOMBRE'] ?> </a></td>
                                           

                                        </tr>
                                        <?php
                                        $cont++;    
                                       }
                                        ?>
                                    </thead>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>







            </div>
        </div>

        <!-- Jquery Core Js -->
        <script async="" src="https://www.google-analytics.com/analytics.js"></script>
        <script src="plugins/jquery/jquery.min.js"></script>
        
        <!-- My Script -->
        <script src="js/JSfunciones.js"></script>

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
        <script src="myscript.js"></script>
        <script src="js/querylista.js"></script>


    </body>

    </html>