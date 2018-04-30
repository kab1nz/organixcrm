<?php
    session_start();
    require_once("bd/conexion.php");
    $_SESSION["usuario"]="";
    setcookie("logueo",$_SESSION["usuario"], time()+3600);
    $usuario="";
    $contra="";
    
    //variables de comprobaciones
    $vacios=false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="Estilo/medialogin.css">
    

    <title>Document</title>

</head>



<body>
    <center>
        <a href="index.php"><img src="Imagenes/LogoOrganix.png" alt=""></a>
        <br>
        <h3 class="h3">Una cuenta. Acceda a todos los servicios.
        </h3>
        <div class="mt"></div>
        <p class="fuente1">Inicie sesión para acceder OrganixCrm Home
        </p>
        <br>
        <form id="frmRestablecer" method="post" action="login.php">
            <label for="email">Email:</label>
            <input type="email" class="form-control w20" id="email" placeholder="Enter email" name="email" value=' 
            <?php if(isset($_REQUEST["email"])){echo $_REQUEST["email"];} ?>' >
            
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control w20" id="pwd" placeholder="Enter password" name="pwd">
            </div>
            
            
            <?php 
            
                if(isset($_REQUEST['email']) && isset($_REQUEST['pwd']) && isset($_REQUEST['empresa'])){
                    
                    header("location: backend/indexback.html");
                
                }elseif(isset($_REQUEST['email']) && isset($_REQUEST['pwd'])){
                    
                    if(trim($_REQUEST['pwd']) == "" || trim($_REQUEST['pwd'])==" " ){$vacios=true;}
                    
                    
                                        
                    
                    if($vacios==false){
                    
                    $_SESSION["usuario"]=$_REQUEST["email"];    
                    $usuario=$_REQUEST['email'];
                    $contra=$_REQUEST['pwd'];
                    
                    
                                     
                    //sacamos al usuario
                    $sql= 'select GUID from Usuarios where username ="'.$_REQUEST['email'].'"';
                    $resultado = mysqli_query($conexion, $sql);
                    $intent= mysqli_fetch_row($resultado);
                    $guidusu= $intent[0];
                   //  mysqli_free_result($resultado);
                    //mysqli_close($conexion);


                    
                    //sacamos la password
                    $sql2='select contra from contrasenas where GUID="'.$guidusu.'"';
                    $resultado1 =  mysqli_query($conexion, $sql2);
                    $aux= mysqli_fetch_row($resultado1);
                    $pass= substr($aux[0],3,-3);
                    
                        
                    if(md5($contra)==$pass){
                        
                        
                            if(!$resultado){
                                echo "fallo de conexion a la En el query";

                            }else{
                                $empresas='select NOMBREFISCAL,GUIDEMPRESA from usu_empr, empresas where GUIDUSUARIO="'.$guidusu.'" and GUIDEMPRESA=GUID';
                                $query = mysqli_query($conexion, $empresas);


                                echo '<div class="form-group">';
                                echo '<label for="empresa">Empresa:</label>';
                                echo '<select class="form-control w20" id="empresa" name="empresa">';

                                while( $fila = mysqli_fetch_array($query)){

                                    $aux= 'select NOMBREFISCAL from EMPRESAS where GUID="'.$fila["GUIDEMPRESA"].'"';

                                    $resultado =mysqli_query($conexion,$aux);
                                    $intent= mysqli_fetch_row($resultado);

                                     echo '<option>'.$intent[0].'</option>';
                                }

                                echo "</select></div>";


                            }
                             
                        
                    }else{
                        echo '<spam class="error">Introduce una contraseña valida</spam>';                    
                    }

       
                }else{
                    echo '<spam class="error">Rellena los campos</spam>';        
                }
                    
            }
            
            ?>
            
            
            
            
            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
                <a href="contraseña.html"><label style="margin-left:30px;">¿Olvidó la contraseña?</label></a>
            </div>
            <button type="submit" class="btn btn-default" onClick="verificar_campos()">Iniciar Sesión</button>
        </form>
    </center>
</body>

</html>