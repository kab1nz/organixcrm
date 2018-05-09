<?php
    
    $aux="EMPRESA".$_SESSION["bd"];

    $conexion = mysqli_connect("localhost","root","root","$aux");
    if(!$conexion){
        echo "Error al conectar a la base de datos";
    }else{
     echo "Conectado a la base de datos $aux";
    }
?>