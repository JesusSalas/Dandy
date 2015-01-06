<?php

session_start();

include "coneccion.php";

$usuario=$_GET['id'];

if($usuario!="")

$quincena_actual=$_SESSION['quincena'];

$id_q=$_SESSION['id_quincena'];



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



	<body style="background-image:url(images/fondo_lista.jpg)">

			<div align="center">

        	  <table border="0" cellspacing="0" cellpadding="0">

                <tr>

                  <td height="231" valign="bottom" background=""><table width="582" border="0" align="center" cellpadding="0" cellspacing="0">

                    <tr><td>&nbsp;</td></tr>

					<tr height="130px" valign="middle">

                      <td class="subTitle2"><div align="center"><span class="subTitle2" style="font-size:36px">Historial de Cuenta</span></div></td>

                    </tr>

                    <tr>

                      <td class="subTitle2"><div align="center" class="benedicioTipo2"></div></td>

                    </tr>

                  </table></td>

                </tr>

                <?php

				$query="SELECT id FROM n_cierres";

				$ejecuta=mysql_query($query)or die("Error al consultar cierres: ".mysql_error());

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

                          <th width="33%"><div align="center"><span class="contenidoNegritasCH" style="font-size:18px">ÚLTIMOS ESTADOS DE CUENTA</span></div></th>

                        </tr>

						<tr><td width="50%"><hr /></td></tr>

						<tr>

                          <td>

						  	<table width="100%" align="center" border="1">

							  <tr>

								<th><div align="center" class="style3"><span class="contenido">Corte</span></div></th>

								<th><div align="center" class="style3"><span class="contenido">Rango Alcanzado</span></div></th>

								<th><div align="center" class="style3"><span class="contenido">Inscripciones</span></div></th>

								<th><div align="center" class="style3"><span class="contenido">Pares</span></div></th>

								<th><div align="center" class="style3"><span class="contenido">Puntos Generados</span></div></th>

								<th><div align="center" class="style3"><span class="contenido">Saldo Generado</span></div></th>

							  </tr>

							  <?php

							  $cnt=0;

							  while(mysql_num_rows($ejecuta)>$cnt++){

								$cierre=mysql_fetch_row($ejecuta);

								$query="SELECT d.id,d.rango,d.saldo_generado,d.pares,d.inscripciones,d.puntos_acumulados,c.anio,q.nombre FROM n_detalle_cierre AS d INNER JOIN n_cierres AS c

								  ON d.cierre=c.id INNER JOIN n_quincenas AS q ON (c.quincena+1)=q.id WHERE d.miembro=$usuario AND c.id=$cierre[0] ORDER BY d.id DESC";

								$ejecuta=mysql_query($query)or die("Error al consultar cierres: ".mysql_error());

								if(mysql_num_rows($ejecuta)>0){

								  $count=0;

								while(mysql_num_rows($ejecuta)>$count++){

								$row=mysql_fetch_row($ejecuta);

								?>

								<tr>

								  <td><div align="center" class="style3"><span class="contenido">

									<?php echo"$row[7], $row[6]";?></span></div></td>

								  <td><div align="center" class="style3"><span class="contenido">

									<?php echo"$row[1]";?></span></div></td>

								  <td><div align="center" class="style3"><span class="contenido">

									<?php echo"$row[4]";?></span></div></td>

								  <td><div align="center" class="style3"><span class="contenido">

									<?php echo "$row[3]";?></a></span></div></td>

								  <td><div align="center" class="style3"><span class="contenido">

									<?php echo "$row[5]";?></a></span></div></td>

								  <td><div align="center" class="style3"><span class="contenido">

									$<?php echo number_format($row[2],2,'.',',');?></a></span></div></td>

								</tr>

								<?php }

							  }?>

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