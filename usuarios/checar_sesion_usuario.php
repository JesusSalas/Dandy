<?
session_start();
if($_SESSION['no_tarjeta']=="" ){
	include "http://www.dandy.mx/f_usuario.php";
	exit();
}
?>