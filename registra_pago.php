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

<link rel="stylesheet" href="../assets/color3/colorbox.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

<script src="assets/color3/jquery.colorbox.js"></script>

<script>

	$(document).ready(function(){

		//Examples of how to assign the ColorBox event to elements

		$(".iframe").colorbox({iframe:true, width:"700", height:"250"});

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

</style>

</head>

<?php

session_start();

include "coneccion.php";



$quincena=$_GET['id_quincena'];

$id=$_GET['id'];

if($id!=""){

	$query="SELECT id FROM n_pagos WHERE miembro=$id and autorizacion=0";

	$ejecuta=mysql_query($query)or die("Error en consulta inicial: ".mysql_error());

	if(mysql_num_rows($ejecuta)>0){

		echo "<script>alert(\"Ya cuentas con un pago registrado pendiente de autorización.Vuelve más tarde\");</script>";

		echo "<script>location.href='menu.php';</script>";

	}



	$query="SELECT estatus,nombre,app,apm FROM n_miembros WHERE id=$id";

	$ejecuta=mysql_query($query)or die("Error en consulta 1000: ".mysql_error());

	$row=mysql_fetch_row($ejecuta);

	$estatus=$row[0];

	$nombre="$row[1] $row[2] $row[3]";

	if($estatus==2)

		$nuevo=1;

	else

		$nuevo=0;

?>

<body>

	<!--<body>-->

			<div align="center">

        	  <table align="center" width="300" border="0" cellspacing="0" cellpadding="0">

                <tr>

                  <td height="200" valign="bottom" background=""><table width="582" border="0" align="center" cellpadding="0" cellspacing="0">

                    <tr>

                      <td colspan="3" class="subTitle2"><div align="center"><span class="subTitle2">Opciones de Pago</span></div></td>

                    </tr>

                    <tr>

                      <td width="30%"><div align="left"><span class="contenidoNegritasCH">&nbsp;</span></div></td>

                    </tr>

                  </table></td>

				</tr>

                <tr>

                  <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

					<tr>

                      <th height="35" width="33%" align="center" valign="middle"><div><span class="contenidoNegritasCH">Datos de Transferencia/Depósito Bancario </span></div></th>

					</tr>

					<tr>

					  <td valign="middle"><div align="center"><span class="contenidoNegritasCH">CLABE: 002150700769293092 <br />CUENTA: 6929309</span></div><br />

					  <form action="" method="post" name="form1" id="form1"><input type="hidden" name="miembro" id="miembro" value="<?php echo "$id";?>" />

					  	<div align="center"><span class="contenidoNegritasCH"><a href="envia_pago.php?id=<?php echo"$id&nuevo=$nuevo";?>" class="iframe">

					  	  <input style="margin-left:180px" type="button" value="Enviar Comprobante" class="saveBttn"/>

						</a></span></div></form>

					  </td>

					</tr>

					<tr>

					  <th height="35" width="33%"align="center"  valign="middle"><div><span class="contenidoNegritasCH">Pago por DineroMail</span></div></th>

					</tr>

					<tr>

					  <td valign="middle">

					  	<form action="https://checkout.dineromail.com/CheckOut" method="post" target="_parent" > <!-- Variables Obligatorias --> 

						  <table width="130px" align="center" bgcolor="#FFFFFF">

							<tr><td>

							  <div align="center"><span class="contenidoNegritasCH">

							  <input type="hidden" name="merchant" value="1674420"/>

								<input type="hidden" name="country_id" value="4" />

								<input type="hidden" name="payment_method_available" value="all" />

								<input type="hidden" name="item_name_1" value="PAGO DE LA <?php if($nuevo==1){ echo"INSCRIPCION";} else{ echo"MENSUALIDAD";} echo" - $nombre";?>" />

								<input type="hidden" name="item_quantity_1" value="1" />

								<input type="hidden" name="item_ammount_1" value="<?php if($nuevo==1){ echo "59900";}else{ echo"39900";} ?>" />

								<input type="hidden" name="item_code_1" value="<?php echo"$id";?>" /> <!-- VARIABLES DE ENViO --> 

								<input type="hidden" name="ok_url" value="http://www.dandy.mx/index.php?pago=1&id=<?php echo "$id";?>" />

								<input type="hidden" name="buyer_message" value="1" />

								<input type="hidden" name="shipping_type_1" value="1" />

								<input type="hidden" name="shipping_currency_1" value="mxn" />

								<input type="hidden" name="shipping_cost_1_1" value="100" /> <!-- Boton -->

								<input name='submit' type='image' src='https://mexico.dineromail.com/imagenes/botones/pagar-tarjetas_bn.gif?dmbypayu' alt='Pagar con DineroMail' align="middle" border='0'>

							  </span></div>

							</td></tr>

						  </table>

						</form>

					  </td>

					</tr>

					<tr>

					  <th valign="bottom" height="50" width="33%"align="center"><div><span class="contenidoNegritasCH">Pago por PayPal</span></div></th>

					</tr>

					<tr>

					  <td height="80px" valign="middle">

					  	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_parent">

						  <table width="150px" align="center" bgcolor="#FFFFFF">

							<tr><td>

							  <div align="center"><span class="contenidoNegritasCH">

							  	<input type="hidden" name="cmd" value="_xclick">

								<input type="hidden" name="business" value="dandy.operaciones@gmail.com">

								<input type="hidden" name="lc" value="MX">

								<input type="hidden" name="item_name" value="PAGO DE LA <?php if($nuevo==1){ echo"INSCRIPCION";} else{ echo"MENSUALIDAD";} echo" - $nombre";?>">

								<input type="hidden" name="item_number" value="<?php echo"$id";?>">

								<input type="hidden" name="amount" value="<?php if($nuevo==1){ echo "599.00";}else{ echo"399.00";} ?>">

								<input type="hidden" name="currency_code" value="MXN">

								<input type="hidden" name="button_subtype" value="services">

								<input type="hidden" name="no_note" value="1">

								<input type="hidden" name="no_shipping" value="1">

								<input type="hidden" name="rm" value="1">

								<input type="hidden" name="return" value="index.php?pago=1&id=<?php echo "$id";?>">

								<input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynowCC_LG.gif:NonHosted">

								<input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">

								<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">

							  </span></div>

							</td></tr>

						  </table>

						</form>

					  </td>

                    </tr>

					<!--<tr>

                      <th height="30px"><div align="center"><span class="contenidoNegritasCH">PayPal</span></div></th>

                    </tr>

                    <tr>

                      <td><div align="center"><span class="contenidoNegritasCH">&nbsp;

					</span></div></td>

                    </tr>-->

                  </table></td>

                </tr>

              </table>

          </div>

</body></html>

<?php }?>