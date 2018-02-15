<html>
    <body>
        <?php
            include "conexion.php";
            $usuario=$_POST['email'];
            $nombre=$_POST['nombre'];
            $pass=$_POST['contra'];
            /*
            $insertar="call INSERT_USUARIO('$usuario','$nombre','$pass')";
            */
            $insertar="call INSERT_USUARIO('$usuario','$nombre','$pass')";

            $resultado = mysqli_query($conexion, $insertar);
            //echo $usuario."<br>,<br>$nombre,<br>$pass";
            if(!$resultado){
                echo "Error al registrarse";
            }else{
                echo "Usuario registrado correctamente";
            }
            mysqli_close($conexion);

        ?>
</body>
</html>