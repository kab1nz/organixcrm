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
  <?php
  if(isset($_POST['email'])){
  $destino=$_POST['email'];
  $desde="From: ismaelborregoinfor";
  $asunto="Recuperacion Contraseña";
  $mensaje="Para recuperar la contraseña lo que tienes que hacer es irte a la siguiente página --> <a href='cambiarpassword.php'</a>";
  mail($destino,$asunto,$mensaje,$desde);
  echo "email enviado a --> $destino";
  }else {
    echo "Problemas al enviar ";
  }
?>
 <?php
            include "bd/conexion.php";
            $usuario=$_POST['email'];
            $pass=$_POST['pwd'];
            $pass1=$_POST['pwd1'];
            /*
            $insertar="call INSERT_USUARIO('$usuario','$nombre','$pass')";
            */
            $semilla=mysqli_query($conexion,"select semilla from usuarios, contrasenas where usuarios.GUID = contrasenas.GUID and USERNAME='ismaelborrego@gmail.com';");
            $fila = mysqli_fetch_row($semilla);
            echo "La semilla es -->".$semilla[0];
            mysqli_close($conexion);

        ?>  
    <center>
        <img src="Imagenes/LogoOrganix.png" alt="">
        <br>
        <h3 class="h3">Una cuenta. Acceda a todos los servicios.
        </h3>
        <div class="mt"></div>
        <p class="fuente1">Inicie sesión para acceder OrganixCrm Home
        </p>
        <br>
        <form method="post" action="cambiarpassword.php">
            <label for="email">Email:</label>
            <input type="email" class="form-control w20" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control w20" id="pwd" placeholder="Enter password" name="pwd">
            </div>
            <div class="form-group">
                <label for="pwd">Repeat-Password:</label>
                <input type="password" class="form-control w20" id="pwd1" placeholder="Enter password" name="pwd1">
            </div>
            <button type="submit" name="enviar" class="btn btn-default">Submit</button>
        </form>
    </center>
</body>

</html>