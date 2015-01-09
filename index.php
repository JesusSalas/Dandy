<?php

session_start();

require_once "coneccion.php";

//redireccion preregistro

$registro=$_GET['registro'];

if($registro!="")

	$inicio="f_registro.php?pre=$registro";

//redireccion al realizar pago por dineromail o paypal

$pago=$_GET['pago'];

if($pago==1)

	if(($id=$_GET['id'])!="")

		$inicio="gracias.php?id=$id";



$ver=$_GET["ver"];

$ver2=$_GET["ver2"];



$meses=array('ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE');

$mes=date('m');

$cur_mes=(int)$mes-1;

$cur_dia=date('d');

$dia_q=15;

$mes_b=$mes+1;

$mes_c=$mes-1;

if($dia_q>=$cur_dia){

	$fecha_inicio=date('Y')."-$mes-1";

	$fecha_final=date('Y')."-$mes-15";

	$quincena_actual="1 de ".$meses[$mes_c];

}else{

	$fecha_inicio=date('Y')."-$mes-15";

	$fecha_final=date('Y')."-$mes_b-1";

	$quincena_actual="15 de ".$meses[$mes_c];

}

$query="SELECT id from n_quincenas WHERE nombre='$quincena_actual'";

$ejecuta=mysql_query($query)or die("Error en consulta 00000: ".mysql_error());

$res=mysql_fetch_row($ejecuta);

$id_quincena=$res[0];

$_SESSION['id_quincena']=$id_quincena;

$_SESSION['quincena']=$quincena_actual;

$_SESSION['fecha_inicio']=$fecha_inicio;

$_SESSION['fecha_final']=$fecha_final;



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!-- saved from url=(0020)http://www.dandy.mx/ -->

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<script>

if(navigator.userAgent.indexOf("MSIE")>0)

document.write(' <link rel="stylesheet" href="assets/css/stylesE.css" /> ');

else

document.write(' <link rel="stylesheet" href="assets/css/styles.css" /> ');

</script>



<script>

function verframe(valor){

window.location="#ventan";

	document.getElementById("myframe").src=valor;

}



</script>

<link rel="stylesheet" href="assets/color3/colorbox.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

<script src="assets/color3/jquery.colorbox.js"></script>

<script>

	$(document).ready(function(){

		//Examples of how to assign the ColorBox event to elements

		$(".iframe").colorbox({iframe:true, width:"550", height:"360" });

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

<title>Dandy</title>

<style type="text/css">

<!--

.style11 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }

-->

</style>

</head>



<body>

<div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";

  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>

	<div id="dBg">

    	<div id="mainBg">

		

        	<div id="logow">

        	  <table width="95%" border="0" cellspacing="0" cellpadding="0">

                <tr>

                  <td>&nbsp;</td>

                  <td>&nbsp;</td>

                </tr>

                <tr>

                  <td>&nbsp;</td>

                  <td>&nbsp;</td>

                </tr>

                <tr>

                  <td>&nbsp;</td>

                  <td><div align="right"></div></td>

                </tr>

                <tr>

                  <td>&nbsp;</td>

                  <td height="30">&nbsp;</td>

                </tr>

                <tr>

                  <td>&nbsp;</td>

                  <td><div align="right"><a href="https://www.facebook.com/dandymx" target="_blank"><img src="assets/imgs/fbBttn.png" width="30" height="30" border="0" /></a></div></td>

                </tr>

              </table>

        	</div>

			

            <div id="header">

			



            	<div id="menuTop">

                	<ul id="menuTopList">

					<table width="195" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td><div align="right">

      <table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td width="21%" class="style11">&nbsp;</td>

            <td width="64%" height="21" class="style11"><div align="right"><a href="javascript:verframe('f_home.php');" class="letrasMenu"  >HOME</a></div></td>

            <td width="15%" class="style11">&nbsp;</td>

          </tr>

          </table>

    </div></td>

    </tr>

  <?php if($_SESSION['usuario']!=1){?>

  <tr>

    <td><div align="right">

      <table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td width="12%" class="style11">&nbsp;</td>

            <td width="73%" height="21" class="style11"><div align="right"><a href="<?php  if($_SESSION['usuario']==""){ echo"javascript:verframe('f_usuarios.php?redirect=1')";}else{ echo"valida.php";}?>" class="letrasMenu <?php  if($_SESSION['usuario']!="") echo"iframe";?>" >REGISTRO</a></div></td>

            <td width="15%" class="style11">&nbsp;</td>

          </tr>

          </table>

    </div></td>

  </tr>

  <?php  }

  ?>

  <tr>

    <td><div align="right">

      <table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td width="12%" class="style11">&nbsp;</td>

            <td width="75%" height="21" class="style11"><div align="right"><a href="javascript:verframe('menu.php');" class="letrasMenu"  >OFICINA VIRTUAL</a></div></td>

            <td width="13%" class="style11">&nbsp;</td>

          </tr>

          </table>

    </div></td>

  </tr>

  <?php  if($_SESSION["usuario"]!=1){?>

  <tr>

    <td><div align="right">

      <table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td width="12%" class="style11">&nbsp;</td>

            <td width="79%" height="21" class="style11"><div align="right"><a href="javascript:verframe('f_acerca.php');" class="letrasMenu" >CONÓCENOS</a></div></td>

            <td width="9%" class="style11">&nbsp;</td>

          </tr>

          </table>

    </div></td>

  </tr>

  <tr>

    <td><div align="right">

      <table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td width="13%" class="style11">&nbsp;</td>

            <td width="82%" height="21" class="style11"><div align="right"><a href="javascript:verframe('f_contacto.php');" class="letrasMenu"  >CONTACTO</a></div></td>

            <td width="5%" class="style11">&nbsp;</td>

          </tr>

          </table>

    </div></td>

  </tr>

  <?php  }else {?>

  <tr>

    <td><div align="right">

      <table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td width="13%" class="style11">&nbsp;</td>

            <td width="74%" height="21" class="style11"><div align="right"><a href="javascript:verframe('reportes.php');" class="letrasMenu" >PAGOS</a></div></td>

            <td width="13%" class="style11">&nbsp;</td>

          </tr>

          </table>

    </div></td>

  </tr>

  <tr>

    <td><div align="right">

      <table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td width="12%" class="style11">&nbsp;</td>

            <td width="79%" height="21" class="style11"><div align="right"><a href="javascript:verframe('cierre.php');" class="letrasMenu" >CIERRE</a></div></td>

            <td width="9%" class="style11">&nbsp;</td>

          </tr>

          </table>

    </div></td>

  </tr>

  <tr>

    <td><div align="right">

      <table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td width="13%" class="style11">&nbsp;</td>

            <td width="82%" height="21" class="style11"><div align="right"><a href="javascript:verframe('adm_usuarios.php');" class="letrasMenu"  >USUARIOS</a></div></td>

            <td width="5%" class="style11">&nbsp;</td>

          </tr>

          </table>

    </div></td>

  </tr>

  <?php  }?>

</table>

                    	

                    </ul>

              </div>

                <div id="vid"><div id="vid2"><iframe src="slider2.php" name="myslider"  id="myslider" scrolling="no" width="436" height="254" style="background-image:url(assets/imgs/bg1.png)" frameborder="0">

                    </iframe></div></div>

            </div>

            <div id="main">

            	<div id="menuCenter">

                	<ul id="menuCenterList"><table width="824" height="35" border="0" align="left" cellpadding="0" cellspacing="0">

  <tr>

    <td><div align="center"><A NAME="ventan"></A><a href="javascript:verframe('lista2.php?id=1');" class="letrasMenu2" >ALIMENTOS</a></div></td>

    <td><img src="assets/imgs/separador_naranja.jpg" /></td>

    <td><div align="center"><a href="javascript:verframe('lista2.php?id=2');" class="letrasMenu2" >VIDA NOCTURNA</a></div></td>

    <td><img src="assets/imgs/separador_naranja.jpg" /></td>

    <td><div align="center"><a href="javascript:verframe('lista2.php?id=3');" class="letrasMenu2" >TIENDAS</a></div></td>

    <td><img src="assets/imgs/separador_naranja.jpg" /></td>

    <td><div align="center"><a href="javascript:verframe('lista2.php?id=4');" class="letrasMenu2" >RECREACIÓN</a></div></td>

    <td><img src="assets/imgs/separador_naranja.jpg" /></td>

    <td><div align="center"><a href="javascript:verframe('lista2.php?id=5');" class="letrasMenu2" >ACTIVIDADES</a></div></td>

    <td><img src="assets/imgs/separador_naranja.jpg" /></td>

    <td><div align="center"><a href="javascript:verframe('lista2.php?id=6');" class="letrasMenu2" >SERVICIOS</a></div></td>

  </tr>

</table>



                    	                    		

                  </ul>

                </div>

                <div id="center">

                  <div id="clientContainer">

                    <iframe src="<?php  if($inicio!="") echo"$inicio"; else if($_SESSION['usuario']=="") echo"f_home.php"; else echo"menu.php";?>" name="myframe"  id="myframe" scrolling="auto" width="823px" height="658px" style="background-image:url(images/fondo_lista.jpg)">

                    </iframe>

                  </div>

                </div>

            </div>

            <div id="footer">© Copyright Dandy Co. 2013	

            </div>

			<div id="footer"><div class="fb-like" data-href="https://www.facebook.com/dandymx" data-send="false" data-width="280" data-show-faces="false" data-colorscheme="dark"></div></div>

        </div>

    </div>



<?php  if($ver!="")

{

?>

<script>

verframe('detalle.php?id=<?php  echo"$ver";?>&idE=<?php  echo"$ver2";?>');

</script>

<?php 

}

?>

</body></html>