<?php
session_start();
if(!isset( $_SESSION['nombre'])){
    header("Location: http://localhost/organixcrm/index.php");
}
$usu=$_SESSION["usuario"];

require_once("../bd/conexion.php");
$bd= new mysqli("localhost","root","root",'empresa'.$_SESSION['bd']);


if(isset($_REQUEST['nombreCategoria'])){
    
//Recogida Datos
$nombre=$_REQUEST['nombreCategoria'];

    
   


       
}

if(isset($_REQUEST['idproye'])  && isset($_REQUEST['nombreCategoria'])){

    
    $proyecto = $_REQUEST['idproye'];
    $guidpro = "select GUID from proyectos where NOMBRE='$proyecto'";
    
    if(isset($_REQUEST['idproca'])){
        
            $categoriapadre=$_REQUEST['idproca'];

    }else{
        $categoriapadre="null";
    }

    $resultado1 = mysqli_query($bd,$guidpro);
    $guidresult=mysqli_fetch_row($resultado1);

    
    if($categoriapadre !="null"){

        
         $insertarPRO="call INSERT_CATEGORIAS('$nombre','$guidresult[0]','$categoriapadre');";

    $resultado=mysqli_query($bd, $insertarPRO);

    }else{
        $insertarPRO="call INSERT_CATEGORIAS('$nombre','$guidresult[0]','');";
            echo "categoria normal";

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
    <!-- Google Fonts -->
    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />


    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">



    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
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
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars" style="display: none;"></a>
                <a class="navbar-brand" href="index_backend.php">Organix Crm</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-left" style="    margin-left: 143px;">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">dashboard</i>
                            <!--      <span class="label-count">8</span> -->
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">EMPRESAS</li>
                            <li class="body">
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 254px;">
                                    <ul class="menu" style="overflow: hidden; width: auto; height: 254px;">
                                        
                                        <?php
                                            $sql= 'select GUID from Usuarios where username ="'.$_SESSION["email"].'"';
                                            $resultado = mysqli_query($conexion, $sql);
                                            $intent= mysqli_fetch_row($resultado);
                                            $guidusu= $intent[0];
                                            //echo "El GUID ES: ".$guidusu;
                                           $empresas='select NOMBREFISCAL,BDEMPRESA from usu_empr, empresas where GUIDUSUARIO="'.$guidusu.'" and GUIDEMPRESA=GUID';
                                            $query = mysqli_query($conexion, $empresas);
                                            while( $fila = mysqli_fetch_array($query)){
                                                    echo '<li id='.$fila[1].'>';                                
                                                    echo '<a href="javascript:void(0);" class=" waves-effect waves-block">';
                                                    echo '<div class="menu-info">';
                                                    echo '<h4>'.$fila[0].'</h4>';
                                                    echo '</div>';  
                                                    echo '</a>';
                                                     echo "</li>";
                                                }
                                        ?>

                                    </ul>
                                    <div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 0px; z-index: 99; right: 1px;"></div>
                                    <div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                                </div>
                            </li>
                            <li class="footer">
                                <button type="button" id="btngestionar" class="btn bg-red btn-block btn-sm waves-effect"onclick="openGestionar();">Gestionar</button>
                            </li>
                        </ul>
                    </li>
                   
                </ul>

               
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
                    <img src="<?php echo $_SESSION["foto"]; ?>" width="48" height="48" alt="User">
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["email"]; ?></div>
                    <div class="email"><?php echo $_SESSION["email"]; ?></div>
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
                            <a href="index_backend.php" class="toggled waves-effect waves-block">
                                <i class="material-icons">home</i>
                                <span>Inicio</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                <i class="material-icons">layers</i>
                                <span>CRM</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="index_contactos.php" class=" waves-effect waves-block">Contactos</a>
                                </li>
                                <li>
                                    <a href="index_proyectos.php" class=" waves-effect waves-block">Proyectos</a>
                                </li>
                                <li>
                                    <a href="index_categorias.php" class=" waves-effect waves-block">Categorias</a>
                                </li>
                                <li>
                                    <a href="form_documento.php" class=" waves-effect waves-block">Documentos</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                <i class="material-icons">widgets</i>
                                <span>Configuración</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="index_usuarios.php" class=" waves-effect waves-block">Usuarios</a>
                                </li>
                               
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                <i class="material-icons">swap_calls</i>
                                <span>Administración</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="index_empresas.php" class=" waves-effect waves-block">Empresas</a>
                                </li>
                                

                            </ul>
                        </li>

                    </ul>
                    <div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 0px; z-index: 99; right: 1px; height: 517px;"></div>
                    <div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                </div>
            </div>
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
        
    </section>
    <section class="content">
    <div class="container">
            <div class="row">
            <form action="index_crearCategoria.php" method="post" name="form">


                <div class="col-md-12">
                <label>Nueva Categoria</label>
                                    <br>
                    <div class="col-md-8 mgtoppeque">
                        <div class="form-group">
                            <div class="form-line">
                            <select class="form-control w20" id="idproye" style="margin:5px;" name="idproye" placeholder="Proyecto" required>
                                     <option selected disabled value="">Seleccione un Proyecto</option>
                                        <?php
                                            
                                            $PRO='select NOMBRE,GUID from proyectos order by NOMBRE';
                                            $query = mysqli_query($bd, $PRO);                                    
                                    
                                             while( $fila = mysqli_fetch_array($query)){
                                                echo '<option value="'.$fila[0].'">'.$fila[0].'</option>';
                                            }
                                        ?>    
                                </select>
                                <select class="form-control w20"  id="idproca" name="idproca" placeholder="Categoria padre" >
                                     <option selected disabled value="">Seleccione una Categoria</option>
                                        <?php
                                            
                                            $CAT='select NOMBRE,GUID from categoria order by NOMBRE';
                                            $query = mysqli_query($bd, $CAT);                                    
                                    
                                             while( $fila = mysqli_fetch_array($query)){
                                                echo '<option value="'.$fila[1].'">'.$fila[0].'</option>';
                                            }
                                        ?>    
                                </select>
                                <input class="form-control" type="text" name="nombreCategoria" placeholder="Nombre Categoria" style="margin-top:10px;">
                                <div class="form-group">
                           
                        </div>
                            </div>
                        </div>
                    </div>
  
                    <div class="col-md-12">
                        <button class="btn btn-block btn-lg bg-red waves-effect cblanco" name="guardarCategoria" type="button" onclick="validaCategoria();">Guardar</button>
                        <br>
                    </div>
                </div>
                    </form>
                    <div class="col-md-12">
                    <div class="col-md-12" style="margin-top:10px;">
                    <button class="btn btn-block btn-lg bg-red waves-effect cblanco" id="volvercat"  name="volvercat">Volver</button>
                    </div>
                    </div>
                </div>
            </div>
    </section>


    <!-- Jquery Core Js -->
    <script async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    
    
    <!-- My Script -->
    <script type="text/javascript" src="myscript.js"></script>
    <script src="js/JSquerylista/querylistaContactos.js"></script>


    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
    <script src="js/funciones.js"></script>

   <!-- <script src="js/editarContact.js"></script> -->
</body>

</html>