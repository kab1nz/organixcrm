<?php
function generarLinkTemporal($idusuario, $username){
   // Se genera una cadena para validar el cambio de contraseña
   $cadena = $idusuario.$username.rand(1,9999999).date('Y-m-d');
   $token = sha1($cadena);
 
   include 'bd/conexion.php';
   // Se inserta el registro en la tabla tblreseteopass
   $sql = "INSERT INTO usuarios (username, creado, token) VALUES('$username',NOW(),'$token');";
   $resultado = $conexion->query($sql);
   if($resultado){
      // Se devuelve el link que se enviara al usuario
      $enlace = $_SERVER["SERVER_NAME"].'/pass/restablecer.php?idusuario='.sha1($idusuario).'&token='.$token;
      return $enlace;
   }
   else
      return FALSE;
}
 
  $texto_mail="Esto es un ejemplo";
  $destinatario = "ismaeliyoborrego@gmail.com";
  $asunto="Importante";
  $headers="MIME-Version: 1.0\r\n";
  $headers.="Content-type: text/html; charset=iso-8859-1\r\n";
  $headers.="From: Prueba Juan < kabinfor@gmail.com > \r\n";
  $exito=mail($destinatario,$asunto,$texto_mail,$headers);
  if($exito)
echo "Mensaje enviado con exito";
else
echo "Mensaje no enviado";
?>