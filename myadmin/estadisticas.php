<?
session_start();
if($_SESSION['tipo_usuario'] == "admin" || $_SESSION['tipo_usuario'] == "super_admin")
	$permiso=$_SESSION['tipo_usuario'];
	$id_empresa=$_SESSION['id_empresa'];
include "checar_sesion_admin.php";
include "coneccion.php";
	$consulta  = "select contador from Empresas  where idEmpresa=$id_empresa ";
	$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1: " . mysql_error());
	$count=1;
	if(@mysql_num_rows($resultado)>0)
	{
		$res=mysql_fetch_row($resultado);
		$contador=$res[0];
	}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0037)http://dandy.mx/index.php/login/index -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="stylesheet" type="text/css" href="../assets/css/admonStyles.css">
<link rel="stylesheet" type="text/css" href="../assets/css/lugarStyles.css">

<script src="imgs/jquery-1.6.1.js" type="text/javascript"></script>
<script src="imgs/fileuploader.js" type="text/javascript"></script>
<script src="imgs/upload_images.js" type="text/javascript"></script>

<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	color: #333333;
	font-size: 14px;
}
-->
</style>
</head>
<body>

	<div class="headerWrapper">
    	<div class="logo"></div>
        <div class="title">Estadísticas</div>
                            <div class="menu">
                             <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imgs/menu_sep.png" alt="" /></td>
    <td><div align="center"><a href="adm_mi_empresa.php" class="contenido">Menú</a></div></td>
    <td><img src="imgs/menu_sep.png" alt="" /></td>
    <td><div align="center"><a href="servicio_clientes.php" class="contenido">Servicio al Cliente</a></div></td>
    <td><img src="imgs/menu_sep.png" alt="" /></td>
    <td><div align="center"><a href="estadisticas.php" class="contenido">Estadísticas</a></div></td>
    <td><img src="imgs/menu_sep.png" alt="" /></td>
    <td><div align="center"><a href="logout.php" class="contenido">Salir</a></div></td>
    <td><img src="imgs/menu_sep.png" alt="" /></td>
  </tr>
</table>
                            </div>
                                    
    </div>
    
    <div class="clear"></div>
    
<form action="http://dandy.mx/index.php/index/add" method="post" accept-charset="utf-8">    <div class="contentWrapper"></div>
</form>

<table width="565" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="345" class="contenidoNegritas"><div align="right">Número de vistas a la página: </div></td>
    <td width="220"><div align="left" class="contenido">  
      <div align="center"><? echo"$contador";?></div>
    </div></td>
  </tr>
</table>
</body></html>