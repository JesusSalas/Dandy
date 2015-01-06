<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0037)http://dandy.mx/index.php/login/index -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?
session_start();
if($_SESSION['tipo_usuario'] == "admin" || $_SESSION['tipo_usuario'] == "super_admin")
	$permiso=$_SESSION['tipo_usuario'];
include "checar_sesion_admin.php";
include "coneccion.php";
$id_empresa=$_SESSION['id_empresa'];
?>

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
        <div class="title">Portal Administrativo</div>
                            <div class="menu">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imgs/menu_sep.png" alt="" /></td>
    <td><div align="center"><a href="adm_mi_empresa.php" class="contenido">Menú</a></div></td>
    <td><img src="imgs/menu_sep.png" alt="" /></td>
    <td><div align="center"><a href="servicio_clientes.php" class="contenido">Servicio al Cliente</a></div></td>
    <td><img src="imgs/menu_sep.png" alt="" /></td>
    <td><div align="center"><a href="empresa_cambia.php" class="contenido">Datos Empresa  </a></div></td>
    <td><img src="imgs/menu_sep.png" alt="" /></td>
    <td><div align="center"><a href="logout.php" class="contenido">Salir</a></div></td>
    <td><img src="imgs/menu_sep.png" alt="" /></td>
  </tr>
</table>
                            </div>
                                    
    </div>
    
    <div class="clear">
      <p>&nbsp;</p>
      <table width="702" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#333333">
        <tr>
          <td colspan="2"><div align="center" class="subtitle">Menú</div></td>
        </tr>
        <tr>
          <td colspan="2" class="subtitle"><hr /></td>
        </tr>
        
        <tr>
          <td width="11"></td>
          <td bgcolor="" width="562" class="select"><a href="empresa_cambia.php" class="style1">Datos Empresa </a></td>
        </tr>
        <tr>
          <td></td>
          <td bgcolor="" width="562" class="select"><a href="servicio_clientes.php" class="style1">Servicio al Cliente</a></td>
        </tr>
        <tr>
          <td></td>
          <td bgcolor="" width="562" class="select"><a href="estadisticas.php" class="style1">Estadísticas</a></td>
        </tr>
        <tr>
          <td></td>
          <td bgcolor="" class="select">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" class="subtitle"><hr /></td>
        </tr>
        <tr>
          <td height="60"></td>
          <td bgcolor="" class="select"><table width="654" height="60" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#333333">
            <?  
			$consulta  = "select contador from Empresas  where idEmpresa=$id_empresa ";
	$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1: " . mysql_error());
	$count=1;
	if(@mysql_num_rows($resultado)>0)
	{
		$res=mysql_fetch_row($resultado);
		$contador=$res[0];
	}
	?>
            <tr>
              <td width="148" class="contenidoNegritas"><div align="left" class="contenido">
                <div align="center"><span class="numeroContador"><? echo"$contador";?> veces</span> </div>
              </div></td>
              <td width="506" class="contenidoNegritas"><div align="center"><span class="subtitle">Han visto la información de tu empresa en Dandy.mx </span></div></td>
            </tr>
          </table></td>
        </tr>
		<tr>
          <td colspan="2" class="subtitle"><hr /></td>
        </tr>
      </table>
</div>
    
<form action="http://dandy.mx/index.php/index/add" method="post" accept-charset="utf-8">    <div class="contentWrapper"></div>
</form>

</body></html>