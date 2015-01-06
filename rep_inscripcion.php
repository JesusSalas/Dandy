<?php

session_start();

$usuario=$_SESSION['usuario'];

include "coneccion.php";

include "miembros.php";



$confirma=$_POST['confirmar'];

if($confirma=="Confirmar"){

	$tarjeta=$_POST['tarjeta'];

	$digitos=strlen($tarjeta);

	$faltan=7-$digitos;

	if($faltan>0)

		for($i=0;$i<$faltan;$i++)

			$tarjeta="0".$tarjeta;

	$codigo=$_POST['codigo'];

	$upline=$_POST['upline'];

	$arriba=$_POST['arriba'];

	$miembro=$_POST['miembro'];

	$vencimiento=$_POST['vence'];

	$descripcion="PAGO DE LA INSCRIPCION";

	$aut=1;

	$password=md5("$codigo");

	

	$query="SELECT id FROM n_miembros WHERE tarjeta='$tarjeta'";

	$ejecuta=mysql_query($query)or die("Error en consulta 0001: ".mysql_error());

	if(mysql_num_rows($ejecuta)>0)

		echo "<script>alert(\"La tarjeta introducida ya se encuentra asignada\");</script>";

	else{

		$query="UPDATE n_pagos SET fecha_conf_pago=CURDATE(), autorizacion='$aut' WHERE miembro=$miembro and autorizacion=0";

		$ejecuta=mysql_query($query)or die("Error en consulta 2: ".mysql_error());

		$query="UPDATE n_miembros SET fecha_alta=CURDATE(),venc_tarjeta='$vencimiento',estatus=1,tarjeta='$tarjeta',codigo=$codigo,password='$password' WHERE id=$miembro";

		$ejecuta=mysql_query($query)or die("Error en consulta 3: ".mysql_error());

		//dep_puntos_directos($upline);

		//dep_puntos_ind($upline,$arriba);

		echo"<script>alert(\"Pago aplicado éxitosamente\");</script>";

		echo"<script>window.location=\"mail_bienvenida.php?id=$miembro\";</script>";

	}

}



$query="SELECT m.id,m.nombre,m.app,m.apm,m.upline,m.arriba,p.comprobante FROM n_miembros AS m INNER JOIN n_pagos AS p ON m.id=p.miembro WHERE estatus=2";

$ejecuta=mysql_query($query)or die("Error en consulta 1: ".mysql_error());



if(mysql_num_rows($ejecuta)<1){

	echo"<script>alert(\"No se encontraron registros de pago pendiente\");</script>";

	echo"<script>parent.cerrarV();</script>";

}else{



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!-- saved from url=(0046)http://dandy.mx/index.php/patrocinadores/index -->

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



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

<script src="assets/jQuery/jquery-1.2.6.min.js" type="text/javascript"></script>

<title>Untitled Document</title>

<style>

	html{

		margin:0 0;

	}

	body{

		background:transparent;

		margin: 0 0;

		overflow-x:hidden;

		overflow-y:hidden;

    }

.style5 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; }

.style3 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #104352; }

.style4 {color: #FFFFFF}

</style>

<script src="assets/jQuery/jquery-1.2.6.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="../assets/color3/colorbox.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

	<script src="assets/color3/jquery.colorbox.js"></script>

	<script>

		$(document).ready(function(){

			//Examples of how to assign the ColorBox event to elements

			$(".iframe").colorbox({iframe:true, width:"500", height:"400"});

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



</head>

<body style="background-image:url(images/fondo_lista.jpg)">

	<div align="center">

		<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">

			<tr>

				<td><table align="center" width="100%" border="0">

					<tr><td colspan="5">&nbsp;</td></tr>

					<tr>

						<th colspan="5"><div align="center"><span class="contenidoNegritasCH">CONFIRMACIÓN DE PAGOS</span></div></th>

					</tr>

					<tr><td colspan="5" width="100%"><hr /></td></tr>

					<tr>

							<td width="15%"><div align="center" class="style3"><span class="contenido"># de Registro</span></div></td>

							<td width="35%"><div align="center" class="style3"><span class="contenido">Nombre</span></div></td>

							<td width="20%"><div align="center" class="style3"><span class="contenido"># de Tarjeta</span></div></td>

							<td width="10%"><div align="center" class="style3"><span class="contenido">Vencimiento</span></div></td>

							<td width="10%"><div align="center" class="style3"><span class="contenido">Codigo de Seguridad</span></div></td>

							<td width="10%"><div align="right"><span class="contenido">&nbsp;</span></div></td>

						</tr>

					<?php

					$count=0;

					while(mysql_num_rows($ejecuta)>$count++){

						$row=mysql_fetch_array($ejecuta);

						$id=$row[0];

						$nombre="$row[1] $row[2] $row[3]";

						$upline=$row[4];

						$arriba=$row[5];

						$comprobante=$row[6];

					?>

					<form name="form1" method="post" action="">

						<input type="hidden" id="upline" name="upline" value="<?php echo"$upline";?>" />

						<input type="hidden" id="miembro" name="miembro" value="<?php echo"$id";?>" />

						<input type="hidden" id="arriba" name="arriba" value="<?php echo"$arriba";?>" />

						<tr>

							<td><div align="center" class="style3"><span class="contenido"><?php if($comprobante!=""){?>

								<a href="comprobantes/<?php echo"$comprobante";?>" download="<?php echo"$comprobante";?>"><?php echo"$id";?></a>

								<?php }else{ echo"$id";}?>

							</span></div></td>

							<td><div align="center" class="style3"><span class="contenido"><?php echo"$nombre";?></span></div></td>

							<td><div align="center" class="style3"><span class="contenido"><input placeholder="7 dígitos" name="tarjeta" align="middle" required type="number" class="smallTxt" id="tarjeta" size="7"  maxlength="7" style="width:156px"/></span></div></td>

							<td><div align="center" class="style3"><span class="contenido"><input name="vence" align="middle" required type="text" class="smallTxt" id="vence" size="5"  maxlength="5" style="width:70px"/></span></div></td>

							<td><div align="center" class="style3"><span class="contenido"><input name="codigo" placeholder="4 dígitos" required type="number" class="smallTxt" id="codigo" size="4" maxlength="4" style="width:121px"/></span></div></td>

							<td><div align="right"><span class="contenido">

								<input name="confirmar" type="submit" id="confirmar" value="Confirmar" />

							</span></div></td>

						</tr>

					</form>

					<?php }?>

					</table></td>

			</tr>

		</table>

	</div>

</body>

<?php }?>