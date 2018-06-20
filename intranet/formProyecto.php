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
    if(!empty($nombre)){
    $insertarPRO="insert into proyectos (nombre,tipo) values ('$nombre','1');";
    $resultado=mysqli_query($bd, $insertarPRO);
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



        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="../backend/css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red" style="background: white;">
        <!-- Page Loader -->
        <div class="page-loader-wrapper" style="display: none;">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars" style="display: none;"></a>
                    <a class="navbar-brand" href="indexCliente.php">Organix Crm</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                   

                    
                            </div>
                </div>
        </nav>
        <!-- #Top Bar -->
        <section>
            <!-- Left Sidebar -->
            <aside id="leftsidebar" class="sidebar">
                <!-- User Info -->
                <div class="user-info">
                    <div class="image">
                        <img src="img/boss.png" width="48" height="48" alt="User">
                    </div>
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION["emailcliente"]?>
                        </div>
                        <div class="email">
                        <?php echo $_SESSION["emailcliente"]?>
                        </div>
                        <div class="btn-group user-helper-dropdown">
                            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="float:right;">keyboard_arrow_down</i>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="index_home_perfil.php" class=" waves-effect waves-block"><i class="material-icons">person</i>Perfil</a></li>

                                <li><a href="logout.php" class=" waves-effect waves-block"><i class="material-icons">input</i>Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #User Info -->
                <!-- Menu -->

                <div class="menu">
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 517px;">
                        <ul class="list" style="overflow: hidden; width: auto; height: 517px;">
                            <li class="header">MAIN NAVIGATION</li>
                            <li class="active">
                                <a href="indexCliente.php" class="toggled waves-effect waves-block">
                                    <i class="material-icons">home</i>
                                    <span>Proyectos</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="indexCategorias.php" class="toggled waves-effect waves-block">
                                    <i class="material-icons">event</i>
                                    <span>Categorias</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="index.html" class="toggled waves-effect waves-block">
                                    <i class="material-icons">layers</i>
                                    <span>Documentos</span>
                                </a>
                            </li>



                        </ul>
                        <div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 0px; z-index: 99; right: 1px; height: 517px;"></div>
                        <div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                    </div>
                </div>
                <!-- #Menu -->
                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">
                        © 2017 - 2018 <a href="javascript:void(0);">Organix-CRM</a>.
                    </div>
                    <div class="version">
                        <b>Version: </b> 1.0.0
                    </div>
                </div>
                <!-- #Footer -->
            </aside>
            <!-- #END# Left Sidebar -->
        

         <section class="content">
        <div class="container">
            <div class="row">
                <form action="formProyecto.php" method="post" name="form">

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

    </section>

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