<?php
function generarLinkTemporal($idusuario, $username){
   // Se genera una cadena para validar el cambio de contraseña
   $cadena = $idusuario.$username.rand(1,9999999).date('Y-m-d');
   $token = sha1($cadena);
 
   include 'bd/conexion.php';
   // Se inserta el registro en la tabla tblreseteopass
    
    //sacamos el id del username
    //$id='select GUID from usuarios where USERNAME="'.$username.'";';
    //$resultado = $conexion->query($id);
    
    //actualizamos el campo lostpassword y datelost
    $sql = 'update usuarios set LOSTPASSWORD="'.$token.'" , DATELOST=NOW() where GUID="'.$idusuario.'";';
    $resultado = $conexion->query($sql);
    
   if($resultado){
       
      // Se devuelve el link que se enviara al usuario para restablecer la contraseña
      $enlace = $_SERVER["localhost"].'/organixcrm/restablecer.php?idusuario='.sha1($idusuario).'&token='.$token;
      return $enlace;
   }else
      return FALSE;
}

    function enviarEmail($email, $link){
       $mensaje = '<html>
     <head>
        <title>Restablece tu contraseña</title>
     </head>
     <body>
       <p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
       <p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
       <p>
         <strong>Enlace para restablecer tu contraseña</strong><br>
         <a href="'. $link .'"> Restablecer contraseña </a>
       </p>
     </body>
    </html>';
        
        
      
        $asunto="Importante";
        $headers="MIME-Version: 1.0\r\n";
            $headers.="Content-type: text/html; charset=iso-8859-1\r\n";
            $headers.="From: Prueba Juan < kabinfor@gmail.com > \r\n";
            $exito=mail($email, $asunto, $mensaje,$headers);    
        
    }

    $destinatario = "proyectodam.ruben@gmail.com";
    enviarEmail($destinatario,generarLinkTemporal('2f39fb62-0ce5-11e8-bce8-d8cb8a962bce',"RUBEN"));

?>