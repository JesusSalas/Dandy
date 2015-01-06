<?php

include "coneccion.php";

session_start();

$id=$_GET['id'];

$query="SELECT estatus,nombre,app,apm,email FROM n_miembros WHERE id=$id";

$ejecuta=mysql_query($query)or die("Error en consulta 1000: ".mysql_error());

$row=mysql_fetch_row($ejecuta);

$estatus=$row[0];

$nombre="$row[1] $row[2] $row[3]";

$email=$row[4];

if($estatus==2){

	include_once("Mail.php");

	$Body = "<html>";

	$Body .= "<head>";

	$Body .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";

	$Body .= "<title>Untitled Document</title>";

	$Body .= "<style type=\"text/css\">";

	$Body .= "body {";

	$Body .= "	margin-left: 0px;";

	$Body .= "	margin-top: 0px;";

	

	$Body .= "}";

	$Body .= "</style></head>";



	$Body .= "<body>";

	$Body .= "<table width=\"586\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" background=\"http://www.dandy.mx/assets/imgs/bg.png\">";

	$Body .= "  <tr>";

	$Body .= "    <td width=\"250\"><img src=\"http://www.dandy.mx/assets/imgs/logo.png\" width=\"212\" height=\"140\" /></td>";

	$Body .= "    <td width=\"315\" ><span style=\"font-size: 24px; color: #FFFFFF;\">Bienvenido a Dandy Lifestyle!</span></td>";

	$Body .= "    <td width=\"21\">&nbsp;</td>";

	$Body .= "  </tr>";

	$Body .= "  <tr>";

	$Body .= "    <td colspan=\"3\"><div align=\"center\" ></div></td>";

	$Body .= "  </tr>";

	$Body .= "  <tr>";

	$Body .= "    <td colspan=\"3\"><table width=\"464\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"style2\" style=\"font-size: 14px; font-weight: bold;color: #FFFFFF;\" >";

	$Body .= "      <tr>";

	$Body .= "        <td colspan=\"2\">&nbsp;</td>";

	$Body .= "      </tr>";

	$Body .= "      <tr>";

	$Body .= "        <td colspan=\"2\"><div align=\"center\"><strong>Haz ingresado a una red de apoyo enfocada en tu crecimiento. \"Ahora perteneces a algo más grande, a una visión extraordinaria. Hoy eres un Dandy y el mundo te pertenece.\"</strong><br />En menos de 48 horas recibirás tu número de usuario y clave de acceso para la oficina virtual<br />Festejamos que seas parte de nuestra red</div></td>";

	$Body .= "        </tr>";

	$Body .= "    </table></td>";

	$Body .= "  </tr>";

	$Body .= "  <tr>";

	$Body .= "    <td colspan=\"3\"><div align=\"center\" >&nbsp;</div></td>";

	$Body .= "  </tr>";

	$Body .= "</table>";

	$Body .= "</body>";

	$Body .= "</html>";

	

	$Subject = "Dandy.mx - Bienvenida";

	$EmailTo = $email;

	$Host = "mail.dandy.mx"; 

	$Username = "contacto@dandy.mx"; 

	$Password = "Partner160";

	$EmailFrom = "contacto@dandy.mx";

	$Headers = array ('From' => $EmailFrom, 'To' => $EmailTo, 'Subject' => $Subject,'MIME-Version' => '1.0',

	'Content-Type' => 'text/html; charset=utf-8'); 

	$SMTP = Mail::factory('smtp', array ('host' => $Host,  'auth' => true, 'port' => '2525', 

	'username' => $Username, 'password' => $Password)); 

	  

	$mail = $SMTP->send($EmailTo, $Headers, $Body);

}

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

<script>

	function redireccion(){

		setTimeout("parent.location='http://www.dandy.mx'",5000);

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



	<body onload="redireccion()">

			<div align="center">

        	  <table width="822" border="0" cellspacing="0" cellpadding="0">

			  	<tr><td colspan="2">&nbsp;</td></tr>

                <tr>

                  <td height="231" valign="bottom"><table width="582" border="0" align="center" cellpadding="0" cellspacing="0">

                    <tr>

                      <td width="48" class="subTitle2"><div align="center"></div></td>

                      <td height="80" width="534" class="subTitle2"><div align="center"><span class="subTitle2">Gracias por registrar el pago, en un lapso no mayor a 48 horas se acreditará en tu cuenta.</span></div></td>

                    </tr>

					<tr>

                      <td width="48" class="subTitle2"><div align="center"></div></td>

                      <td height="80" width="534" class="contenidoNegritas"><div align="center"><span class="contenidoNegritas">Serás redireccionado en 5 segundos....</span></div></td>

                    </tr>

                    <tr>

                      <td colspan="2" class="subTitle2"><div align="center" class="benedicioTipo2"></div></td>

                    </tr>

                  </table></td>

                </tr>

              </table>

          </div>

</body></html>