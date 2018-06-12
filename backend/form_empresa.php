<?php
require_once("../bd/conexion.php");
include_once("../bd/ejecutadorProcedimientos.php");

session_start();
if(!isset( $_SESSION['nombre'])){
    header("Location: http://localhost/organixcrm/index.php");
}
$usu=$_SESSION["usuario"];


if(isset($_REQUEST['nombreEmpresa']) && isset($_REQUEST['nifEmpresa']) && isset($_REQUEST['postalEmpresa']) && isset($_REQUEST['ciudadEmpresa']) && isset($_REQUEST['direccionEmpresa']) && isset($_REQUEST['provinciaEmpresa']) && isset($_REQUEST['paisEmpresa']) && isset($_REQUEST['telefonoEmpresa'])){

//Recogemos los datos 
$nombreEmpresa=$_POST['nombreEmpresa'];
$nifEmpresa=$_POST['nifEmpresa'];
$postalEmpresa=$_POST['postalEmpresa'];
$ciudadEmpresa=$_POST['ciudadEmpresa'];
$direccionEmpresa=$_POST['direccionEmpresa'];
$provinciaEmpresa=$_POST['provinciaEmpresa'];
$paisEmpresa=$_POST['paisEmpresa'];
$telefonoEmpresa=$_POST['telefonoEmpresa'];
    
//Insercción de empresa
$insertarEMP="insert into EMPRESAS (NOMBREFISCAL, NOMBRECOMERCIAL, NIF,HABILITADO,ALIASCRM, FECHADECREACION) values('$nombreEmpresa','$nombreEmpresa','$nifEmpresa',1,'$nombreEmpresa', NOW());";
$resultado0 = mysqli_query($conexion,$insertarEMP);
    
  
mysqli_next_result($conexion);
    
    
//consulta del guid del usuario
$selectnombre = "select guid from empresas where NOMBREFISCAL='$nombreEmpresa'";
$res=mysqli_query($conexion,$selectnombre);
$intent = mysqli_fetch_row($res);
$guidempresas = $intent[0];
echo "El GUID ES -> ".$guidempresas."<br>";    
mysqli_next_result($conexion); //Prepara el siguiente juego de resultados de una llamada 

    
//insercción de relacion 
$guidusu=$_SESSION['guidusu'];
$insertarEMP_USU="insert into usu_empr values('$guidusu','$guidempresas',3)";
$resultado1=mysqli_query($conexion, $insertarEMP_USU);
mysqli_next_result($conexion); //Prepara el siguiente juego de resultados de una llamada 

    
  
//insercion de direccion de empresa    
$insertdire = "call INSERT_DIRECCIONES('$guidempresas',2,'$nombreEmpresa','$direccionEmpresa','$postalEmpresa','$ciudadEmpresa','$provinciaEmpresa','$paisEmpresa');";
$resultado2=mysqli_query($conexion,$insertdire);


    
mysqli_next_result($conexion);
   
    
    
//insertar telefono 78561219M
$insertTELEFONO="call INSERT_TELEFONO('$guidempresas','$nombreEmpresa','$telefonoEmpresa');";
$resultado5=mysqli_query($conexion, $insertTELEFONO);
            

    
    
    
    
    
$resultadoaux=mysqli_query($conexion,"select BDEMPRESA from empresas where ALIASCRM='$nombreEmpresa'");
$intent= mysqli_fetch_row($resultadoaux);
$numbd= $intent[0];
 
mysqli_next_result($conexion); //Prepara el siguiente juego de resultados de una llamada 
mysqli_free_result($resultadoaux);

 $crear="call crear_BDEMPRESA($numbd)";
 $resultadobd = mysqli_query($conexion, $crear);


mysqli_next_result($conexion); //Prepara el siguiente juego de resultados de una llamada                   
addprocedures($numbd);




}

if(isset($_POST['volver'])){
    header("location: index_gestionarempresa.php");
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
            <div class="row">
            <form action="form_empresa.php" method="post" name="form">
                <div class="col-md-12">
                    <div class="col-md-11 mgtopgrande">Nueva Empresa</div>
                    <div class="col-md-1"></div>
                    <div class="col-md-8 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" type="text" name="nombreEmpresa" placeholder="NOMBRE">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" type="text" name="nifEmpresa" placeholder="NIF">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-8 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" type="text" name="direccionEmpresa" placeholder="DIRECCIÓN">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" type="text" name="ciudadEmpresa" placeholder="CIUDAD">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" type="text" name="provinciaEmpresa" placeholder="PROVINCIA">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" type="text" name="postalEmpresa" placeholder="CÓDIGO POSTAL" maxlength="5">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-8 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" type="number" name="telefonoEmpresa" placeholder="TELÉFONO">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                                 <select class="form-control w20" id="pais" name="paisEmpresa" placeholder="PAIS" >
                                     <option selected disabled value="">Seleccione un País</option>
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
                    <div class="col-md-12">
                        <button class="btn btn-block btn-lg bg-red waves-effect cblanco" type="button" onclick="valida_enviaEmpresas()">Guardar</button>
                        <br>
                         <button class="btn btn-block btn-lg bg-red waves-effect cblanco" type="submit" name="volver">Volver</button>
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
        
        
        <!-- My Js -->
        <script type="text/javascript" src="js/funciones.js"></script>


        <!-- Demo Js -->
        <script src="js/demo.js"></script>

        <?php
            mysqli_close($conexion);
        ?>

    </body>

    </html>