<?php
    session_start();
    require_once("../bd/conexion.php");
    $_SESSION["usuario"]="";
    setcookie("logueo",$_SESSION["usuario"], time()+3600);
    $usuario="";
    $contra="";
    $nbd=$_GET['idcliente'];
    $_SESSION['idcli']=$nbd;
    echo "Numero bd -->".$nbd;
    $mysqli= new mysqli("localhost","root","root",$nbd);

    
    //variables de comprobaciones
    $vacios=false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap.css">
    <link rel="stylesheet" href="../estilo.css">
    <link rel="stylesheet" href="../Estilo/medialogin.css">
    

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
        <form id="frmRestablecer" method="post" action="loginCliente.php?idcliente=<?php echo $_GET['idcliente'] ?> ">
            <label for="email">Email:</label>
            <input type="email" class="form-control w20" id="emailcliente" placeholder="Enter email" name="emailcliente" value=' 
            <?php if(isset($_REQUEST["emailcliente"])){echo $_REQUEST["emailcliente"];} ?>' >
            
            <div class="form-group">
                <label for="pwdcliente">Password:</label>
                <input type="password" class="form-control w20" id="pwdcliente" placeholder="Enter password" name="pwdcliente" value="<?php if(isset($_REQUEST["pwdcliente"])){echo $_REQUEST["pwdcliente"];} ?>">
            </div>
            
            
            <?php 
            
                if(isset($_REQUEST['emailcliente']) && isset($_REQUEST['pwdcliente'])){
                    
                        if($vacios==false){


                                $_SESSION["usuariocliente"]=$_REQUEST["emailcliente"];    
                                $usuario=$_REQUEST['emailcliente'];
                                $contra=$_REQUEST['pwdcliente'];


                                //sacamos al usuario
                                $sql= 'select GUID from contacto_usuario where username ="'.$_REQUEST['emailcliente'].'"';
                                $resultado = mysqli_query($mysqli, $sql);
                                $intent= mysqli_fetch_row($resultado);
                                $cont1= mysqli_num_rows($resultado);
                                $guidusu= $intent[0];
                            
                                if($cont1 != 0){
                                
                                    //sacamos la password
                                    $sql2='select contra from claves where GUID="'.$guidusu.'"';
                                    $resultado1 =  mysqli_query($mysqli, $sql2);
                                    $aux= mysqli_fetch_row($resultado1);
                                    $pass= substr($aux[0],3,-3);


                                        if(md5($contra)==$pass){
                                            
                                            
                                            
                                            mysqli_close($mysqli);
                                            $_SESSION["emailcliente"]=$_REQUEST["emailcliente"];
                                            header("location: indexCliente.php");

                                        }else{
                                            echo '<span class="error">Introduce una contraseña valida</span>';                    
                                        }
                                
                                }else{ echo '<span class="error">Introduce un usuario registrado</span>'; } 

                        }else{
                            echo '<span class="error">Rellena los campos</span>';        
                        }


                
                }elseif(isset($_REQUEST['emailcliente']) && isset($_REQUEST['pwdcliente'])){
                    
                    if(trim($_REQUEST['pwdcliente']) == "" || trim($_REQUEST['pwdcliente'])==" " ){$vacios=true;}
                    
                    
                                        
                    
                    if($vacios==false){

                            $_SESSION["usuariocliente"]=$_REQUEST["emailcliente"];    
                            $usuario=$_REQUEST['emailcliente'];
                            $contra=$_REQUEST['pwdcliente'];



                            //sacamos al usuario
                            $sql= 'select GUID from contacto_usuario where username ="'.$_REQUEST['emailcliente'].'"';
                            $resultado = mysqli_query($mysqli, $sql);
                            $cont= mysqli_num_rows($resultado);
                            $intent= mysqli_fetch_row($resultado);           
                            $guidusu= $intent[0];



                            if($cont != 0){

                                    //sacamos la password
                                    $sql2='select claves from contrasenas where GUID="'.$guidusu.'"';
                                    $resultado1 =  mysqli_query($mysqli, $sql2);
                                    $aux= mysqli_fetch_row($resultado1);
                                    $pass= substr($aux[0],3,-3);


                                    if(md5($contra)==$pass){


                                      header('Location: indexCliente.php');
                                      
                                            


                                    }else{ echo '<span class="error">Introduce una contraseña valida</span>';   }

                            }else{ echo '<span class="error">Introduce un usuario registrado</span>'; }    

                        }else{ echo '<span class="error">Rellena los campos</span>';  }

                    }
            
            
            ?>
            
            
            
            
            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
                <a href="bd/contraseña.html"><label style="margin-left:30px;">¿Olvidó la contraseña?</label></a>
            </div>
            <button type="submit" class="btn btn-default" onClick="verificar_campos()">Iniciar Sesión</button>
        </form>
    </center>
</body>

</html>