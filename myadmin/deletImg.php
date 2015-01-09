<?php
session_start();
include "coneccion.php";
/*if($_SESSION['id_empresa']=="" || $_SESSION['tipo_usuario']==""){
	exit();
}*/
if($_SESSION['tipo_usuario']=="super_admin" || $_SESSION['tipo_usuario']=="admin"){

	if(is_file('../assets/fotos/chica_'.$_GET['nombre']) && is_file('../assets/fotos/grande_'.$_GET['nombre'])){		
	
		$consulta  = "DELETE FROM imagenes_menu WHERE nombre='".$_GET['nombre']."' AND id_empresa=".$_GET['idEmpresa'];
		$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1: " . mysql_error()." ".$consulta);
		unlink('../assets/fotos/chica_'.$_GET['nombre']);
		unlink('../assets/fotos/grande_'.$_GET['nombre']);
		$_SESSION['count']--;
	}
	else echo "is not file";
}
?>