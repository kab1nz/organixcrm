﻿<?php
require_once("../bd/conexion.php");
session_start();
$usu=$_SESSION["usuario"];
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

<body class="theme-red">
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
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="EMPIEZA A ESCRIBIR...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
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
                                        <li>
                                            <a href="javascript:void(0);" class=" waves-effect waves-block">

                                                <div class="menu-info">
                                                    <h4>EMPRESA 1</h4>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class=" waves-effect waves-block">

                                                <div class="menu-info">
                                                    <h4>EMPRESA 2</h4>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" class="btn bg-red btn-block btn-sm waves-effect">Gestionar</button>

                                        </li>
                                    </ul>
                                    <div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 0px; z-index: 99; right: 1px;"></div>
                                    <div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                                </div>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);" class=" waves-effect waves-block">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <img src="images/ic_device_hub_white_24px.svg" alt="">
                            <!--      <span class="label-count">8</span> -->
                        </a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->






                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flag</i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">TASKS</li>
                            <li class="body">
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 254px;">
                                    <ul class="menu tasks" style="overflow: hidden; width: auto; height: 254px;">

                                    </ul>
                            </li>
                            <!-- #END# Tasks -->
                            <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
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
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >                       
                        <label id="nombreUsu">
                            <?php echo $usu; ?>
                        </label>
                    </div>
                    <div class="email">
                        <?php echo $_SESSION["email"]; ?>
                    </div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="index_home_perfil.html" class=" waves-effect waves-block"><i class="material-icons">person</i>Perfil</a></li>

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
                                <i class="material-icons">event</i>
                                <span>Mis Cosas</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="index_home_perfil.html" class=" waves-effect waves-block">Alertas</a>
                                </li>
                                <li>
                                    <a href="index_home_perfil.html" class=" waves-effect waves-block">Notas</a>
                                </li>
                                <li>
                                    <a href="index_home_calendario.html" class=" waves-effect waves-block">Calendario</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                <i class="material-icons">layers</i>
                                <span>CRM</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="index_contactos.html" class=" waves-effect waves-block">Contactos</a>
                                </li>
                                <li>
                                    <a href="index_llamadas.html" class=" waves-effect waves-block">Llamadas telefónicas</a>
                                </li>
                                <li>
                                    <a href="index_casos.html" class=" waves-effect waves-block">Casos</a>
                                </li>
                                <li>
                                    <a href="index_tareas.html" class=" waves-effect waves-block">Tareas</a>
                                </li>
                                <li>
                                    <a href="index_negociaciones.html" class=" waves-effect waves-block">Negociaciones</a>
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
                                    <a href="index_usuarios.html" class=" waves-effect waves-block">Usuarios</a>
                                </li>
                                <li>
                                    <a href="index_grupo_usuario.html" class=" waves-effect waves-block">Grupos de usuarios</a>
                                </li>
                                <li>
                                    <a href="index_suscripciones.html" class=" waves-effect waves-block">Suscripciones y pagos</a>
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
                                    <a href="index_empresas.html" class=" waves-effect waves-block">Empresas</a>
                                </li>
                                <li>
                                    <a href="index_tarifas.html" class=" waves-effect waves-block">Tarifas</a>
                                </li>
                                <li>
                                    <a href="index_pagos.html" class=" waves-effect waves-block">Pagos</a>
                                </li>
                                <li>
                                    <a href="pages/ui/badges.html" class=" waves-effect waves-block">Informes</a>
                                </li>

                            </ul>
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
        <div class="princicontent">
            <div class="col-lg-4 flexstart"> <i class="material-icons">ic_keyboard_backspace</i></a>
            </div>
            <div class="col-lg-4 flexcenter">Editar perfíl</div>
            <div class="col-lg-4 flexend">
                <div id="id_saveperfil">
                <i class="material-icons" >ic_save</i>
                    <span>Save</span>
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
                                <input type="text" class="form-control" id="idnombre" placeholder="<?php echo $_SESSION['nombre']; ?>">
                            </div>
                            <div class="col-lg-1">*</div>

                            <div class="col-lg-5">Apellidos
                            <input type="text" class="form-control" id="idapellidos" placeholder="<?php echo $_SESSION['nombre']; ?>">

                            </div>
                            <div class="col-lg-1">*</div>

                        </div>
                        <div class="row">

                            <div class="col-lg-3">Email
                            <input type="text" class="form-control"placeholder="<?php echo $_SESSION['email']; ?>">

                            </div>
                            <div class="col-lg-1">*</div>

                            <div class="col-lg-4">Contraseña
                            <input type="text" class="form-control">

                            </div>
                            <div class="col-lg-4">Repetir Contraseña
                            <input type="text" class="form-control">

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
                        </div>

                    </div>
                </div>
            </div>
            
        </div>
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
    <script src="js/querylista.js"></script>
    <script src="js/queryejemplo.js"></script>

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
</body>

</html>