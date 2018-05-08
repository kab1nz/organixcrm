<?php
require_once("bd/conexion.php");
include("bd/ejecutadorProcedimientos.php");
session_start();
$bcontra=false;
$bempresa=false;
$bnombre=false;

$existusuario=false;
$existempresa=false;

if(!isset($_SESSION['autentificado'])){
    
    if(isset($_REQUEST['email']) && isset($_REQUEST['empresa']) && isset($_REQUEST['contra']) && isset($_REQUEST['nombre'])){
        
        if($_REQUEST['nombre']==" "){
            $bnombre=true;
        }
        
        if($_REQUEST['empresa']==" "){
            $bempresa=true;
        }
        
        if($_REQUEST['contra']==" "){
            $bcontra=true;
        }
        
     
        if($bnombre==false && $bempresa==false && $bcontra==false){
            
            
            $usuario=trim($_POST['email']);
            $nombre=trim($_POST['nombre']);
            $pass=trim($_POST['contra']);
            $empresa=trim($_POST['empresa']);

            $comprobacion = "select * from USUARIOS where USERNAME = '$usuario'";
            $resultado=mysqli_query($conexion,$comprobacion);
            $cont= mysqli_num_rows($resultado);

            if($cont>=1){
                $existusuario=true;
            }else{
                   
                
                $comprobacion2 = "select * from EMPRESAS where NOMBREFISCAL = '$empresa'";
                $resultado2=mysqli_query($conexion,$comprobacion2);
                $cont2= mysqli_num_rows($resultado2);
                
                if($cont2>=1){
                    $existempresa=true;
                }else{
                   

                    //insercion del usuario
                    $insertarUSU="call INSERT_USUARIO('$usuario','$nombre','$pass')";
                    $resultado3 = mysqli_query($conexion, $insertarUSU);       
                    mysqli_next_result($conexion); //Prepara el siguiente juego de resultados de una llamada 
                    mysqli_free_result($resultado3); //Libera la memoria asociada al resultado.

                    //insercion de empresa
                    $insertarEMP="INSERT INTO EMPRESAS(NOMBREFISCAL, NOMBRECOMERCIAL, ALIASCRM, FECHADECREACION) VALUES ('$empresa','$empresa','$empresa',NOW());";
                    $resultado4=mysqli_query($conexion, $insertarEMP);           
                    mysqli_next_result($conexion); //Prepara el siguiente juego de resultados de una llamada 

                    
                    //creacion BD emresa
                    $resultadoaux=mysqli_query($conexion,"select BDEMPRESA from empresas where ALIASCRM='$empresa'");
                    $intent= mysqli_fetch_row($resultadoaux);
                    $numbd= $intent[0];
                     
                    mysqli_next_result($conexion); //Prepara el siguiente juego de resultados de una llamada 
                    mysqli_free_result($resultadoaux);
                    
                     $crear="call crear_BDEMPRESA($numbd)";
                     $resultadobd = mysqli_query($conexion, $crear);
                    
                    
                    mysqli_next_result($conexion); //Prepara el siguiente juego de resultados de una llamada                   
                    addprocedures($numbd);
                    



                    //insercion relacion usuario empresa
                    $aux="INSERT INTO USU_EMPR VALUES((select GUID from USUARIOS where USERNAME='$usuario'),(select GUID from EMPRESAS where NOMBREFISCAL='$empresa'),3)"; 
                    $resultado5=mysqli_query($conexion, $aux);
                    mysqli_close($conexion);


                }
            }
            
        }
        
        
    }
    
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="Estilo/mediaIndex.css">
    <link rel="stylesheet" href="estilo.css">
    
 

    <title>OrganixCRM</title>
</head>

<body>

    <div class="container1">
        <div class="row">

            <div class="column-block">
                <div class="row">
                    <div class="col-3"></div>

                    <div class="col-8">
                        <div class="logo">
                            <a href="#" class="justify-content-end"><img src="Imagenes/LogoOrganix.png"></a>
                        </div>
                        <h2 class="h2 fuente">
                            Seguimiento de los cliente, optimice sus actividades de ventas y cierre las ofertas más rápido.</h2>
                        <p class="fuente">Organix CRM es una solución basada en la nube que lo ayuda a realizar un seguimiento de las actividades de ventas, a predecir el comportamiento del cliente, a automatizar y a simplificar los procesos de ventas.</p>
                    </div>

                </div>
            </div>
            <div class="column-block1">

                <form class="form banner-signup" method="POST"  name="form">
                    <div class="col-12">
                        <p id="acount">Create account</p>

                    </div>
                    <div class="col-12">
                        <input type="text" id="namefield" class="sg" name="nombre" id="nombre" placeholder="Full Name" pattern="^[a-z[:space:]]*$" required>
                        <?php
                            if(isset($bnombre) && $bnombre==true){
                                echo '<spam class="error">Introduce un nombre valido</spam>';                            
                            }
                        ?>
                    </div>
                    <div class="col-12">
                        <input type="email" class="sg" name="email" name="email" placeholder="Email Address" required>
                        <?php
                            if($existusuario==true){
                                echo '<spam class="error">Este email ya esta registrado</spam>';                                
                            }
                        ?>
                    </div>
                    <div class="col-12">
                        <input type="password" class="sg" name="contra" name="contra" placeholder="Password" required>
                        <?php
                            if(isset($bcontra) && $bcontra==true){
                                echo '<spam class="error">Introduce una contraseña valida</spam>';                            
                            }
                        ?>
                    </div>
                    <div class="col-12">
                        <input type="text" class="sg" name="empresa" placeholder="Name Business" required>
                        <?php
                            if(isset($bempresa) && $bempresa==true){
                                echo '<spam class="error">Introduce un nombre de empresa valido</spam>';                            
                            }elseif($existempresa==true){
                                echo '<spam class="error">Esta empresa ya esta registrada</spam>';                                
                            }else{}
                        ?>
                    </div>
                    <div class="col-12">
                        <small class="small">By clicking 'Create account', you agree to the</small>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-danger btnfinal" >GET STARTED FREE</button>
                        <a href="login.php"><button type="button" class="btn btn-danger btnfinal">LOGIN</button></a>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container2">
        <div class="row">
            <div class="col-12">
                <p class="estiloLetra d-flex justify-content-center mt">Características

                </p>
                <div class="col-12">
                    <p class=" d-flex justify-content-center ">Gracias a OrganixCRM podemos conocer las necesidades de nuestros clientes y ayudarnos en la tarea de fidelización y soporte. Además le permitirá mejorar la comunicación interna dentro de la empresa.</p>

                </div>
            </div>
            <ul class="navbar nav text-center">
                <div class="col-2">
                    <li>
                        <a href="#"><img src="Imagenes/precio.svg"></a>
                        <p>CONTROL DE VENTAS</p>
                        <p>Mejore las ventas disponiendo de un lugar donde gestionar toda la información, registrar las interacciones con el cliente y supervisar la evolución de la negociación.

                        </p>

                    </li>
                </div>
                <div class="col-2">
                    <li>
                        <a href="#"><img src="Imagenes/casco.svg" class="img50"></a>
                        <p>CENTRO DE SOPORTE
                        </p>
                        <p>Ofrezca un servicio de arención al cliente de calidad. Con OrganixCRM puede almacenar toda la información de los clientes en un solo lugar y ofrecer un servicio de soporte profesional.



                        </p>

                    </li>
                </div>
                <div class="col-2">
                    <li>
                        <a href="#"><img src="Imagenes/herra.svg" class="img50"></a>
                        <p>FACIL DE USAR
                        </p>
                        <p>OrganixCRM es muy sencillo de utilizar. No requiere de configuración y puedes empezar a sacarle provecho desde el primer momento en el que lo utilizamos.

                        </p>

                    </li>
                </div>
                <div class="col-2">
                    <li>
                        <a href="#"><img src="Imagenes/movil.svg"></a>
                        <p>CONTROL DE VENTAS</p>
                        <p>Para facilitar la movilidad de tus comerciales podrás usar OrganixCRM en cualquier dispositivo móvil o tableta que disponga de acceso a internet para gestionar la empresa.

                        </p>

                    </li>
                </div>
                <div class="col-2">

                    <li>
                        <a href="#"><img src="Imagenes/cash.svg" class="img50"></a>
                        <p>CENTRO DE SOPORTE</p>
                        <p>OrganixCRM ofrece un servicio sin cuotas de altas ni instalación y sin compromiso de permanencia. Paga solamente una cuota mensual con una garantia excepcional.


                        </p>
                    </li>
                </div>

        
        </ul>
    </div>
    </div>
    
    <div class="container">
        <h4 class="h4 text-center mt">Cómo Funciona</h4>
        <h6 class="h6" style="margin-top:30px;">OrganixCRM utiliza la tecnología para organizar y sincronizar los procesos de negocio, tales como actividades de venta, de comercialización, servicio al cliente y soporte técnico.</h6>
        <div class="row">
            <div class="col-6">
                <img src="Imagenes/508.jpg" class="img-fluid">
            </div>
            <div class="col-6">
                <ul class="list-group mt text-right">
                    <li class="list-group-item">Información centralizada
                    </li>
                    <li class="list-group-item">Grupos de usuarios

                    </li>
                    <li class="list-group-item">Calendario compartido
                    </li>
                    <li class="list-group-item">Tareas asignables
                    </li>
                    <li class="list-group-item">Proceso de negociaciones

                    </li>
                    <li class="list-group-item">Casos para soporte
                    </li>
                </ul>
            </div>
        </div>

    


        <div class="col-12">
            <div class="mtxl"></div>

            <div class="menufoot">
                <a href="#" target="_top">Cómo funciona</a>
                <a href="#" target="_top">Precios</a>
                <a href="#" target="_top">Blog</a>
                <a href="#" target="_top">Soporte</a>
                <a href="#" target="_top">Ofertas de trabajo</a>
                <a href="#" target="_top">Contacto </a>

            </div>
        </div>
    </div>
        
        <div class="col-12">

            <footer>
                <div class="mt"></div>
                <div class="copyright sm-text-center">
                    <p class="small no-margin pull-left sm-pull-reset text-center">
                        <span class="hint-text">Copyright © 2017 </span>
                        <span class="font-montserrat">Navarro Rubio Informática</span>
                        <span class="hint-text p-r-10">Todos los derechos reservados.</span>
                        <span class="sm-block"><a href="#/Backend/Home/Terms" class="m-r-10">Términos de uso</a> | <a href="#/Backend/Home/Privacy" class="m-l-10 m-r-10">Política de privacidad</a> | <a id="lng" href="javascript:void(0);" class="m-l-10 dropup"><span>Idioma</span>:
                        <span id="lngtxt">Español</span></a>
                        </span>
                        <span class="hint-text p-r-10 text-right">Versión: 2017.6.23.1502</span>

                    </p>


                </div>
            </footer>
        </div>
        
    




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>

</html>