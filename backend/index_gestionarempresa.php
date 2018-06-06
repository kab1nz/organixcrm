<?php
require_once("../bd/conexion.php");

session_start();
$usu=$_SESSION["usuario"];
$guidusu=$_SESSION['guidusu'];

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
                <div class="btn btn-danger btn-cons" onclick="openCrearEmpresa();">Nueva empresa</div>
                <div class="btn btn-danger btn-cons">Eliminar empresa</div>
            </div>
            <div class="col-md-12 form-group form-group-default input-group focused border" style="overflow: visible"><label>Búsqueda</label>
                <input class="form-control" type="text" placeholder="Búsqueda" id="_oq4nsw">
                <span class="input-group-addon" title="Búsqueda avanzada">
           
</span></div>
            <div class="col-md-10">
                
            </div>
            <div class="col-md-2 ">
                <img src="images/export-file.svg" class="fderequince " style="    margin-left: 10px;">
                <img src="images/font-selection-editor.svg" class="fderequince ">
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
                                            <th>Dirección</th>
                                            <th>Ciudad</th>
                                            <th>Provincia</th>
                                            <th>País</th>
                                            <th>Activa</th>
                                        </tr>
                                        <?php
                                $empresas='select NOMBREFISCAL,GUIDEMPRESA, DIRECCION, HABILITADO, POBLACION, PROVINCIA, IDPAIS from usu_empr, empresas, direcciones where GUIDUSUARIO="'.$guidusu.'" and GUIDEMPRESA=empresas.GUID and GUIDEMPRESA=IDASOCIADO';
                                $result = mysqli_query($conexion, $empresas);
                                        if(!$result){
                                            echo "ERROR -> " . mysqli_error($conexion);
                                        }
                                        
                                       while($mostrar=mysqli_fetch_array($result)){

                                        ?>

                                        <tr>

                                        <td>
                                             <input type="checkbox" id="<?php echo $mostrar['NOMBREFISCAL'] ?>" name="checkEmpresa[]" value="checked" />
                                             <label for="checkbox">Accept</label>
                                        </td>
                                        

                                          <td><a href="index_editar_empresa.php?idempresa=<?php echo $mostrar['GUIDEMPRESA'] ?>"><?php echo $mostrar['NOMBREFISCAL'] ?> </a></td>
                                            <td><?php echo $mostrar['DIRECCION'] ?></td>
                                            <td><?php echo $mostrar['POBLACION'] ?></td>
                                            <td><?php echo $mostrar['PROVINCIA'] ?></td>
                                            <td><?php echo $mostrar['IDPAIS'] ?></td>
                                            <td> <?php if($mostrar['HABILITADO']==0){echo "SI";}else{echo "NO";} ?></td>
                                           

                                        </tr>

                                        <?php
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