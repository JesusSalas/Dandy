<?
session_start();
$_SESSION['id_empresa']==""; $_SESSION['tipo_usuario']="";
session_destroy();
header("Location: index.php");

?>