<?php
//conecto con la base de datos del usuario
$conx = mysqli_connect("localhost", "root", "root", "BDUSUARIO") or die('Error al conectar');
//llamo a la ruta del fichero de los procedimientos
$fichero = 'Librerias/procedimientos.sql';
//escribo el contenido del fichero en una variable String
$contents = file_get_contents($fichero);
//troceo la variable String usando un delimitador y rellenando un array
$aux = explode("-- DELIMITADOR",$contents);
//llamo un bucle for que recorra el array de procedimientos
for($i=0; $i< count($aux) ;$i++){
    
    //ejecuto cada procedimiento en una query    
     mysqli_query($conx, $aux[$i])."Insercion sin problema" or print('<strong>Error en la consulta</strong> \'' . $contents . '\' - ' . mysqli_error($conx) . "<br /><br />\n");
}   
?>