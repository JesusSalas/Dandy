<?
session_start();
$permiso = "super_admin";
include "checar_sesion_admin.php";
include "coneccion.php";


$guardar= $_POST["guardar"];
if($guardar=="Guardar")  
{
	$numero1= $_POST["Numero1"];
	$numero2= $_POST["Numero2"];
	$numero3= $_POST["Numero3"];
	$numero4= $_POST["Numero4"];
	$numero="$numero1"."$numero2"."$numero3"."$numero4";
	$nombre= $_POST["nombre"];
	$direccion= $_POST["direccion"];
	$telefono= $_POST["telefono"];
	$correo= $_POST["correo"];
	$fecha_nac= $_POST["fecha_nac"];
	$fechat = explode('-', $fecha_nac);
	$fechan="$fechat[2]-$fechat[1]-$fechat[0]";
	$vigencia= $_POST["vigencia"];
	$fechat = explode('-', $vigencia);
	$fechav="$fechat[2]-$fechat[1]-$fechat[0]";	
	$activacion= $_POST["activacion"];
	$fechat = explode('-', $activacion);
	$fechaa="$fechat[2]-$fechat[1]-$fechat[0]";		
	
	$consulta  = "update Tarjetahabientes set nombre='$nombre', direccion='$direccion', telefono='$telefono', email='$correo', fecha_nac='$fechan', fecha_activacion='$fechaa', fecha_vencimiento='$fechav' where numero_tarjeta=$numero";
	$resultado = mysql_query($consulta) or die("Error en operacion: " . mysql_error());

	
	echo"<script>alert(\"Informacion Guardada\");</script>";
	
	
}
$numero= $_POST["numero"];
$numero1=substr($numero,0, 4);
	$numero2=substr($numero,4, 4);
	$numero3=substr($numero,8, 4);
	$numero4=substr($numero,12);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0037)http://dandy.mx/index.php/login/index -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="stylesheet" type="text/css" href="../assets/css/admonStyles.css">
<link rel="stylesheet" type="text/css" href="../assets/css/lugarStyles.css">

<script src="imgs/jquery-1.6.1.js" type="text/javascript"></script>
<script src="imgs/fileuploader.js" type="text/javascript"></script>
<script src="imgs/upload_images.js" type="text/javascript"></script>

<title>Administración de tarjetas</title>
<link type="text/css" href="css/smoothness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>

<SCRIPT>
	$(function() {
		$( "#fecha_nac" ).datepicker({ dateFormat: 'dd-mm-yy' });
		$( "#vigencia" ).datepicker({ dateFormat: 'dd-mm-yy' });
		$( "#activacion" ).datepicker({ dateFormat: 'dd-mm-yy' });
	});
	</SCRIPT>
<style type="text/css">
<!--
.style1 {
	font-family: font_bureau__stainlessextlight;
	color: #FFFFFF;
	font-weight: bold;
	font-size:12px;
}
.inputsMedium {	width : 200px
}
.inputsSmall {	width : 100px
}
.style3 {	color: #FFFFFF;
	font-weight: bold;
	font-family: font_bureau__stainlessextlight;
}
.style6 {color: #FFFFFF}
-->
</style>
</head>
<body>

	<div class="headerWrapper">
    	<div class="logo"></div>
        <div class="title">Portal Administrativo</div>
                         <div class="menu"><? include "menu_2.html";?></div>
                                    
    </div>
<form action="" method="post" accept-charset="utf-8">     
    <div class="clear">
      <table width="682" border="0" align="center" cellpadding="1" cellspacing="1">
        <tr>
          <td>&nbsp;</td>
          <td >&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td ><div align="right"><a href="adm_tarjeta_nueva.php" class="style1">Agregar Tarjetas ( + ) </a></div></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center" class="subTitle"></div></td>
        </tr>
       
      </table>
      <table width="800" border="0" align="center" cellpadding="3" cellspacing="3">
        <tr>
          <td colspan="6" valign="top" class="subTitle"  style="background-image:url(imgs/menu_sep.png)">Busqueda de Cliente</td>
        </tr>
        <tr>
          <td width="96" align="right" valign="top" class="style3">Numero de tarjeta</td>
          <td width="280" colspan="3" valign="top"><input name="Numero1" type="text" class="fieldSinLargo" id="Numero1" onkeyup="ira2();" value="<?echo"$numero1";?>" size="5" maxlength="4" />
            <span class="contenidoNegritas">-
            <input name="Numero2" type="text" class="fieldSinLargo" id="Numero2"  onkeyup="ira3();" value="<?echo"$numero2";?>" size="5" maxlength="4"/>
-</span>
            <input name="Numero3" type="text" class="fieldSinLargo" id="Numero3"  onkeyup="ira4();" value="<?echo"$numero3";?>" size="5" maxlength="4"/>
            <span class="contenidoNegritas">-</span>
            <input name="Numero4" type="text" class="fieldSinLargo" id="Numero4" value="<?echo"$numero4";?>" size="5" maxlength="4"/>
            <!-- <? echo ""; ?> -->
              <input name="buscar" type="submit" class="saveBttnSmall" id="buscar" value="Buscar" /></td><td width="79" align="right" valign="top">&nbsp;</td>
          <td width="218" valign="top">&nbsp;</td>
        </tr>
		<?
		$buscar= $_POST["buscar"];
if($buscar=="Buscar")  
{
		
$consulta  = "select * from Tarjetahabientes where numero_de_tarjeta = $numero";

$resultado = mysql_query($consulta) or die("Error en operacion3: " . mysql_error());
$count=1;
if(@mysql_num_rows($resultado)>=1)
{
	$empresa_info=mysql_fetch_row($resultado);
	if($empresa_info[10]=="")
		echo"<script>alert(\"Tarjeta no activada\");</script>";
	$fecha= $empresa_info[7];
	$fechat = explode('-', $fecha);
	$f_nac="$fechat[2]-$fechat[1]-$fechat[0]";
	$fecha= $empresa_info[9];
	$fechat = explode('-', $fecha);
	$f_act="$fechat[2]-$fechat[1]-$fechat[0]";
	$fecha= $empresa_info[10];
	$fechat = explode('-', $fecha);
	$f_vig="$fechat[2]-$fechat[1]-$fechat[0]";
	$tipo= $empresa_info[1];
	if($tipo=="1")
		$tipo_t="DELUXE";
	else
	{
		if($tipo=="2")
		$tipo_t="DIAMOND";
		
	}
		?>
        <tr>
          <td align="right" class="contenidoNegritas" >Nombre</td>
          <td colspan="3"><input name="nombre" type="text" id="nombre" value="<?echo"$empresa_info[2]";?>" size="50" maxlength="100" />
              <!-- <? echo ""; ?> --></td>
          <td width="79" align="right" valign="top" class="contenidoNegritas">Vigencia</td>
          <td width="218" align="center" valign="top" background="imgs/menu_sep.png" class="style3"><input name="vigencia" type="text" id="vigencia" value="<?echo"$f_vig";?>" /></td>
        </tr>
        <tr>
          <td align="right" class="contenidoNegritas" >Dirección</td>
          <td colspan="3"><input name="direccion" type="text" id="direccion" value="<?echo"$empresa_info[3]";?>" size="50" maxlength="100" />
              <!-- <? echo ""; ?> --></td>
          <td align="right"><span class="contenidoNegritas">Activación</span></td>
          <td width="218" align="center" valign="top" background="imgs/menu_sep.png" class="style3"><input name="activacion" type="text" id="activacion" value="<?echo"$f_act";?>" /></td>
        </tr>
        <tr>
          <td align="right" class="style3" ><span class="contenidoNegritas">Telefono</span></td>
          <td colspan="3"><input name="textfield3" type="text" value="<?echo"$empresa_info[5]";?>" size="30" maxlength="30" /></td>
          <td align="right"><span class="contenidoNegritas">Tipo</span></td>
          <td><span class="style6"><? echo"$tipo_t";?></span></td>
        </tr>
        <tr>
          <td align="right" class="style3" ><span class="contenidoNegritas">Correo</span></td>
          <td colspan="5"><input name="textfield4" type="text" value="<?echo"$empresa_info[4]";?>" size="50" maxlength="100" />
              <!-- <? echo ""; ?> --></td>
        </tr>
        <tr>
          <td align="right" class="style3" ><span class="contenidoNegritas">Fecha Nacimiento </span></td>
          <td colspan="5"><!-- <? echo ""; ?> -->
              <input name="fecha_nac" type="text" id="fecha_nac" value="<?echo"$f_nac";?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="5"><input name="guardar" type="submit" class="saveBttn" id="guardar" value="Guaardar" /></td>
        </tr>
		<?
		}
		}
		?>
      </table>
  </div>
    
  
</form>

</script>
</body></html>