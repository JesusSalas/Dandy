<?php
session_start();
if(!isset($_SESSION['usuario']))
	include('checar_sesion_usuario.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0033)http://dandy.mx/index.php/welcome -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style>
	html{
		margin:0 0;
		overflow-x:hidden;
		overflow-y: hidden;
	}
	body{
		background:transparent;
		margin: 0 0;
    }
</style>
<title>Untitled Document</title>
</head>
<body>
	<div>
	<?php
	include "coneccion.php";

	$consulta  = "SELECT nombre,numero_consecutivo FROM cambiar_imagen_principal";
	$resultado = mysql_query($consulta) or die("Error en operacion3: " . mysql_error());
	$count=1;

	if(@mysql_num_rows($resultado)>=1){
		$res=mysql_fetch_row($resultado);
		$nombre = $res[0];
		$counter = $res[1];
	}
	?>
	<img src="<?php echo $nombre;?>">
	</div>
</body></html>