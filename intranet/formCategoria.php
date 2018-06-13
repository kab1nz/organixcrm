<?php
session_start();
if(!isset( $_SESSION['idcli'])){
    header("Location: http://localhost/organixcrm/index.php");
}
$usu=$_SESSION["usuario"];

require_once("../bd/conexion.php");
$bd= new mysqli("localhost","root","root",$_SESSION['idcli']);


if(isset($_REQUEST['nombreCategoria'])){
    
//Recogida Datos
$nombre=$_REQUEST['nombreCategoria'];

    
   


       
}

if(isset($_POST['guardarCategoria'])){
    $proyecto = $_REQUEST['idproye'];
    $guidpro = "select GUID from proyectos where NOMBRE='$proyecto'";
    $resultado1 = mysqli_query($bd,$guidpro);
    $guidresult=mysqli_fetch_row($resultado1);
    mysqli_next_result($bd);
    $categoria = $_REQUEST['idproca'];
    $guidpro = "select GUID from categoria where NOMBRE='$categoria'";
    $resultado1 = mysqli_query($bd,$guidpro);
    $guidresult1=mysqli_fetch_row($resultado1);
    if($categoria)
    $insertarPRO="call INSERT_CATEGORIAS('$nombre','$guidresult[0]','$guidresult1[0]');";

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
            <form action="formCategoria.php" method="post" name="form">

<section class="content">
                <div class="col-md-12">
                    <div class="col-md-11 mgtopgrande" style="margin-bottom:10px;">Nueva Categoria</div>
                    <div class="col-md-1"></div>
                    <div class="col-md-8 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                            <select class="form-control w20" id="idproye" name="idproye" style="margin-bottom:10px;" placeholder="Proyecto" required>
                                     <option selected disabled value="">Seleccione un Proyecto</option>
                                        <?php
                                            
                                            $PRO='select NOMBRE,GUID from proyectos order by NOMBRE';
                                            $query = mysqli_query($bd, $PRO);                                    
                                    
                                             while( $fila = mysqli_fetch_array($query)){
                                                echo '<option value="'.$fila[0].'">'.$fila[0].'</option>';
                                            }
                                        ?>    
                                </select>
                                <select class="form-control w20" id="idproca" name="idproca" placeholder="Proyecto" >
                                     <option selected disabled value="">Seleccione una Categoria</option>
                                        <?php
                                            
                                            $CAT='select NOMBRE,GUID from categoria order by NOMBRE';
                                            $query = mysqli_query($bd, $CAT);                                    
                                    
                                             while( $fila = mysqli_fetch_array($query)){
                                                echo '<option value="'.$fila[0].'">'.$fila[0].'</option>';
                                            }
                                        ?>    
                                </select>
                                <input class="form-control" type="text" name="nombreCategoria" placeholder="NUEVA CATEGORIA" >
                                <div class="form-group">
                           
                        </div>
                            </div>
                        </div>
                    </div>
  
                    <div class="col-md-12">
                        <button class="btn btn-block btn-lg bg-red waves-effect cblanco" name="guardarCategoria" type="submit" onclick="valida_envia();">Guardar</button>
                        <br>
                    </div>
                </div>
                    </form>
                    <div class="col-md-12">
                    <div class="col-md-12" style="margin-top:10px;">
                    <button class="btn btn-block btn-lg bg-red waves-effect cblanco" id="volver"  name="volver ">Volver</button>
                    </div>
                    </div>
                                        </section>
                </div>
            </div>

        

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