<?php

include "coneccion.php";

include "miembros.php";

$id_quincena=$_SESSION['id_quincena'];;



$id=$_GET['id'];

$nuevo=$_GET['nuevo'];

if($nuevo==1)

	$add="PAGO DE LA INSCRIPCIÓN";

elseif($nuevo==0)

	$add="PAGO DE LA MENSUALIDAD";

$opcion=$_POST['enviar'];

if($opcion=="Enviar"){

	include_once("Mail.php");

	$miembro=$_POST['miembro'];

	$upline=$_POST['upline'];

	$arriba=$_POST['arriba'];

	if ($_FILES["file"]["error"] > 0){

		switch ($_FILES['file'] ['error']){

			case 1:

				echo "<script>alert(\"The file is bigger than this PHP installation allows\");</script>";

			break;

			case 2:

				echo "<script>alert(\"The file is bigger than this form allows.\");</script>";

			break;

			case 3:

				echo "<script>alert(\"Only part of the file was uploaded.\");</script>";

			break;

			case 4:

				echo "<script>alert(\"No file was uploaded.\");</script>";

			break;

		}

	}else{

		$allowedExtensions = array("pdf","jpeg","jpg");

		$varr=explode(".", strtolower($_FILES['file']['name']));

		$ext=$varr[1];

		$query="SELECT id FROM n_pagos WHERE miembro=$miembro and autorizacion=0";

		$ejecuta=mysql_query($query)or die("Error en consulta 222: ".mysql_error());

		if(mysql_num_rows($ejecuta)<1){

			$query="INSERT INTO n_pagos(miembro,upline,arriba,descripcion,quincena) VALUES($miembro,$upline,$arriba,'$add',$id_quincena)";

			$ejecuta=mysql_query($query)or die("Error al insertar pago: ".mysql_error());

			$query="SELECT MAX(id) FROM n_pagos";

			$ejecuta=mysql_query($query)or die(mysql_error());

		}

		$row=mysql_fetch_array($ejecuta);

		$id_pago=$row[0];

		if(in_array($ext, $allowedExtensions)){

			$nombre="comp_$id_pago.$ext";

			if(move_uploaded_file($_FILES['file']['tmp_name'],"comprobantes/$nombre")){

			//Consulta texto del correo

				$consulta  = "update n_pagos SET comprobante='$nombre' where id=$id_pago";

				$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1: $consulta" );

				echo "<script> alert(\"Archivo cargado exitosamente.\");</script>";

				

			}

		}

		else

			echo"<script>alert(\"No se permite la carga del archivo seleccionado\");</script>";

	}

	$Body = "<html>

		<head>

		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />

		<title>Untitled Document</title>

		<style type=\"text/css\">

			body {

				margin-left: 0px;

				margin-top: 0px;

			}

		</style></head>

		<body>

			<table width=\"586\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" background=\"http://www.dandy.mx/assets/imgs/bg.png\">

				<tr>

					<td width=\"250\"><img src=\"http://www.dandy.mx/assets/imgs/logo.png\" width=\"212\" height=\"140\" /></td>

					<td width=\"315\" ><span style=\"font-size: 24px; color: #FFFFFF;\">::Alerta de Pago por Transferencia::</span></td>

					<td width=\"21\">&nbsp;</td>

				</tr>

				<tr>

					<td colspan=\"3\"><div align=\"center\" ></div></td>

				</tr>

				<tr>

					<td colspan=\"3\">

						<table width=\"464\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"style2\" style=\"font-size: 14px; font-weight: bold;color: #FFFFFF;\" >

							<tr>

								<td colspan=\"2\">&nbsp;</td>

							</tr>

							<tr>

								<td colspan=\"2\"><div align=\"center\"><strong>Se ha registrado un nuevo $add por transferencia bancaria con número de registro : $miembro</strong><br> Favor de confirmar el pago en el sitio dandy.mx</div></td>

							</tr>

							<tr>

								<td>&nbsp;</td>

								<td>&nbsp;</td>

							</tr>

						</table>

					</td>

				</tr>

				<tr>

					<td colspan=\"3\"><div align=\"center\" >&nbsp;</div></td>

				</tr>

			</table>

		</body>

	</html>";

	

	$Subject = "Dandy.mx - ALERTA DE PAGO";

	

	$EmailTo ="paolopastrana@gmail.com";

	$Host = "mail.dandy.mx"; 

	$Username = "contacto@dandy.mx"; 

	$Password = "Partner160";

	$EmailFrom = "contacto@dandy.mx";

	$Headers = array ('From' => $EmailFrom, 'To' => $EmailTo, 'Subject' => $Subject,'MIME-Version' => '1.0',

	'Content-Type' => 'text/html; charset=utf-8'); 

	$SMTP = Mail::factory('smtp', array ('host' => $Host,  'auth' => true, 'port' => '2525', 

	'username' => $Username, 'password' => $Password)); 

	  

	if($mail = $SMTP->send($EmailTo, $Headers, $Body)){

		echo"<script>alert(\"Se ha enviado el comprobante de pago a revisión, se te enviará un correo con los datos de acceso una vez que se valide el comprobante.\")</script>";

		echo"<script>parent.cerrarV();</script>";

		echo"<script>window.close();</script>";

	}

}





if($id=="")

	echo"<script>parent.cerrarV();</script>";

$query="SELECT id FROM n_pagos WHERE miembro=$id and autorizacion=0";

$ejecuta=mysql_query($query)or die ("Error en consulta 0: ".mysql_error());

if(mysql_num_rows($ejecuta)<1){

	$query="SELECT arriba, upline FROM n_miembros WHERE id=$id";

	$ejecuta=mysql_query($query)or die ("Error en consulta 1: ".mysql_error());

	if(mysql_num_rows($ejecuta)==1){

		$row=mysql_fetch_row($ejecuta);

		$arriba=$row[0];

		$upline=$row[1];

	}

}

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

</head>

<body style="background-image:url(images/fondo_lista.jpg)">

	<div align="center">

		<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">

			<tr>

				<td><table align="center" width="100%" border="0">

					<tr><td>&nbsp;</td></tr>

					<tr>

						<th><div align="center"><span class="contenidoNegritasCH">ENVÍO DE COMPROBANTE DE PAGO</span></div></th>

					</tr>

					<tr><td width="100%"><hr /></td></tr>

					<form name="form1" method="post" action="" enctype="multipart/form-data">

						<input type="hidden" id="upline" name="upline" value="<?php echo"$upline";?>" />

						<input type="hidden" id="miembro" name="miembro" value="<?php echo"$id";?>" />

						<input type="hidden" id="arriba" name="arriba" value="<?php echo"$arriba";?>" />

						<tr>

							<td><div align="center" class="style3"><span class="contenido">

								<input type="file" name="file" id="file" value=""/>

							</span></div></td>

						</tr>

						<tr>

							<td><div align="center" class="style3"><span class="contenido">

								<input type="submit" value="Enviar" name="enviar" id="enviar" class="saveBttn" target="info"/>

							</span></div></td>

						</tr>

					</form>

					</table></td>

			</tr>

		</table>

	</div>

</body>