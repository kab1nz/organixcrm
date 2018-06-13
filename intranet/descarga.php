<?php
$nombre=explode('/',$file);
echo $nombre[0]."<br>";
echo $nombre[1];
$rutaf="../backend/archivos/".$nombre[1];

header('Content-Type: application/force-download');
header('Content-Disposition: attachment; filename='.$nombre[1]);
header('Content-Transfer-Encoding: binary');
header('Content-Length: '.filesize($rutaf));
readfile($ruta);

?>