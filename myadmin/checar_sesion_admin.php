<?
session_start();
if($_SESSION['id_empresa']=="" || $_SESSION['tipo_usuario']==""){
	include "index.php";
	exit();
}
if($_SESSION['tipo_usuario']!=$permiso){
	echo "<script>alert('Usuario no autorizado');</script>";
	echo"<script>window.location='index.php';</script>";
}
?>