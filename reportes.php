<?php

session_start();

if($_SESSION["usuario"]!="")

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

	<?php



//include "checar_sesion_admin.php";

include "coneccion.php";



$query="SELECT p.id,m.estatus FROM n_pagos AS p INNER JOIN n_miembros AS m ON p.miembro=m.id WHERE autorizacion=0";

$ejecuta=mysql_query($query)or die("Error al consultar pagos pendientes: ".mysql_error());

$i=0;

$m=0;

for($j=0;$j<mysql_num_rows($ejecuta);$j++){

	$row=mysql_fetch_row($ejecuta);

	if($row[1]==2)

		$i++;

	else

		$m++;

}



?>

        	<form action="" method="post" name="form1" id="form1" accept-charset="utf-8">

			<div align="center">

        	  <table width="822" border="0" cellspacing="0" cellpadding="0">

                <tr>

                  <!--<td height="231" valign="bottom" background="assets/imgs/h_usuarios.png"><table width="582" border="0" align="center" cellpadding="0" cellspacing="0">-->

                    <tr><td>&nbsp;</td></tr>

					<tr>

                      <td class="subTitle2"><div align="center"><span class="subTitle2" style="font-size:36px">Actividades</span></div></td>

                    </tr>

                    <tr>

                      <td class="subTitle2"><div align="center" class="benedicioTipo2"></div></td>

                    </tr>

                  </table></td>

                </tr>

                <tr>

                  <td><table width="430" border="0" align="center" cellpadding="0" cellspacing="0">

                    <tr>

                      <td width="571"><table align="center" width="109%" border="0">

                        <tr>

                          <td>&nbsp;</td>

                        </tr>

                        <tr>

                          <th width="33%"><div align="center"><span class="contenidoNegritasCH" style="font-size:18px">CONFIRMACIÓN DE PAGOS</span></div></th>

                        </tr>

						<tr><td width="50%"><hr /></td></tr>

                        <tr>

                          <td><div align="center" class="style3"><span class="contenido">

						  	<a href="rep_inscripcion.php" class="contenidoNegritasCH iframe">Inscripción (<?php echo"$i";?>)</a>

						  </span></div></td>

                        </tr>

						<tr>

                          <td><div align="center" class="style3"><span class="contenido">

						  	<a href="rep_mensualidad.php" class="contenidoNegritasCH iframe">Mensualidad (<?php echo"$m";?>)</a>

						  </span></div></td>

                        </tr>

                        <tr>

                          <td>&nbsp;</td>

                        </tr>

                        <tr>

                          <td><div align="center"></div></td>

                        </tr>

                      </table></td>

                    </tr>

                  </table></td>

                </tr>

              </table>

          </div>

        	

        	 

        

            </form>

</body></html>