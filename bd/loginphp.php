<?php
    include "conexion.php";
    $usuario = $_POST['email'];
    $contra = $_POST['pwd'];
    echo "usuario : $usuario contraseña $contra";
    $sql = "select usuarios.USERNAME,contrasenas.CONTRA,contrasenas.SEMILLA from contrasenas,usuarios where 
    usuarios.GUID=contrasenas.GUID and USERNAME='$usuario'; ";
    $result = $conexion->query($sql);
    $resultconsul=$conexion->query($sql);

    $result =mysqli_query($conexion,$sql);

        // output data of each row
        
        while($row = mysqli_fetch_array($result)) {
            if($row>0){
                echo "<br> El usuario ".$row["USERNAME"]. "logueado correctamente";
            }

            echo "<br> EMAIL: ". $row["USERNAME"]. " - pass: ". $row["CONTRA"] . "<br>";
            $contraOriginal = $row["CONTRA"];
            $semilla = $row['SEMILLA'];

        }
    $contrausu1=md5($contra);
    $pparte=substr($semilla,0,3);
    $uparte=substr($semilla,-3);
    $contrausu1=md5($contra);

    $contrausu=$pparte.$contrausu1.$uparte;
    echo "<p>Contraseña bbdd: $contraOriginal</p>";
    echo "<p>Contraseña usuario: $contrausu1</p>";
    echo "<p>Contraseña usuario final: $contrausu</p>";

    if(strcmp($contrausu,$contrausu1)==0){
        echo "<p>Contraseñas iguales </p>";
    }else{

        echo "<p>Contraseña incorrecta </p>";
        echo "<script>";
        echo "window.location.href='login.html'";
        echo "alert('Contraseña incorrecta');";
        echo "</script>";

    }



    

        /*
    if ($result->num_rows > 0) {     
    }
    $row = $result->fetch_array(MYSQLI_ASSOC)
    if (password_verify($contra, $row['pwd'])) { 
    
       $_SESSION['loggedin'] = true;
       $_SESSION['username'] = $username;
       $_SESSION['start'] = time();
       $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
   
       echo "Bienvenido! " . $_SESSION['USERNAME'];
       echo "<br><br><a href=index.html>Panel de Control</a>"; 
   
    } else { 
      echo "Username o Password estan incorrectos.";
   
      echo "<br><a href='Proyecto\login.html'>Volver a Intentarlo</a>";
    }
    */
    mysqli_close($conexion); 
    ?>