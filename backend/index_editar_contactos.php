<?php
    require_once("../bd/conexion.php");
    session_start();
    if(!isset( $_SESSION['nombre'])){
        header("Location: http://localhost/organixcrm/index.php");
    }
    $mysqli= new mysqli("localhost","root","root",'empresa'.$_SESSION['bd']);
    $usu=$_GET["id"];
    
    $_SESSION["contact"]=$usu;
    $consulta='SELECT nombre FROM contactos WHERE GUID="'.$usu.'"';
    $result=mysqli_query($mysqli,$consulta);
    if(!$result){
        echo "ERROR -> " . mysqli_error($mysqli);
    }
    $row=mysqli_fetch_array($result);
 
    $select="select username from contacto_usuario where idcontacto='".$usu."'";
    $query=mysqli_query($mysqli,$select);
    $row=mysqli_fetch_row($query);
    $gui=$row[0];
if(isset($_POST['submit1'])) {
   
    $nombre = $_POST['idnombrecontacto'];
    $permisos=$_REQUEST['permisos'];
    $email = $_REQUEST['idemailcon'];
    $contraN = $_REQUEST['idcontrausu'];
    $repecontraN = $_REQUEST['idrepecontrausu'];
    echo "guidusuario".$_SESSION["contact"];
    if(!empty($nombre)){
    $updatePerfil = "update contactos set nombre='$nombre' where guid='$usu';";

    $resultado4=mysqli_query($mysqli, $updatePerfil);  
    echo "El resultado es: ". $resultado4; 
    if(!$resultado4){
        echo "ERROR ACTUALLIZAR NOMBRE -> " . mysqli_error($mysqli);
    }
                    }
  
    if(!empty($email)){
        $updateEmail = "update contacto_usario set username='$email' where guid='$usu';";
        $resultado5=mysqli_query($mysqli, $updateEmail);
        if(!$resultado5){
            echo "ERROR ACTUALIZAR email contacto-> " . mysqli_error($mysqli);
        }
    }
  
    if(!empty($contraN) && !empty($repecontraN)){
        if($contraN==$repecontraN){
            $sem1=mt_rand(100,999);
            $sem2=mt_rand(100,999);
            $sem=$sem1.$sem2;
            $contrCifra=md5($contraN);
            $contrCiNueva=$sem1.$contrCifra.$sem2;
            $actu="update claves set contra='$contrCiNueva',semilla='$sem' where guid_pass='$usu'";
            $resultado6=mysqli_query($mysqli, $actu);
            if(!$resultado6){
                echo "ERROR ACTUALIZAR contra-> " . mysqli_error($mysqli);
            }
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
                    <img src="images/david.jpg" width="48" height="48" alt="User">
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
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 256px;">

                        <div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 6px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 0px; z-index: 99; right: 1px; height: 72.8178px;"></div>
                        <div class="slimScrollRail" style="width: 6px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 256px;">
                        <div class="demo-settings" style="overflow: hidden; width: auto; height: 256px;">
                            <p>GENERAL SETTINGS</p>
                            <ul class="setting-list">
                                <li>
                                    <span>Report Panel Usage</span>
                                    <div class="switch">
                                        <label><input type="checkbox" checked=""><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>Email Redirect</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                            </ul>
                            <p>SYSTEM SETTINGS</p>
                            <ul class="setting-list">
                                <li>
                                    <span>Notifications</span>
                                    <div class="switch">
                                        <label><input type="checkbox" checked=""><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>Auto Updates</span>
                                    <div class="switch">
                                        <label><input type="checkbox" checked=""><span class="lever"></span></label>
                                    </div>
                                </li>
                            </ul>
                            <p>ACCOUNT SETTINGS</p>
                            <ul class="setting-list">
                                <li>
                                    <span>Offline</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>Location Permission</span>
                                    <div class="switch">
                                        <label><input type="checkbox" checked=""><span class="lever"></span></label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 6px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 0px; z-index: 99; right: 1px;"></div>
                        <div class="slimScrollRail" style="width: 6px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>
    <section class="content">
    <form action="index_editar_contactos.php?id=<?php echo $_SESSION['contact']?>" method="post">
        <div class="princicontent">
            <div class="col-lg-4 flexstart"> <i class="material-icons">ic_keyboard_backspace</i></a>
            </div>
            <div class="col-lg-4 flexcenter">Editar perfíl</div>
            <div class="col-lg-4 flexend">
                <div id="id_saveperfil">
                <input type="submit" name="submit1" value="Actualizar" />
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-2 misdatos">Mis datos</div>
            </div>
            <div class="tablaperfil">
                <div class="col-lg-2">
                    <img src="images/david.jpg" width="160px" class="preview">
                </div>
                <div class="col-lg-10">
                    <div class="flexcolumn">
                        <div class="row">
                            <div class="col-lg-5">Nombre
                                <input type="text" class="form-control" name="idnombrecontacto" id="idnombrecontacto" placeholder="<?php echo  $row[0]; ?>">
                            </div>
                            <div class="col-lg-1">*</div>

                            <div class="col-lg-5">Apellidos
                            <input type="text" class="form-control" id="idapellidoscontacto">

                            </div>
                            <div class="col-lg-1">*</div>

                        </div>
                        <div class="row">

                            <div class="col-lg-3">Email
                            <input type="text" class="form-control" name="idemailcon" id="idemailcon" placeholder="<?php echo $gui; ?>">

                            </div>
                            <div class="col-lg-1">*</div>

                            <div class="col-lg-4">Contraseña
                            <input type="text" class="form-control" name="idcontrausu" id="idcontrausu">
                        

                            </div>
                            <div class="col-lg-4">Repetir Contraseña
                            <input type="text" class="form-control" name="idrepecontrausu" id="idrepecontrausu">

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-6">Idioma
                                <select class="form-control show-tick" style="margin-top: 12px;">
                                            <optgroup label="Idioma">
                                                <option>Español</option>
                                                <option>Catalá</option>
                                                <option>Inglés</option>
                                            </optgroup>
                                            
                                        </select>
                            </div>
                            <div class="col-lg-6">Zona Horaria

                                <select class="form-control show-tick" style="margin-top: 12px;">
                                            <optgroup label="Zona Horaria">
                                                <option>Europa/Budapest (GMT+01:00)</option>
                                                <option>Europa/Madrid (GMT+01:00)</option>
                                                <option>Europa/Ámsterdam (GMT+01:00)</option>
                                                <option>Pacífico/Midway (GMT-11:00)</option>
                                                <option>US/Samoa (GMT-11:00)</option>
                                                <option>US/Alaska (GMT-09:00)</option>

                                            </optgroup>

                                        </select>
                            </div>
                            <div class="col-lg-12" style="margin-bottom: 150px;margin-top: 13px;">Permisos
                            <select class="form-control show-tick" style="margin-top: 12px;" name="permisos">
                                    <optgroup label="Nivel de Permisos">
                                        <option value="3">Lectura</option>  
                                        <option value="2">Lectura,Escritura</option>  
                                        <option value="1">Lectura,Escritura,Borrado</option>                                                                              
                                    </optgroup>

                            </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
        </div>
        </form>
    </section>


    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>
    <!--
    <script src="js/querylista.js"></script>
    <script src="js/queryejemplo.js"></script>
-->
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
   <!--  <script src="js/editarContact.js"></script> -->

</body>

</html>