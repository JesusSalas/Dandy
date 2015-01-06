<?php

session_start();

include "coneccion.php";

if($_SESSION["usuario"]==1)

$quincena_actual=$_SESSION['quincena'];

$id_q=$_SESSION['id_quincena'];



$genera=$_POST['genera'];

if($genera=="Generar Cierre"){

	include "miembros.php";

	

	$cur_dia=date('d');

	$mes=date('m');

	$mes_b=$mes-1;

	if(15>$cur_dia){

		$fecha_inicio=date('Y')."-$mes_b-15";

		$fecha_final=date('Y')."-$mes-1";

	}else{

		$fecha_inicio=date('Y')."-$mes-1";

		$fecha_final=date('Y')."-$mes-15";

	}

		

	if(genera_cierre(1,$id_q-1,$fecha_inicio,$fecha_final))

		echo"<script>alert(\"Cierre de Período generado exitosamente\");</script>";

}







$query="SELECT nombre FROM n_quincenas WHERE id=".($id_q-1);

$ejecuta=mysql_query($query)or die("Error al consultar quincena: ".mysql_error());

$row=mysql_fetch_row($ejecuta);

$quincena_inicial=$row[0];



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

<link rel="stylesheet" href="../assets/color3/colorbox.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

<script src="assets/color3/jquery.colorbox.js"></script>

<script>

	$(document).ready(function(){

		//Examples of how to assign the ColorBox event to elements

		$(".iframe").colorbox({iframe:true, width:"800", height:"600"});

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



	<body>

			<div align="center">

        	  <table border="0" cellspacing="0" cellpadding="0">

                <tr>

                  <td height="231" valign="bottom" background=""><table width="582" border="0" align="center" cellpadding="0" cellspacing="0">

                    <tr><td>&nbsp;</td></tr>

					<tr height="130px" valign="middle">

                      <td class="subTitle2"><div align="center"><span class="subTitle2" style="font-size:36px">Histórico de Cierres</span></div></td>

                    </tr>

                    <tr>

                      <td class="subTitle2"><div align="center" class="benedicioTipo2"></div></td>

                    </tr>

                  </table></td>

                </tr>

				<tr>

                  <td><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">

                    <tr>

                      <td><table align="center" width="100%" border="0">

                        <tr>

                          <th width="60%" valign="top"><div align="center"><span class="contenidoNegritasCH" style="font-size:18px">PERÍODO</span></div>

						  	<div align="center" class="style3"><span class="contenido"><?php echo"$quincena_inicial - $quincena_actual";?></span></div>

						  </th>

						  <?php

						  $query="SELECT id FROM n_cierres WHERE quincena=".($id_q-1)." and anio='".date('Y')."'";

						  $ejecuta=mysql_query($query)or die("Error en consulta cierre actual: ".mysql_error());

						  if(mysql_num_rows($ejecuta)<1){

						  ?>

						  <td valign="bottom"><div align="left" class="style3"><span class="contenido">

						  	<form action="" method="post" name="form1" id="form1" accept-charset="utf-8">

							  <input type="submit" name="genera" id="genera" value="Generar Cierre" class="boton"/>

							</form>

						  </span></div></td>

						  <?php }else{?>

						  <td valign="bottom"><div align="center" class="style3"><span class="contenido">El cierre de éste período ya ha sido generado</span></div></td>

						  <?php }?>

                        </tr>

                      </table></td>

                    </tr>

                  </table></td>

                </tr>

                <?php

				$query="SELECT c.fecha_cierre, c.anio,c.nuevas_inscripciones,q.nombre,c.total_generado,c.id,c.quincena FROM n_cierres AS c 

					INNER JOIN n_quincenas AS q ON (c.quincena+1)=q.id ORDER BY fecha_cierre ASC";

				$ejecuta=mysql_query($query)or die("Error al consultar cierres: ".mysql_error());

				if(mysql_num_rows($ejecuta)>0){

				?>

				<tr>

                  <td><table width="615" border="0" align="left" cellpadding="0" cellspacing="0">

                    <tr>

                      <td width="90%"><table align="center" width="109%" border="0">

                        <tr>

                          <td>&nbsp;</td>

                        </tr>

                        <tr><td width="50%"><hr /></td></tr>

						<tr>

                          <th width="33%"><div align="center"><span class="contenidoNegritasCH" style="font-size:18px">ÚLTIMOS CIERRES GENERADOS</span></div></th>

                        </tr>

						<tr><td width="50%"><hr /></td></tr>

						<tr>

                          <td>

						  	<table width="100%" align="center" border="1">

							  <tr>

							  	<th width="25%"><div align="center" class="style3"><span class="contenido">Fecha del Cierre</span></div></th>

								<th width="25%"><div align="center" class="style3"><span class="contenido">Corte</span></div></th>

								<th width="25%"><div align="center" class="style3"><span class="contenido">Inscripciones</span></div></th>

								<th width="25%"><div align="center" class="style3"><span class="contenido">Total Generado</span></div></th>

							  </tr>

							  <?php

							  $count=0;

							  while(mysql_num_rows($ejecuta)>$count++){

							  $row=mysql_fetch_row($ejecuta);

							  ?>

							  <tr>

							  	<td><div align="center" class="style3"><span class="contenido">

								  <a href="detalle_cierre.php?id=<?php echo"$row[5]&q=$row[6]";?>" class="contenidoNegritasCH iframe"><?php echo"$row[0]";?></a></span></div></td>

								<td><div align="center" class="style3"><span class="contenido">

								  <a href="detalle_cierre.php?id=<?php echo"$row[5]&q=$row[6]";?>" class="contenidoNegritasCH iframe"><?php echo"$row[3], $row[1]";?></a></span></div></td>

								<td><div align="center" class="style3"><span class="contenido">

								  <a href="detalle_cierre.php?id=<?php echo"$row[5]&q=$row[6]";?>" class="contenidoNegritasCH iframe"><?php echo"$row[2]";?></a></span></div></td>

								<td><div align="center" class="style3"><span class="contenido">

								  <a href="detalle_cierre.php?id=<?php echo"$row[5]&q=$row[6]";?>" class="contenidoNegritasCH iframe">$<?php echo number_format($row[4],2,'.',',');?></a></span></div></td>

							  </tr>

							  <?php }?>

							</table>

						  </td>

                        </tr>

                      </table></td>

                    </tr>

                  </table>

				  </td>

                </tr>

				<?php }?>

              </table>

          </div>

</body></html>