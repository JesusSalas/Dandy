<?
session_start();
if($_SESSION['tipo_usuario'] == "admin" || $_SESSION['tipo_usuario'] == "normal" || $_SESSION['tipo_usuario'] == "super_admin")
	$permiso=$_SESSION['tipo_usuario'];
include "checar_sesion_admin.php";
include "coneccion.php";
$idEmpresa=$_SESSION['id_empresa'];

	$consulta  = "select promocion_normal, promocion_diamante, porciento_puntos_normal, porciento_puntos_diamante from Empresas where idEmpresa = $idEmpresa";
	$resultado = mysql_query($consulta) or die("Error en operacion3: " . mysql_error());
	if(@mysql_num_rows($resultado)>=1)
	{
		$prom_info=mysql_fetch_row($resultado);	
	}
$buscar= $_POST["buscar"];
$cargar= $_POST["cargar"];
if($buscar=="Buscar" || $cargar=="Cargar")
{
	$numero1= $_POST["Numero1"];
	$numero2= $_POST["Numero2"];
	$numero3= $_POST["Numero3"];
	$numero4= $_POST["Numero4"];
	$numero="$numero1"."$numero2"."$numero3"."$numero4";
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
			$tipo_t="Deluxe";
		else
		{
			if($tipo=="2")
			$tipo_t="Diamond";
			
		}
		
		if($tipo=="1")
		{
			$beneficio=$prom_info[0];
			$porcent=$prom_info[2];
		}
		else
		{
			$beneficio=$prom_info[1];
			$porcent=$prom_info[3];
		}
				
		if($cargar=="Cargar")
		{
			$consumo=$_POST["puntos_a_cargar"];
			$comentario=$_POST["comentario"];
			$punt=round(($porcent/100)*$consumo);
			$consulta  = "insert into consumos(id_empresa, id_tarjeta, fecha, monto, comentarios, puntos) values ($idEmpresa, '$numero', now(),'$comentario',$puntos)";
			$resultado = mysql_query($consulta) or die("Error en cargar: " . mysql_error());	
		}
		$consulta  = "select sum(puntos) from consumos where id_empresa = $idEmpresa and id_tarjeta='$numero'";
		$resultado = mysql_query($consulta) or die("Error en operacion3: " . mysql_error());
		if(@mysql_num_rows($resultado)>=1)
		{
			$puntos_info=mysql_fetch_row($resultado);
			$puntos=$puntos_info[0];
		}
		$consulta  = "select sum(id) from consumos where id_empresa = $idEmpresa and id_tarjeta='$numero' and resta=0";
		$resultado = mysql_query($consulta) or die("Error en operacion3: " . mysql_error());
		if(@mysql_num_rows($resultado)>=1)
		{
			$puntos_info=mysql_fetch_row($resultado);
			$visitas=$puntos_info[0];
		}
		$consulta  = "select max(fecha) from consumos where id_empresa = $idEmpresa and id_tarjeta='$numero'  and resta=0";
		$resultado = mysql_query($consulta) or die("Error en operacion3: " . mysql_error());
		if(@mysql_num_rows($resultado)>=1)
		{
			$puntos_info=mysql_fetch_row($resultado);
			$fecha= $puntos_info[0];
			$fechat = explode('-', $fecha);
			$ultima="$fechat[2]-$fechat[1]-$fechat[0]";
		}
	}
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
table{
	font-size:12px;
	color:#FFF;
	font-family: font_bureau__stainlessextlight;
}
.inputsLarge{
	width : 400px
}
.inputsMedium{
	width : 200px
}
.inputsSmall{
	width : 100px
}

.style1 {
	color: #FFFFFF;
	font-weight: bold;
	font-family: font_bureau__stainlessextlight;
}
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	color: #333333;
	font-size: 14px;
	font-family: font_bureau__stainlessextlight;
}
-->
</style>
<script>
function validacargar(){
if(document.form1.Numero1.value.length!="4" || document.form1.Numero2.value.length!="4" || document.form1.Numero3.value.length!="4" || document.form1.Numero4.value.length!="4")
		{
			alert("Numero de tarjeta incompleto");
			document.form1.Numero1.focus();
			return false;
		}else
		{
			if(document.form1.puntos_a_cargar.value=="")
			{
				alert("No escribio monto de consumo");
				document.form1.puntos_a_cargar.focus();
				return false;
			}
		}
}


function validarbuscar()
{
	if(document.form1.Numero1.value.length!="4" || document.form1.Numero2.value.length!="4" || document.form1.Numero3.value.length!="4" || document.form1.Numero4.value.length!="4")
		{
			alert("Numero de tarjeta incompleto");
			document.form1.Numero1.focus();
			return false;
		}
}
</script>
</head>
<body>

	<div class="headerWrapper">
    	<div class="logo"></div>
        <div class="title">Servicio a Clientes</div>
                            <div class="menu">
                              <ul class="menuFull">
                                <li><img src="imgs/menu_sep.png" alt="" /></li>
                                <li class="menuItem"> <a href="adm_mi_empresa.php">Menú</a></li>
                                <li><img src="imgs/menu_sep.png" alt="" /></li>
                                <li class="menuItem"> <a href="servicio_clientes.php">Servicio al Cliente</a></li>
                                <li><img src="imgs/menu_sep.png" alt="" /></li>
                                <li class="menuItem"><a href="estadisticas.php">Estadísticas</a> </li>
                                <li><img src="imgs/menu_sep.png" alt="" /></li>
                                <li class="menuItem"><a href="logout.php">Salir</a></li>
                                <li><img src="imgs/menu_sep.png" alt="" /></li>
                              </ul>
                            </div>
                                    
    </div>
    
    <div class="clear"></div>
    
<form action="" method="post" name="form1" id="form1" accept-charset="utf-8">
<div class="contentWrapper">
  <table width="800" border="0" align="center" cellpadding="3" cellspacing="3">
    <tr>
      <td colspan="6" valign="top" class="subTitle"  style="background-image:url(imgs/menu_sep.png)">Busqueda de Cliente</td>
      </tr>
    <tr>
      <td align="right" valign="top" class="style1">Numero de tarjeta</td>
      <td colspan="3" valign="top"><input name="Numero1" type="text" class="fieldSinLargo" id="Numero1" onkeyup="ira2();" value="<?echo"$numero1";?>" size="5" maxlength="4" />
        <span class="contenidoNegritas">-
        <input name="Numero2" type="text" class="fieldSinLargo" id="Numero2"  onkeyup="ira3();" value="<?echo"$numero2";?>" size="5" maxlength="4"/>
-</span>
        <input name="Numero3" type="text" class="fieldSinLargo" id="Numero3"  onkeyup="ira4();" value="<?echo"$numero3";?>" size="5" maxlength="4"/>
        <span class="contenidoNegritas">-</span>
        <input name="Numero4" type="text" class="fieldSinLargo" id="Numero4" value="<? echo"$numero4";?>" size="5" maxlength="4"/>
        
        <input name="buscar" type="submit" class="saveBttnSmall" id="buscar" value="Buscar" onclick="return validarbuscar();"/></td><td width="79" align="right" valign="top">&nbsp;</td>
      <td width="218" valign="top">&nbsp;</td>
      </tr>
    <tr>
      <td align="right" class="style1" >Nombre</td>
      <td colspan="3"><? echo"$empresa_info[2]";?></td>
      <td width="79" align="right" valign="top" class="style1">Vigencia</td>
      <td width="218" align="center" valign="top" background="imgs/menu_sep.png" class="style1"><? echo"$f_vig";?></td>
      </tr>
    <tr>
      <td align="right" class="style1" >Tipo de tarjeta</td>
      <td colspan="3"><span class="benedicioTipo"><? echo"$tipo_t";?> </span>       </td>
      <td align="right"><span class="style1">Puntos</span></td>
      <td><? echo"$puntos";?></td>
      </tr>
    <tr>
      <td align="right" class="style1" >&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td align="right"><span class="style1">&Uacute;ltima visita</span></td>
      <td><? echo"$ultima";?></td>
      </tr>
    <tr>
      <td align="right" class="style1" >Beneficios</td>
      <td colspan="5"> <? echo "$beneficios"; ?></td>
    </tr>
    <tr>
      <td align="right" class="style1" >&nbsp;</td>
      <td colspan="5"></td>
    </tr>
    <tr>
      <td colspan="6" class="subTitle" style="background-image:url(imgs/menu_sep.png)" >Registro de puntos</td>
    </tr>
    <tr>
      <td width="96" class="style1">Consumo</td>
      <td colspan="2"><input name="puntos_a_cargar" type="text" class="inputsMedium" id="puntos_a_cargar" /></td>
      <td width="70" class="style1">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      </tr>
    <tr>
      <td class="style1">Comentario</td>
      <td colspan="5"><textarea name="comentario" cols="45" rows="5" class="bigTxt" id="comentario"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="5"><input name="cargar" type="submit" class="saveBttnSmall" id="cargar" value="Cargar" onclick="retur validacargar();"/></td>
    </tr>
    <tr>
      <td colspan="6" class="subTitle"  style="background-image:url(imgs/menu_sep.png)">Historial de Visitas</td>
      </tr>
    <tr class="style1">
      <td>Fecha</td>
      <td width="99">Puntos otorgados</td>
      <td width="181">Total de consumo</td>
      <td colspan="3">Comentarios</td>
    </tr>
	<?
		$consulta  = "select DATE_FORMAT(fecha,'%d-%m-%Y'), puntos, monto, comentarios from consumos where id_empresa = $idEmpresa and id_tarjeta='$numero' order by fecha";
	$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1: " . mysql_error());
	$count=1;
	while(@mysql_num_rows($resultado)>=$count)
	{
		$res=mysql_fetch_row($resultado);
		
	?>
    <tr>
      <td><? echo"$res[0]";?></td>
      <td><? echo"$res[1]";?></td>
      <td><? echo"$res[2]";?></td>
      <td colspan="3"><? echo"$res[3]";?></td>
    </tr>
	 <?
			   $count=$count+1;
	}
	
?>
    
  </table>
</div>
</form>

</body></html>