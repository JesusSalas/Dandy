<?php



include "coneccion.php";

$idU=$_GET['idU'];

if($idU!="")

	$usuario=$idU;

else

	$usuario=$_SESSION['usuario'];



if($usuario!=""){



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>

<script>

	if(navigator.userAgent.indexOf("MSIE")>0){

		document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/lugarStylesE.css" /> ');

	}

	else{

		document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/lugarStyles.css" /> ');

	}

</script>

<link rel="stylesheet" href="../assets/color3/colorbox.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

	<script src="assets/color3/jquery.colorbox.js"></script>

	<script>

		$(document).ready(function(){

			//Examples of how to assign the ColorBox event to elements

			$(".iframe").colorbox({iframe:true, width:"700", height:"600"});

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

<style type="text/css">

	.style1 {color: #FFFFFF}

	.style3 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #FFFFFF; font-weight: bold;text-decoration: none; }

	.style4 {font-size: 14px; color: #FFFFFF; text-decoration: none; font-family: Arial, Helvetica, sans-serif;}

	body {

		margin-left: 0px;

		margin-top: 0px;

	}

	html{

	}

</style>

</head>



<body>

<table width="822" height="323" border="0"  cellpadding="0" cellspacing="0">

  <tr>

	<td height="105" valign="top" background="assets/imgs/Recompensas">

	  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

		<tr><td><div align="left" class="headerLista"></div><img src="images/banner_premios.jpg" width="100%" height="55" /></td></tr>

		<tr><td><img src="images/spacer.gif" width="20" height="20" /></td></tr>

	  </table>

	</td>

  </tr>

  <tr>

	<td height="204" background="images/abajo_lista.jpg"><div style="height:540px;overflow-x:hidden;">

	  <table width="806" height="100%" border="0"  cellpadding="0" cellspacing="0">

		<tr>

		  <td height="100%" valign="top" background="images/fondo_lista.jpg" bgcolor="#000000">

			<table width="777" border="0" align="center" cellpadding="0" cellspacing="0">

			  <?php

			  $query="SELECT id,nombre,costo_puntos,imagen,descripcion FROM n_recompensas WHERE cantidad > 0";//, Promocion1, Promocion2

			  $ejecuta=mysql_query($query) or die("Error al consultar recompensas: " . mysql_error());

			  $count=0;

			  $columna=1;

			  while(@mysql_num_rows($ejecuta)>$count){

				$res=mysql_fetch_row($ejecuta);

				$id=$res[0];

				$nombre=$res[1];

				$puntos=$res[2];

				$imagen=$res[3];

				$descripcion=$res[4];

				if($columna==1){

				  ?>

				  <tr>

					<td valign="top">

					  <table width="366" border="0" align="center" cellpadding="0" cellspacing="0">

						<tr>

						  <td width="128" valign="top"><a href="canjear.php?id=<?php echo"$id";?>&idU=<?php echo"$usuario";?>" class="iframe">

							<img src="images/recompensas/<?php echo"$imagen";?>" width="128" height="128" border="0" /></a>

						  </td>

						  <td width="20"><img src="images/spacer.gif" width="20" height="20" /></td>

						  <td width="219">

							<table width="100%" border="0" cellspacing="2" cellpadding="0">

							  <tr>

								<td><div align="left" class="subtitle"><a href="canjear.php?id=<?php echo"$id";?>&idU=<?php echo"$usuario";?>" class="subtitle iframe">

								  <?php echo"$nombre";?></a></div>

								</td>

							  </tr>

							  <tr><td><div align="left" class="descrLista"><?php echo"$descripcion";?></div></td></tr>

							  <tr><td><img src="images/franja_lista.png" width="170" height="7" /></td></tr>

							  <tr><td><div align="left" class="descuentoLista"><?php echo number_format($puntos,0,'.',',');?> PTS</div></td></tr>

							  <tr><td><img src="images/spacer.gif" width="20" height="7" /></td></tr>

							  <tr>

								<td>

								  <table width="170" border="0" cellspacing="0" cellpadding="0">

									<tr>

									  <td width="17"><img src="images/triangulo.png" width="17" height="12" /></td>

									  <td width="10"><img src="images/spacer.gif" width="10" height="10" /></td>

									  <td width="143"><div align="left" class="masLista"><a href="canjear.php?id=<?php echo"$id";?>&idU=<?php echo"$usuario";?>" class="masLista iframe">

								 	  Canjear</a></div></td>

									</tr>

								  </table>

								</td>

							  </tr>

							</table>

						  </td>

						</tr>

					  </table>

					</td>

					<td><img src="images/spacer.gif" width="40" height="20" /></td>

					<?php

					$columna="2";

				}else{

					if($columna=="2"){

						?>

						<td valign="top">

						  <table width="366" border="0" align="center" cellpadding="0" cellspacing="0">

							<tr>

							  <td width="128" valign="top"><a href="canjear.php?id=<?php echo"$id";?>&idU=<?php echo"$usuario";?>" class="iframe">

								<img src="images/recompensas/<?php echo"$imagen";?>" width="128" height="128" border="0" /></a>

							  </td>

							  <td width="20"><img src="images/spacer.gif" width="20" height="20" /></td>

							  <td width="220">

								<table width="100%" border="0" cellspacing="2" cellpadding="0">

								  <tr>

									<td><div align="left" class="subtitle"><a href="canjear.php?id=<?php echo"$id";?>&idU=<?php echo"$usuario";?>" class="subtitle iframe">

									  <?php echo"$nombre";?></a></div>

									</td>

								  </tr>

								  <tr><td><div align="left" class="descrLista"><?php echo"$descripcion";?></div></td></tr>

								  <tr><td><img src="images/franja_lista.png" width="170" height="7" /></td></tr>

								  <tr><td><div align="left" class="descuentoLista"><?php echo number_format($puntos,0,'.',',');?> PTS</div></td></tr>

								  <tr><td><img src="images/spacer.gif" width="20" height="7" /></td></tr>

								  <tr>

									<td>

									  <table width="170" border="0" cellspacing="0" cellpadding="0">

										<tr>

										  <td width="17"><img src="images/triangulo.png" width="17" height="12" /></td>

										  <td width="10"><img src="images/spacer.gif" width="10" height="10" /></td>

										  <td width="143"><div align="left" class="masLista"><a href="canjear.php?id=<?php echo"$id";?>&idU=<?php echo"$usuario";?>" class="masLista iframe">

											Canjear</a>.</div>

										  </td>

										</tr>

									  </table>

									</td>

								  </tr>

								</table>

							  </td>

							</tr>

						  </table>

						</td>

					  </tr>

					  <tr>

						<td>&nbsp;</td>

						<td><img src="images/spacer.gif" width="40" height="20" /></td>

						<td>&nbsp;</td>

					  </tr>

					  <?php

					  $columna="1";

					}

				  }

				  $count=$count+1;

				}

				if($columna=="2"){

				  ?>

				  <tr>

					<td><table width="366" border="0" align="center" cellpadding="0" cellspacing="0">

				  <tr>

					<td width="128" valign="top"><a href="javascript:ver('detalle.php?id=<?php echo"$id";?>');" ></a></td>

					<td width="10"><img src="images/spacer.gif" width="20" height="20" /></td>

					<td width="202"><table width="202" border="0" cellspacing="2" cellpadding="0">

					  <tr><td><div align="left" class="subtitle"></div></td></tr>

					  <tr><td><div align="left" class="descrLista"></div></td></tr>

					  <tr><td>&nbsp;</td></tr>

					  <tr><td><div align="left" class="deluxeLista"></div></td></tr>

					  <tr><td><div align="left" class="descuentoLista"></div></td></tr>

					  <tr><td><img src="images/spacer.gif" width="20" height="7" /></td></tr>

					  <tr>

					  	<td>

						  <table width="170" border="0" cellspacing="0" cellpadding="0">

							<tr>

							  <td width="17">&nbsp;</td>

							  <td width="10"><img src="images/spacer.gif" width="10" height="10" /></td>

							  <td width="143"><div align="left" class="masLista"><a href="javascript:ver('detalle.php?id=<?php echo"$id";?>');" class="masLista">

							  </a></div></td>

							</tr>

						  </table>

						</td>

					  </tr>

					</table></td>

				  </tr>

				</table></td>

			  </tr>

			  <tr>

			  	<td>&nbsp;</td>

				<td><img src="images/spacer.gif" width="40" height="20" /></td>

				<td>&nbsp;</td>

			  </tr>

			  <?php

			  }

			  ?>

			</table>

		  </td>

		</tr>

	  </table>

	</div></td>

  </tr>

</table>

</body>

</html>

<?php }?>