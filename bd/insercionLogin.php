
        <?php
            include "conexion.php";
            echo "<br>";
            $usuario=$_POST['email'];
            $nombre=$_POST['nombre'];
            $pass=$_POST['contra'];
            $empresa=$_POST['empresa'];

            $comprobacion = "select * from USUARIOS where USERNAME = '$usuario'";
            $resultado=mysqli_query($conexion,$comprobacion);
            $cont= mysqli_num_rows($resultado);

            if($cont>=1){
                echo "Ya existe un usuario con este email";
            }else{
                mysqli_free_result($resultado);    
                $comprobacion2 = "select * from EMPRESAS where NOMBREFISCAL = '$empresa'";
                $resultado=mysqli_query($conexion,$comprobacion2);
                $cont2= mysqli_num_rows($resultado);
                
                if($cont2>=1){
                    echo "Ya existe una empresa con ese nombre";
                }else{
                     mysqli_free_result($resultado);

                    //insercion del usuario
                    $insertarUSU="call INSERT_USUARIO('$usuario','$nombre','$pass')";
                    $resultado = mysqli_query($conexion, $insertarUSU);
                    if(!$resultado){
                        echo "Usuario no insertado<br>";
                    }else{
                        echo "Usuario insertado<br>";
                    }
                    mysqli_free_result($resultado);    
                    mysqli_close($conexion);



                    //insercion de empresa
                    include "conexion.php";
                    echo "<br>";
                    $insertarEMP="call INSERT_EMPRESAS('$empresa')";
                    $resultado=mysqli_query($conexion, $insertarEMP);
                    if(!$resultado){
                        echo "Empresa no insertada<br>";
                    }else{
                        echo "Empresa insertada<br>";
                    }

                    mysqli_free_result($resultado);    
                    mysqli_close($conexion);


                    //insercion relacion usuario empresa
                    include "conexion.php";
                    echo "<br>";
                    $aux="INSERT INTO USU_EMPR VALUES((select GUID from USUARIOS where USERNAME='$usuario'),(select GUID from EMPRESAS where NOMBREFISCAL='$empresa'),3)"; 
                    $resultado=mysqli_query($conexion, $aux);
                    if(!$resultado){
                        echo "Relacion fallida<br>";
                    }else{
                        echo "Relacion usuario-empresa creada<br>";
                    }
                    mysqli_close($conexion);


                }
            }
                
           

        ?>
