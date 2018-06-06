<?php
    require_once("../bd/conexion.php");
    $mysqli= new mysqli("localhost","root","root",'empresa55');
    $usu=$_GET["usuario"];
    $consulta="SELECT * FROM contactos WHERE GUID='".$usu."'";
    $mysqli_query($conexion,$consulta);
?>