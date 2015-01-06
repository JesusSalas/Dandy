<?php

session_start();

$redirect=$_GET['redirect'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!-- saved from url=(0046)http://dandy.mx/index.php/patrocinadores/index -->

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



<script>

if(navigator.userAgent.indexOf("MSIE")>0)

{

document.write(' <link rel="stylesheet" href="assets/css/admonStylesE.css" /> ');

document.write(' <link rel="stylesheet" href="assets/css/lugarStylesE.css" /> ');

}

else

{

document.write(' <link rel="stylesheet" href="assets/css/admonStyles.css" /> ');

document.write(' <link rel="stylesheet" href="assets/css/lugarStyles.css" /> ');



}

</script>



<link rel="stylesheet" href="../assets/color3/colorbox.css" />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

		<script src="assets/color3/jquery.colorbox.js"></script>

		<script>

			$(document).ready(function(){

				//Examples of how to assign the ColorBox event to elements

				

				$(".iframe").colorbox({iframe:true, width:"530", height:"340" });

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

			

			function cerrarV()

{



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



if($_POST['entrar']!="")

{

	$login= $_POST["login"];

	$password= $_POST["pass"];

	$password=md5($password);

	$consulta  = "SELECT id, email, estatus, tipo,password from n_miembros where email='$login' AND password = '$password'";

	$res = mysql_query($consulta) or die("La consulta fall&oacute;P1: " );

	if(mysql_num_rows($res)<1){

		$digitos=strlen($login);

		$faltan=7-$digitos;

		if($faltan>0)

			for($i=0;$i<$faltan;$i++)

				$login="0".$login;

		$consulta  = "SELECT id, email, estatus, tipo,password from n_miembros where tarjeta='$login' AND password = '$password'";

		$res = mysql_query($consulta) or die("La consulta fall&oacute;P1: " );

	}

	if(md5("miNuevoDandy")==$resu[4])

		echo"<script>alert(\"Bienvenido al sitio! te recomendamos realizar el cambio de password llendo a tu oficina virtual\");</script>";

	if(@mysql_num_rows($res)==1){

		$resu=mysql_fetch_row($res);

		if($resu[2]==1){

			$_SESSION['usuario']=$resu[0];

			$_SESSION['tipo']=$resu[3];

			echo "<script>parent.scrollTo(0,0)</script>";

			echo"<script>parent.location.reload();</script>";

		}else

			echo"<script>alert(\"Su cuenta aún no se activa\n Inténtelo de nuevo cuando reciba la confirmación de su cuenta al correo registrado\");</script>";

	}else{

		echo"<script>alert(\"Correo o contraseña invalido\");</script>";

	}

}

?>

        	<form action="" method="post" name="form1" id="form1" accept-charset="utf-8">

			<div align="center">

        	  <table width="822" border="0" cellspacing="0" cellpadding="0">

                <tr>

                  <td height="231" valign="bottom" background="assets/imgs/h_usuarios.png"><table width="582" border="0" align="center" cellpadding="0" cellspacing="0">

                    <tr>

                      <td width="48" class="subTitle2"><div align="center"></div></td>

                      <td width="534" class="subTitle2"><div align="center"><span class="contenidoNegritas"><?php if($redirect!=""){?>Ingresa con tu usuario para registrar a tu invitado<?php }else{?>Ingresa a tu oficina virtual con tu número y contraseña.<br />Aquí podrás ver el movimiento de tu red, ver tu período de pago, pagar tu mensualidad, conocer las recompensas y saber cuanto dinero estás produciendo<?php }?></span></div></td>

                    </tr>

                    <tr>

                      <td colspan="2" class="subTitle2"><div align="center" class="benedicioTipo2"></div></td>

                    </tr>

                  </table></td>

                </tr>

                <tr>

                  <td><table width="671" border="0" align="center" cellpadding="0" cellspacing="0">

                    <tr>

                      <td width="62">&nbsp;</td>

                      <td width="571"><table width="109%" border="0">

                        <tr>

                          <td>&nbsp;</td>

                          <td>&nbsp;</td>

                        </tr>

                        <tr>

                          <td width="35%"><div align="right" class="style3"><span class="contenido">Correo Electrónico&nbsp;/&nbsp;<br /># de Tarjeta</span>:</div></td>

                          <td width="65%"><input name="login" type="text" class="smallTxt" id="login" size="30" maxlength="100" style="width:280px" />

                        </tr>

                        <tr>

                          <td><div align="right" class="style3"><span class="contenido">Contraseña&nbsp;</span></div></td>

                          <td><input name="pass" type="password" class="smallTxt" id="pass" size="15" maxlength="20" style="width:150px"/></td>

                        </tr>

                        <tr>

                          <td>&nbsp;</td>

                          <td>&nbsp;</td>

                        </tr>

                        <tr>

                          <td colspan="2"><div align="center"></div></td>

                        </tr>

                      </table></td>

                      <td width="17">&nbsp;</td>

                    </tr>

                  </table>

                  <p>

                    <input name="entrar" type="submit" class="saveBttn" id="entrar" value="Entrar" />

                  </p></td>

                </tr>

              </table>

          </div>

        	

        	 

        

            </form>

</body></html>