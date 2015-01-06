<?
session_start();
include "coneccion.php";
if($_SESSION['id_empresa']=="" || $_SESSION['tipo_usuario']==""){
	exit();
}
if($_SESSION['tipo_usuario']!="super_admin"){
	echo "<script>alert('Usuario no autorizado');</script>";
	echo"<script>window.location='index.php';</script>";
} else {
	$consulta  = "DELETE FROM Empresas WHERE idEmpresa =".$_POST['id'];
	$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1: " . mysql_error());
	$consulta  = "DELETE FROM Empresa_Categoria WHERE idEmpresa =".$_POST['id'];
	$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1: " . mysql_error());
	$consulta  = "DELETE FROM imagenes_menu WHERE id_empresa =".$_POST['id'];
	$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1: " . mysql_error());
	echo"<script>window.location='".$_SERVER['HTTP_REFERER']."';</script>";

}
?>