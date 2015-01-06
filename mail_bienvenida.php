<?php

include "coneccion.php";

header('Content-Type: text/html; charset=UTF-8'); 

$id=$_GET['id'];

if($id!=""){

	$query="SELECT tarjeta,codigo,nombre,app,apm,email,password,cuenta_banco,banco,venc_tarjeta FROM n_miembros WHERE id=$id";

	$ejecuta=mysql_query($query)or die("Error en consulta 1: ".mysql_error());

	$row=mysql_fetch_row($ejecuta);

	$tarjeta=$row[0];

	$codigo=$row[1];

	$nombre="$row[2] $row[3] $row[4]";

	$email=$row[5];

	$password="miNuevoDandy";

	$cuenta_banco=$row[7];

	$banco=$row[8];

	$vencimiento=$row[9];

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

	$Body .= "    <td width=\"315\" ><span style=\"font-size: 24px; color: #FFFFFF;\">$nombre, se ha acreditado tu pago!</span></td>";

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

	$Body .= "        <td>

		<table width=\"60%\" border=\"1\" align=\"center\" class=\"style2\" style=\"font-size: 14px; font-weight: bold;color: #FFFFFF;\" >

			<tr>

				<th width=\"60%\">USER ID</th>

				<th width=\"40%\">Código de Seguridad</th>

			</tr>

			<tr align=\"center\">

				<td>$tarjeta</td>

				<td>$codigo</td>

			</tr>

		</table></td>";

	$Body .= "        <td>&nbsp;</td>";

	$Body .= "      </tr>";

	$Body .= "      <tr>";

	$Body .= "        <td colspan=\"2\"><div align=\"center\"><strong>Formalmente, bienvenido a DandyLifestyle</strong> </div></td>";

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

	  

	if($mail = $SMTP->send($EmailTo, $Headers, $Body)){

		echo"<script>alert(\"Se ha enviado la bienvenida\")</script>";

	}

	echo "<script>parent.scrollTo(0,0)</script>";

	echo"<script>parent.cerrarV();</script>";

}else{

	echo"<script>alert(\"Error al enviar correo de bienvenida\");</script>";

	echo"<script>parent.cerrarV();</script>";

}

?>