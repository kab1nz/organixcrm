<?php
session_start();
$usu=$_SESSION["usuario"];

$country=mysqli_connect('localhost','root','root','comun') or die(mysqli_error());
$bd=mysqli_connect('localhost','root','root','empresa55') or die(mysqli_error());


if(isset($_REQUEST['nombreContacto']) && isset($_REQUEST['nifContacto']) && isset($_REQUEST['postalContacto']) && isset($_REQUEST['ciudadContacto']) && isset($_REQUEST['direccionContacto']) && isset($_REQUEST['provinciaContacto']) && isset($_REQUEST['pais']) && isset($_REQUEST['telefonoContacto'])){
    
//Recogida Datos
$nombre=$_REQUEST['nombreContacto'];
$nif=$_REQUEST['nifContacto'];
$postal=$_REQUEST['postalContacto'];
$ciudad=$_REQUEST['ciudadContacto'];
$direccion=$_REQUEST['direccionContacto'];
$provincia=$_REQUEST['provinciaContacto'];
$paisContacto=$_REQUEST['pais'];
$telefono=$_REQUEST['telefonoContacto'];
    
   


        //comprobar usuario exisente
        $comprobacion = "select * from CONTACTOS where CIF = '$nif'";
        $resultado=mysqli_query($bd,$comprobacion);
        $cont= mysqli_num_rows($resultado);

        if($cont>=1){
            $existcontacto=true;
        }else{
        //Insercción de contacto
        $insertarCONTACTOS="call insert_contacto('$nombre','$nif');";
        $resultado2=mysqli_query($bd, $insertarCONTACTOS);
    
        //GUID del contacto
        $selectGUID="select * from Contactos where CIF='$nif'";
        $resultado3=mysqli_query($bd, $selectGUID);
        $array1=mysqli_fetch_row($resultado3);
        echo "La GUID es = $array1[0]";
            
        //insertar direccion
        $insertDIRECCION="call INSERT_DIRECCIONES('$array1[0]','$nombre','$direccion','$postal','$ciudad','$provincia','$paisContacto');";    
        $resultado4=mysqli_query($bd, $insertDIRECCION);
            
        if(!$resultado4){
            echo "<br>La direccion fallo";
        }else{
            echo "<br>direccion insertada";
        }
            
        //insertar telefono 78561219M
        $insertTELEFONO="call INSERT_TELEFONOS('$array1[0]','$nombre','$telefono');";
        $resultado5=mysqli_query($bd, $insertTELEFONO);
            
            if(!$resultado5){
                echo "<br>el telefono fallo = ". mysqli_error($bd);
            }else{
                echo "<br>telefono insertado";
            }
                     
        }
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
            <form action="form_contacto.php" method="post" name="form">
           
                <div class="col-md-12">
                    <div class="col-md-11 mgtopgrande">Nuevo Contacto</div>
                    <div class="col-md-1"></div>
                    <div class="col-md-8 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" type="text" name="nombreContacto" placeholder="NOMBRE">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" type="text" name="nifContacto" placeholder="NIF" onChange="javascript:while(''+this.value.charAt(0) ==' ')this.value=this.value.substring(1,this.value.length);">
                                <?php
                                    if(isset($existcontacto) && $existcontacto==true){
                                        echo '<spam class="error">Ya existe este NIF</spam>';                            
                                    }
                                ?>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-8 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" type="text" name="direccionContacto" placeholder="DIRECCIÓN">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" type="text" name="ciudadContacto" placeholder="CIUDAD">
                            </div>
                        </div>
                    </div>
                    



                    <div class="col-md-8 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" type="number" name="telefonoContacto" placeholder="TELÉFONO">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" type="text" name="postalContacto" placeholder="CÓDIGO POSTAL">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" type="text" name="provinciaContacto" placeholder="PROVINCIA">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control w20" id="pais" name="pais" placeholder="PAIS" required>
                                     <option selected disabled value="">Seleccione un País</option>
                                        <?php
                                            $pais='select CODIGOISO,NOMBRE from paises order by NOMBRE';
                                            $query = mysqli_query($country, $pais);                                    
                                    
                                             while( $fila = mysqli_fetch_array($query)){
                                                echo '<option value="'.$fila[0].'">'.$fila[1].'</option>';
                                            }
                                        ?>    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-block btn-lg bg-red waves-effect cblanco" type="button" onclick="valida_envia()">Guardar</button>
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
        

        <!-- Demo Js -->
        <script src="js/demo.js"></script>


    </body>

    </html>