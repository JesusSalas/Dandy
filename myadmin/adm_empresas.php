<?
session_start();
$permiso = "super_admin";
include "checar_sesion_admin.php";
include "coneccion.php";
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0037)http://dandy.mx/index.php/login/index -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="stylesheet" type="text/css" href="../assets/css/admonStyles.css">
<link rel="stylesheet" type="text/css" href="../assets/css/lugarStyles.css">

<script src="imgs/jquery-1.6.1.js" type="text/javascript"></script>
<script src="imgs/fileuploader.js" type="text/javascript"></script>
<script src="imgs/upload_images.js" type="text/javascript"></script>

<title>Administración de empresas</title>
<style type="text/css">
<!--
.style1 {
	font-family: font_bureau__stainlessextlight;
	color: #FFFFFF;
	font-weight: bold;
	font-size:12px;
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
                         <div class="menu"><? include "menu_2.html";?></div>
                                    
    </div>
    
    <div class="clear">
      <table width="580" border="0" align="center" cellpadding="1" cellspacing="1">
        <tr>
          <td>&nbsp;</td>
          <td >&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td ><div align="right"><a href="adm_empresa_nueva.php" class="style1">Nueva Empresa ( + ) </a></div></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center" class="subTitle">Empresas</div></td>
        </tr>
		<?
		$consulta  = "select idEmpresa, Nombre from Empresas   order by Nombre";
	$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1: " . mysql_error());
	$count=1;
	while(@mysql_num_rows($resultado)>=$count)
	{
		$res=mysql_fetch_row($resultado);
		
	?>
        <tr>
          <td><a href="#"><img border="0" name="" src="../assets/imgs/delete.gif" alt="" onclick="delet(<? echo"$res[0]";?>);"/></a></td>
          <td bgcolor="" width="80%" class="select"><a href="adm_empresa_cambia.php?id=<? echo"$res[0]";?>" class="style1"><? echo"$res[1]";?>	</a></td>
        </tr>
     <?
			   $count=$count+1;
	}
	
?>  
      </table>
    </div>
    
<form action="http://dandy.mx/index.php/index/add" method="post" accept-charset="utf-8">    <div class="contentWrapper"></div>
</form>
<form action="dlt.php" method="post" id="formd"><input name="id" type="hidden" id="id" /></form>
<script>
function delet(id){
	if(confirm('estas seguro que deseas borrar?')){
		document.getElementById('id').value=id;
		document.getElementById('formd').submit();
	}
}
</script>
</body></html>