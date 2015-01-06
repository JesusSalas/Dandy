<?php

session_start();

$usuario=$_SESSION['usuario'];

$id_quincena=$_SESSION['id_quincena'];

include "coneccion.php";



$confirma=$_POST['confirmar'];

if($confirma=="Confirmar"){

	$upline=$_POST['upline'];

	$arriba=$_POST['arriba'];

	$miembro=$_POST['miembro'];

	

	$query="UPDATE n_pagos SET autorizacion=1,fecha_conf_pago=CURDATE() WHERE miembro=$miembro and autorizacion=0 and quincena=$id_quincena";

	$ejecuta=mysql_query($query)or die("Error en consulta 2: ".mysql_error());

	$query="UPDATE n_miembros SET estatus=1WHERE miembro=$miembro";

	$ejecuta=mysql_query($query)or die("Error en consulta 3: ".mysql_error());

	echo"<script>alert(\"Pago aplicado éxitosamente\");</script>";

}



$query="SELECT n_miembros.id,n_miembros.tarjeta,n_miembros.nombre,n_miembros.app,n_miembros.apm,n_pagos.comprobante FROM n_miembros INNER JOIN n_pagos ON n_miembros.id=n_pagos.miembro WHERE n_miembros.estatus=1 and n_pagos.autorizacion=0";

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



</head>

<body style="background-image:url(images/fondo_lista.jpg)">

	<div align="center">

		<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">

			<tr>

				<td><table align="center" width="100%" border="0">

					<tr><td colspan="5">&nbsp;</td></tr>

					<tr>

						<th colspan="4"><div align="center"><span class="contenidoNegritasCH">CONFIRMACIÓN DE PAGOS</span></div></th>

					</tr>

					<tr><td colspan="4" width="100%"><hr /></td></tr>

					<tr>

							<td width="15%"><div align="center" class="style3"><span class="contenido"># de Registro</span></div></td>

							<td width="45%"><div align="center" class="style3"><span class="contenido">Nombre</span></div></td>

							<td width="30%"><div align="center" class="style3"><span class="contenido"># de Tarjeta</span></div></td>

							<td width="10%"><div align="right"><span class="contenido">&nbsp;</span></div></td>

						</tr>

					<?php

					$count=0;

					while(mysql_num_rows($ejecuta)>$count++){

						$row=mysql_fetch_array($ejecuta);

						$id=$row[0];

						$nombre="$row[2] $row[3] $row[4]";

						$tarjeta=$row[1];

						$comprobante=$row[5];

					?>

					<form name="form1" method="post" action="">

						<input type="hidden" id="miembro" name="miembro" value="<?php echo"$id";?>" />

						<tr>

							<td><div align="center" class="style3"><span class="contenido"><?php if($comprobante!=""){?>

								<a href="comprobantes/<?php echo"$comprobante";?>" download="<?php echo"$comprobante";?>"><?php echo"$id";?></a>

								<?php }else{ echo"$id";}?>

							</span></div></td>

							<td><div align="center" class="style3"><span class="contenido"><?php echo"$nombre";?></span></div></td>

							<td><div align="center" class="style3"><span class="contenido"><?php echo"$tarjeta";?></span></div></td>

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