<?php

session_start();

include "coneccion.php";

$id=$_GET['id'];

$id_q=$_GET['q'];

if($id!="" && $id_q!=""){

	$query="SELECT d.saldo_generado,d.pares,d.inscripciones,d.puntos_acumulados,m.nombre,m.app,m.apm,m.email,

			m.puntos,m.cuenta_banco,m.banco,m.rango_actual,m.id

		FROM n_detalle_cierre AS d INNER JOIN n_miembros AS m ON d.miembro=m.id WHERE d.cierre=$id AND m.id not like 1";

	$ejecuta=mysql_query($query)or die("Error al consultar detalle del cierre: ".mysql_error());

	if(mysql_num_rows($ejecuta)>0){

		$query="SELECT q.nombre,c.anio,c.nuevas_inscripciones,c.total_generado FROM n_cierres AS c INNER JOIN n_quincenas AS q ON (c.quincena+1)=q.id WHERE c.id=$id";

		$ejecutar=mysql_query($query)or die("Error al consultar corte del cierre: ".mysql_error());

		$cierre=mysql_fetch_row($ejecutar);

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

.style4 {color: #FFFFFF};}

</style>



</head>

<body style="background-image:url(images/fondo_lista.jpg)">

	<div align="center">

		<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">

			<tr>

				<td><table align="center" width="100%" border="0">

					<tr><td colspan="9">&nbsp;</td></tr>

					<tr>

						<th height="40" colspan="9"><div align="center"><span class="contenidoNegritasCH" style="color:#f63d12">DETALLE CORTE DEL: </span>

							<span class="contenidoNegritasCH"><?php echo "$cierre[0], $cierre[1]";?></span></div></th>

					</tr>

					<tr>

						<td colspan="3"><div align="right"><span class="contenidoNegritasCH" style="color:#f63d12">Nuevas Inscripciones: </span>

							<span class="contenidoNegritasCH"><?php echo "$cierre[2]";?></span></div></td>

						<td colspan="2">&nbsp;</td>

						<td colspan="4"><div align="left"><span class="contenidoNegritasCH" style="color:#f63d12">Total Generado: </span>

							<span class="contenidoNegritasCH">$<?php echo number_format($cierre[3],2,'.',',');?></span></div></td>

					</tr>

					<tr><td colspan="9" width="100%"><hr /></td></tr>

					<tr>

							<th><div align="center" class="style3"><span class="contenido" style="color:#f63d12">Usuario</span></div></th>

							<th><div align="center" class="style3"><span class="contenido" style="color:#f63d12">Sube de Rango</span></div></th>

							<th><div align="center" class="style3"><span class="contenido" style="color:#f63d12">Rango Actual</span></div></th>

							<th><div align="center" class="style3"><span class="contenido" style="color:#f63d12">Pares</span></div></th>

							<th><div align="center" class="style3"><span class="contenido" style="color:#f63d12">Inscripciones</span></div></th>

							<th><div align="center" class="style3"><span class="contenido" style="color:#f63d12">Puntos Generados</span></div></th>

							<th><div align="center" class="style3"><span class="contenido" style="color:#f63d12">Saldo Generado</span></div></th>

							<th><div align="center" class="style3"><span class="contenido" style="color:#f63d12">Número de Cuenta</span></div></th>

							<th><div align="center" class="style3"><span class="contenido" style="color:#f63d12">Banco</span></div></th>

						</tr>

					<?php

					$count=0;

					while(mysql_num_rows($ejecuta)>$count++){

						$row=mysql_fetch_array($ejecuta);

						$saldo=$row[0];

						$pares=$row[1];

						$inscripciones=$row[2];

						$puntos_periodo=$row[3];

						$nombre="$row[4] $row[5] $row[6]";

						$email=$row[7];

						$puntos=$row[8];

						$cuenta=$row[9];

						$banco=$row[10];

						$query="SELECT nombre FROM n_rangos WHERE id=$row[11]";

						$ejecutar=mysql_query($query)or die("Error al consultar rango: ".mysql_error());

						if(mysql_num_rows($ejecutar)>0){

							$info=mysql_fetch_row($ejecutar);

							$rango=$info[0];

						}else

							$rango="RECLUTADOR";

						$query="SELECT rango FROM n_detalle_cierre WHERE miembro= $row[12] AND cierre=$id";

						$ejecutar=mysql_query($query)or die("Error al consultar rango anterior: ".mysql_error());

						if(mysql_num_rows($ejecutar)>0){

							$info=mysql_fetch_row($ejecutar);

							if($info[0]==1)

								$sube="SI";

							else

								$sube="NO";

						}else

							$sube="NO";

						$query="SELECT nombre from n_rangos WHERE id=$info[0]";

						$ejecutar=mysql_query($query)or die(mysql_error());

						if(mysql_num_rows($ejecutar)>0){

							$r=mysql_fetch_row($ejecuta);

							$rango=$r[0];

						}else

							$rango="RECLUTADOR";

					?>

						<tr>

							<td><div align="center" class="style3"><span class="contenido"><?php echo "$nombre";?></span></div></td>

							<td><div align="center" class="style3"><span class="contenido"><?php echo"$sube";?></span></div></td>

							<td><div align="center" class="style3"><span class="contenido"><?php echo"$rango";?></span></div></td>

							<td><div align="center" class="style3"><span class="contenido"><?php echo"$pares";?></span></div></td>

							<td><div align="center" class="style3"><span class="contenido"><?php echo"$inscripciones";?></span></div></td>

							<td><div align="center" class="style3"><span class="contenido"><?php echo"$puntos_periodo";?></span></div></td>

							<td><div align="center" class="style3"><span class="contenido">$<?php echo number_format($saldo,2,'.',',');?></span></div></td>

							<td><div align="center" class="style3"><span class="contenido"><?php echo"$cuenta";?></span></div></td>

							<td><div align="center" class="style3"><span class="contenido"><?php echo"$banco";?></span></div></td>

						</tr>

					<?php }?>

					</table></td>

			</tr>

		</table>

	</div>

</body>

<?php }

}else

	echo"<script>parent.cerrarV();</script>";

?>