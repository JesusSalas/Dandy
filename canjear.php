<?php

session_start();

include "coneccion.php";

$id=$_GET["id"];

$idU=$_GET['idU'];

if($idU!="")

	$usuario=$idU;

else

	$usuario=$_SESSION['usuario'];

$quincena=$_SESSION['id_quincena'];



function validaDirectos($usuario,$miembro,$quincena){

	$query="SELECT id,upline FROM n_miembros WHERE arriba=$miembro";

	$ejecuta=mysql_query($query)or die("Error al consultar rama de $miembro: ".mysql_error());

	for($i=0;$i<mysql_num_rows($ejecuta);$i++){

		$row=mysql_fetch_row($ejecuta);

		$quin=$quincena-1;

		$query="SELECT id FROM n_pagos WHERE miembro=$row[0] AND autorizacion=1 AND (quincena BETWEEN $quin AND $quincena) AND anio='".date('Y')."'";

		$ejecutar=mysql_query($query)or die($query." Error al consultar pagos de $miembro: ".mysql_error());

		if($row[1]==$usuario && mysql_num_rows($ejecutar)>0)

			$cantidad+=1;

		else

			$cantidad+=validaDirectos($usuario,$row[0],$quincena);

	}

	return $cantidad;

}



$opcion=$_POST['opcion'];

if($opcion=="Canjear"){

	$miembro=$_POST['miembro'];

	$recompensa=$_POST['recompensa'];

	$puntos=$_POST['puntos'];

	$quincena=$_SESSION['id_quincena'];

	

	$query="SELECT cantidad FROM n_recompensas WHERE id=$recompensa";

	$ejecuta=mysql_query($query)or die("Error al consultar existencia: ".mysql_error());

	$row=mysql_fetch_row($ejecuta);

	if($row[0]>0){

		$query="INSERT INTO n_canjes(id_recompensa,miembro,puntos_gastados,quincena,anio,fecha) VALUES($recompensa,$miembro,$puntos,$quincena,'".date('Y')."',CURDATE())";

		$ejecuta=mysql_query($query)or die("Error al realizar canje de puntos: ".mysql_error());

		$query="UPDATE n_recompensas SET cantidad=".$row[0]-1 ." WHERE id=$recompensa";

		$ejecuta=mysql_query($query)or die("Error al actualizar existencia: ".mysql_error());

		$query="SELECT puntos FROM n_miembros WHERE id=$miembro";

		$ejecuta=mysql_query($query)or die("Error al consultar puntos: ".mysql_error());

		$row=mysql_fetch_row($ejecuta);

		$pts=$row[0]-$puntos;

		$query="UPDATE n_miembros SET puntos=$pts WHERE id=$miembro";

		$ejecuta=mysql_query($query)or die("Error al actualizar puntos: ".mysql_error());

		

		echo"<script>alert(\"Felicidades! Haz canjeado una recompensa\");</script>";

		echo"<script>parent.location.reload();</script>";

	}

}



$query= "SELECT * FROM n_recompensas WHERE id=$id";

$ejecuta= mysql_query($query) or die("Error al consultar recompensa: " . mysql_error());

$count=1;

if(@mysql_num_rows($ejecuta)>0){

	$res=mysql_fetch_row($ejecuta);	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>

<script>

	if(navigator.userAgent.indexOf("MSIE")>0){

		document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/admonStylesE.css" /> ');

		document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/lugarStylesE.css" /> ');

	}else{

		document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/admonStyles.css" /> ');

		document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/lugarStyles.css" /> ');

	}

</script>



<style type="text/css">

	.style1 {color: #FFFFFF}

	.style3 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #FFFFFF; font-weight: bold;text-decoration: none; }

	.style4 {font-size: 14px; color: #FFFFFF; text-decoration: none; font-family: Arial, Helvetica, sans-serif;}

	.style2 {text-align:center}

	body{

		background:transparent;

		margin: 0 0;

		overflow-x:hidden;

		overflow-y:hidden;

    }

	html{

		overflow-x:hidden;

		overflow-y: scroll;

	}

</style>

</head>



<body style="background-image:url(images/fondo_lista.jpg)">

<table width="650" border="0"  cellpadding="0" cellspacing="0">

  <tr>

	<td height="25" valign="top" background="images/detalle_direccion.jpg">

	  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

		<tr><td><img src="images/spacer.gif" width="20" height="25" /></td></tr>

	  </table>

	</td>

  </tr>

  <tr>

	<td valign="top">

	  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

		<tr>

		  <td width="100%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

			<tr><td><div class="tituloDetalle style2"><?php echo"$res[1]";?></div></td></tr>

            <tr><td align="center"><img src="images/franja_detalle.png" width="60%" height="11" /></td></tr>

			<tr><td width="430" align="center"><img src="images/recompensas/<?php echo"$res[4]";?>" width="358" height="269" /></td></tr>

		  </table></td>

		</tr>

		<tr><td><img src="images/spacer.gif" width="40" height="25" /></td></tr>

        <tr><td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

		  <tr><td class="style2"><div align="center" class="tituloDetalle style2">Beneficios</div></td></tr>

		  <tr><td align="center"><img src="images/franja_detalle.png" width="60%" height="11" /></td></tr>

		  <tr><td class="style1"><div align="center" class="textoDetalle style2"><?php echo"$res[6] $res[5]";?></div></td></tr>

		  <tr><td class="style2"><div align="center" class="tituloDetalle style2">Canje</div></td></tr>

		  <tr><td align="center"><img src="images/franja_detalle.png" width="60%" height="11" /></td></tr>

		  <tr><td class="style1" valign="top" height="30"><div align="center">

			<span class="benedicio"><?php echo number_format($res[2],0,'.',',');?> PTS</span><br />

		  </div></td></tr>

		  <tr><td valign="middle">

		  	<form action="" method="post" name="form1" id="form1">

			  <input type="hidden" name="miembro" id="miembro" value="<?php echo "$usuario";?>" />

			  <input type="hidden" name="recompensa" id="recompensa" value="<?php echo"$id";?>" />

			  <input type="hidden" name="puntos" id="puntos" value="<?php echo"$res[2]";?>" />

			  <div align="center"><span class="contenidoNegritasCH">

			  	<?php

				$directos=0;

				$directos+=validaDirectos($usuario,$usuario,$quincena);

				if($directos<4){?>

				  No es posible canjear ésta recompensa.<br />Cuentas con <b><?php echo "$directos";?></b> directos activos, para poder canjear recompensas es necesario contar con 1 activo en cada una de tus 4 ramas.

				  <?php

				}else{

				  $query="SELECT puntos FROM n_miembros WHERE id=$usuario";

				  $result=mysql_query($query)or die(mysql_error());

				  $row=mysql_fetch_row($result);

				  if($row[0]>=$res[2]){

					?>

					<input style="margin-left:200px" type="submit" name="opcion" id="opcion" value="Canjear" class="saveBttn"/>

					<?php

				  }else{

					?>

					Cuentas con <b><?php echo"$row[0]";?></b> puntos, los cuales no son suficientes para canjear ésta recompensa

					<?php

				  }

				}?>

			  </span></div>

			</form>

		  </td></tr>

		</table></td></tr>

	  </table>

	</td>

  </tr>

</table>

</body>

</html>

<?php }?>