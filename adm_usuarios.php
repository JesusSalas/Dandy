<?php

session_start();

include "coneccion.php";



$opcion=$_POST['guardar'];

if($opcion=="Guardar"){

	$id=$_POST['id'];

	$tarjeta=$_POST['tarjeta'];

	$digitos=strlen($tarjeta);

	$faltan=7-$digitos;

	if($faltan>0)

		for($i=0;$i<$faltan;$i++)

			$tarjeta="0".$tarjeta;

	$codigo=$_POST['codigo'];

	$venc=$_POST['venc'];

	$nombre=$_POST['nombre'];

	$app=$_POST['app'];

	$apm=$_POST['apm'];

	$tel_casa=$_POST['telCasa'];

	$tel_ofi=$_POST['telOfi'];

	$tel_cel=$_POST['telCel'];

	$email=$_POST['email'];

	$direccion=$_POST['direccion'];

	$ciudad=$_POST['ciudad'];

	$estado=$_POST['estado'];

	$cp=$_POST['cp'];

	$fecha_nac	="$anio"."-"."$mes"."-"."$dia";

	$rfc=$_POST['rfc'];

	$genero=$_POST['genero'];

	$banco=$_POST['banco'];

	$cuenta=$_POST['cuenta'];

	$rango=$_POST['rango'];

	

	$query="UPDATE n_miembros SET tarjeta='$tarjeta',codigo=$codigo,nombre='$nombre',app='$app',apm='$apm',direccion='$direccion',cp='$cp',estado='$estado',ciudad='$ciudad',tel_fijo='$tel_casa',tel_oficina='$tel_ofi',tel_cel='$tel_cel',email='$email',rfc='$rfc',fecha_nac='$fecha_nac',genero='$genero',venc_tarjeta='$venc',rango_actual=$rango WHERE id=$id";

	if(mysql_query($query)or die($query." Error al actualizar usuario: ".mysql_error()))

		echo"<script>alert(\"Usuario actualizado satisfactoriamente.\");</script>";

}





$query="SELECT id,nombre,app,apm FROM n_miembros ";

$ejecuta=mysql_query($query)or die("Error al consultar miembros: ".mysql_error());

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script>

if(navigator.userAgent.indexOf("MSIE")>0)

{

document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/admonStylesE.css" /> ');

document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/lugarStylesE.css" /> ');

}

else

{

document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/admonStyles.css" /> ');

document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/lugarStyles.css" /> ');



}

</script>

<title>Untitled Document</title>

<style type="text/css">

<!--

body{

	background:transparent;

	margin: 0 0;

	overflow-x:hidden;

	overflow-y:hidden;

}

.style1 {

	font-family: Geneva, Arial, Helvetica, sans-serif;

	color: #FFFFFF;

	font-size: 14px;

}

.style3 {font-family: Geneva, Arial, Helvetica, sans-serif; color: #f63d12; font-size: 14px; }

a.nounderline:link   

{   

 text-decoration:none;   

}

-->

</style>

<link rel="stylesheet" href="../assets/color3/colorbox.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

	<script src="assets/color3/jquery.colorbox.js"></script>

	<script>

		$(document).ready(function(){

			//Examples of how to assign the ColorBox event to elements

			$(".iframe").colorbox({iframe:true, width:"823", height:"658" });

			$(".inline").colorbox({inline:true, width:"50%"});

			$(".callbacks").colorbox({

				onOpen:function(){ alert('onOpen: colorbox is about to open'); },

				onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },

				onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },

				onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },

				onClosed:function(){ alert('onClosed: colorbox has completely closed'); }

			});

			//Example of preserving a JavaScript event for inline calls.

			$("#click").click(function(){ 

				$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");

				return false;

			});

		});

		

		function cerrarV(){

			$.fn.colorbox.close();

		}

	</script>

<script>

	function mostrarInfo(cod){

		if(window.XMLHttpRequest)

			xmlhttp=new XMLHttpRequest();

		else

			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

		xmlhttp.onreadystatechange=function(){

			if(xmlhttp.readyState==4 && xmlhttp.status==200)

				document.getElementById("datos").innerHTML=xmlhttp.responseText;

			else

				document.getElementById("datos").innerHTML='<div align="center"><span class="contenidoNegritasCH">Cargando...</span></div>';

		}

		xmlhttp.open("POST","proceso.php",true);

		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

		xmlhttp.send("id="+cod);

	}

</script>

</head>



<body>

	<div align="center">

		<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">

			<tr>

				<td><table align="center" width="100%" border="0">

					<tr><td colspan="2">&nbsp;</td></tr>

					<tr>

						<th colspan="2"><div align="center"><span class="subTitle2">Administración de Usuarios</span></div></th>

					</tr>

					<tr><td colspan="2" width="100%"><hr /></td></tr>

					<tr>

						<td width="200"><div align="right" class="style3"><span class="contenido">Usuario</span></div></td>

						<td><div align="left" class="style3"><span class="contenido">

							<form>

							<select class="smallTxt" style="width:370px" onchange="mostrarInfo(this.value)">

								<option value="">--Selecciona un usuario--</option>

								<?php

								$count=0;

								while(mysql_num_rows($ejecuta)>$count++){

									$row=mysql_fetch_array($ejecuta);

									$id=$row[0];

									$nombre="$row[1] $row[2] $row[3]";

								?>

								<option value="<?php echo "$id";?>"><?php echo"$nombre"?></option>

								<?php }?>

							</select>

							</form>

						</span></div></td>

					</tr>

					<tr><td colspan="2" height="20px">&nbsp;</td></tr>

					<tr>

						<td colspan="2"><div id="datos"></div></td>

					</tr>

				</table></td>

			</tr>

		</table>

	</div>

</body>

</html>