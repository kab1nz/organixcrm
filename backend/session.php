<?php
session_start();
$_SESSION['usuario'] = $usuario;
header("Location: index_backend.php");
?>