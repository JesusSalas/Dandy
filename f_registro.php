<?php

session_start();

include "coneccion.php";

$id_quincena=$_SESSION['id_quincena'];

$preregistro=$_GET['pre'];

if($preregistro=="")

	$preregistro=0;

else{

	$query="SELECT * FROM n_miembros WHERE id=$preregistro";

	$ejecuta=mysql_query($query)or die("Error al consultar 111: ".mysql_error());

	$datos_pre=mysql_fetch_row($ejecuta);

}

	

$usuario=$_SESSION['usuario'];

if($usuario=="" &&$preregistro==0)

	echo"<script>window.location='checar_sesion_usuario.php?redirect=f_registro.php';</script>";



if($usuario!=""){

	$query="SELECT id,estatus FROM n_miembros WHERE arriba=$usuario";

	$ex=mysql_query($query)or die("Error en consulta V: ".mysql_error());

	$cuenta=0;

	if(mysql_num_rows($ex)==4)

		for($i=0;$i<mysql_num_rows($ex);$i++){

			$r=mysql_fetch_row($ex);

			if($r[1]==2)

				$cuenta++;

		}

	if($cuenta>0){

		echo"<script>alert(\"No es posible enviar nueva solicitud de registro, espera a que tus primeros 4 completen su registro\");</script>";

		echo"<script>window.location='menu.php';</script>";

	}

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

		<script src="assets/color3/jquery.colorbox.js"></script>

<script>

	$(document).ready(function(){

		//Examples of how to assign the ColorBox event to elements

		$(".iframe").colorbox({iframe:true, width:"530", height:"340"});

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

//buscar la rama a insertar nuevo miembro

function buscaMiembros($directos, $resultSet){

	$nivel=0;

	for($i=0;$i<$directos;$i++){

		$row=mysql_fetch_row($resultSet);

		$query="SELECT id,nombre,app,apm FROM n_miembros WHERE arriba=$row[0]";

		$ejecuta2=mysql_query($query)or die("Error en consulta 2: ".mysql_error());

		if(mysql_num_rows($ejecuta2)>3){

			if($nivel==0)

				buscaMiembros(mysql_num_rows($ejecuta2),$ejecuta2);

		}else{

			$options.="<option value=\"$row[0]\">$row[1] $row[2] $row[3]</option>";

			$nivel=1;

		}

	}

	return $options;

}



$registrar= $_POST["registrar"];



if($registrar=="Confirmar"){

	$nombre= $_POST["Nombre"];

	$app= $_POST["App"];

	$apm= $_POST["Apm"];

	$telCasa= $_POST["TelefonoCasa"];

	$telOfi=$_POST["TelefonoOfi"];

	$telCel= $_POST["TelefonoCel"];

	$email=$_POST["email"];

	$direccion= $_POST["Direccion"];

	$ciudad= $_POST["ciudad"];

	$estado= $_POST["estado"];

	$cp= $_POST["cp"];

	$dia= $_POST["dia"];

	$mes= $_POST["mes"];

	$anio= $_POST["anio"];

	$fecha_nac	="$anio"."-"."$mes"."-"."$dia";

	$rfc=$_POST["rfc"];

	$banco=$_POST["banco"];

	$cuenta=$_POST["cuenta"];

	$genero=$_POST["genero"];



	if($cuenta==""){

		echo "<script>alert(\"Te recordamos que es necesario proporcionar un número de cuenta a la cual se te realizarán los pagos del período.\");</script>";

		echo "<script>alert(\"Puedes proporcionarla en éste mismo enlace o bien, a través de -Contacto-\");</script>";

	}



	$query="UPDATE n_miembros SET nombre='$nombre', app='$app', apm='$apm', direccion='$direccion', cp='$cp', estado='$estado', ciudad='$ciudad', tel_fijo='$telCasa', tel_oficina='$telOfi', tel_cel='$telCel', email='$email', rfc='$rfc', fecha_nac='$fecha_nac', genero=$genero, cuenta_banco='$cuenta', banco='$banco', fecha_alta=CURDATE() WHERE id=$preregistro";

	$ejecuta=mysql_query($query)or die ("Error en consulta 33: ".mysql_error());

	$query="SELECT upline,arriba,estatus FROM n_miembros WHERE id=$preregistro";

	$ejecuta=mysql_query($query);

	$dat=mysql_fetch_row($ejecuta);

	if($dat[2]==2){

		echo"<script>alert(\"Gracias por registrarte, te mostramos las opciones de pago para tu inscripción\");</script>";

		echo"<script>window.location=\"registra_pago.php?id=$preregistro\";</script>";

	}else

		echo"<script>parent.location=\"http://www.dandy.mx\";</script>";

}



if($registrar=="Registrar"){

	include_once("Mail.php");

	$nombre= $_POST["Nombre"];

	$app= $_POST["App"];

	$apm= $_POST["Apm"];

	$telCasa= $_POST["TelefonoCasa"];

	$telOfi=$_POST["TelefonoOfi"];

	$telCel= $_POST["TelefonoCel"];

	$email=$_POST["email"];

	$direccion= $_POST["Direccion"];

	$ciudad= $_POST["ciudad"];

	$estado= $_POST["estado"];

	$cp= $_POST["cp"];

	$dia= $_POST["dia"];

	$mes= $_POST["mes"];

	$anio= $_POST["anio"];

	$fecha_nac	="$anio"."-"."$mes"."-"."$dia";

	$rfc=$_POST["rfc"];

	$banco=$_POST["banco"];

	$cuenta=$_POST["cuenta"];

	$upline=$_POST["upline"];

	$genero=$_POST["genero"];

	$arriba=$_POST["arriba"];

	

	$query="SELECT id FROM n_miembros WHERE email='$email'";

	$ejecuta=mysql_query($query);

	if(mysql_num_rows($ejecuta)>0){

		echo"<script>alert(\"El correo introducido ya se encuentra registrado\n No es posible invitar de nuevo\");</script>";

		$redirect="f_registro.php";

	}else{

		$query="INSERT INTO n_miembros(nombre,app,apm,direccion,cp,estado,ciudad,tel_fijo,tel_oficina,tel_cel,email,rfc,fecha_nac,upline,arriba,genero,cuenta_banco,banco,fecha_alta)

				VALUES('$nombre','$app','$apm','$direccion','$cp','$estado','$ciudad','$telCasa','$telOfi','$telCel','$email','$rfc','$fecha_nac',$upline,$arriba,$genero,'$cuenta','$banco',CURDATE())";

		$ejecuta=mysql_query($query)or die ("Error en consulta 4: ".mysql_error());

		$query="SELECT id FROM n_miembros WHERE email='$email'";

		$ejecuta=mysql_query($query);

		$row=mysql_fetch_row($ejecuta);

		$n_miembro=$row[0];

		//envío del preregistro por correo

		$Body = "<html>";

		$Body .= "<head>";

		//$Body .= "<link rel=\"stylesheet\" href=\"http://www.dandy.mx/assets/css/lugarStyles.css\">";

		$Body .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";

		$Body .= "<title>Untitled Document</title>";

		$Body .= "<style type=\"text/css\">";

		//$Body .= "<!--";

		$Body .= "body {";

		$Body .= "	margin-left: 0px;";

		$Body .= "	margin-top: 0px;";

		

		$Body .= "}";

		//$Body .= ".style1 { font-size: 24px; font-weight: bold;color: #FFFFFF;}.style2 { font-size: 14px; font-weight: bold;color: #FFFFFF;}";

		//$Body .= "-->";

		$Body .= "</style></head>";

	

		$Body .= "<body>";

		$Body .= "<table width=\"586\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" background=\"http://www.dandy.mx/assets/imgs/bg.png\">";

		$Body .= "  <tr>";

		$Body .= "    <td width=\"250\"><img src=\"http://www.dandy.mx/assets/imgs/logo.png\" width=\"212\" height=\"140\" /></td>";

		$Body .= "    <td width=\"315\" ><span style=\"font-size: 24px; color: #FFFFFF;\">Felicidades $nombre $app $apm!</span></td>";

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

		$Body .= "        <td colspan=\"2\"><div align=\"center\"><strong>Has sido invitado al gremio más revolucionario y exclusivo del mundo.Ingresa <a href=\"http://www.dandy.mx/index.php?registro=$n_miembro\"> AQUÍ</a> y termina de llenar la forma de registro con tus datos.</strong> </div></td>";

		$Body .= "        </tr>";

		$Body .= "      <tr>";

		$Body .= "        <td>&nbsp;</td>";

		$Body .= "        <td>&nbsp;</td>";

		$Body .= "      </tr>";

		$Body .= "      <tr>";

		$Body .= "        <td colspan=\"2\">Saludos Cordiales, <br/>Equipo de DandyCo.</td>";

		$Body .= "      </tr>";

		$Body .= "    </table></td>";

		$Body .= "  </tr>";

		$Body .= "  <tr>";

		$Body .= "    <td colspan=\"3\"><div align=\"center\" >&nbsp;</div></td>";

		$Body .= "  </tr>";

		$Body .= "</table>";

		$Body .= "</body>";

		$Body .= "</html>";

		

		$Subject = "Dandy.mx - Registro";

		

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

				echo"<script>alert(\"Se ha enviado la confirmación de registro al correo:$email\")</script>";

				$redirect="menu.php";

			}

		}

	echo "<script>parent.scrollTo(0,0)</script>";

	echo"<script>window.location='$redirect';</script>";

}

?>

	<body>

	<!--<body>-->

        	<form action="" method="post" name="form1" id="form1" accept-charset="utf-8">

			<div align="center">

        	  <table width="822" border="0" cellspacing="0" cellpadding="0" background="assets/imgs/h_registrate.png" style="background-repeat:no-repeat;">

                <tr>

                  <td height="200" valign="bottom"><table width="582" border="0" align="center" cellpadding="0" cellspacing="0">

                    <tr>

                      <td colspan="2" class="subTitle2"><div align="center"><span class="subTitle2">Datos Personales</span></div></td>

                    </tr>

                    <tr>

                      <td class="subTitle2"><!--<span class="contenidoNegritas">Ya tienes la tarjeta en tus manos, ahora sólo tienes que activarla para obtener los beneficios de un auténtico Dandy ¿Qué esperas para unirte a la experiencia? </span>--></td>

                    </tr>

					<?php

					  if($usuario!=""){

						  $query="SELECT id,nombre,app,apm FROM n_miembros WHERE arriba=$usuario";

						  $ejecuta=mysql_query($query)or die("Error en consulta 1: ".mysql_error());

						  $primer_rama=mysql_num_rows($ejecuta);

						  $options="";

						  if($primer_rama<4){

							  $opciones="<option value=\"$usuario\"><div class=\"smallTxt\">TÚ(aún no completas los primeros 4)</div></option>";

						  }else

							$opciones=buscaMiembros($primer_rama,$ejecuta);

						}

					  ?>

                    <tr><?php if($preregistro!=0){

						$query="SELECT nombre,app,apm FROM n_miembros where id=$datos_pre[17]";

					  	$ejecuta=mysql_query($query)or die("Error en consulta 100: ".mysql_error());

						$row=mysql_fetch_row($ejecuta);?>

                      <td width="30%"><div align="center"><span class="contenidoNegritasCH">

					  	Invita &nbsp;</span></div></td>

					  <td><input size="10" class="smallTxt" readonly value="<?php echo "$row[0] $row[1] $row[2]";?>" />

					  </td><?php }else{?>

					  <td width="30%"><div align="center"><span class="contenidoNegritasCH">Elige la rama</span></div></td>

					  <td> <select class="smallTxt" style="width:370px" name="arriba"><?php echo "$opciones";?></select>

					  </td><input type="hidden" name="upline" id="upline" value="<?php echo"$usuario";?>" />

					  <?php }?>

                    </tr>

					<tr>

                      <td>&nbsp;</td>

                    </tr>

                  </table></td>

				</tr>

                <tr>

                  <td><table width="577" border="0" align="center" cellpadding="0" cellspacing="0">

                    <tr>

                      <td width="300"><div align="right"><span class="contenidoNegritasCH">Nombre* &nbsp;</span></div></td>

					  <td><div align="left">

                        <input value="<?php if($preregistro!=0) echo"$datos_pre[3]";?>" style="width:327px" required size="15" name="Nombre" type="text" class="smallTxt" id="Nombre" maxlength="100">

                      </div></td>

                    </tr>					

					<tr>

                      <td><div align="right"><span class="contenidoNegritasCH">Apellido Paterno* &nbsp;</span></div></td>

					  <td><div align="left">

                      <input required size="30" style="width:327px" value="<?php if($preregistro!=0) echo"$datos_pre[4]";?>" name="App" type="text" class="smallTxt" id="Apm" maxlength="100">

                      </div></td>

                    </tr>

					<tr>

                      <td><div align="right"><span class="contenidoNegritasCH">Apellido Materno &nbsp;</span></div></td>

					  <td><div align="left">

                        <input size="30" style="width:327px" value="<?php if($preregistro!=0) echo"$datos_pre[5]";?>" name="Apm" type="text" class="smallTxt" id="Apm" maxlength="100">

                      </div></td>

                    </tr>

                    <tr>

                      <td><div align="right"><span class="contenidoNegritasCH">Teléfono de Casa &nbsp;</span></div></td>

					  <td><div align="left">

                        <input size="10" style="width:327px" value="<?php if($preregistro!=0) echo"$datos_pre[10]";?>" name="TelefonoCasa" type="text" class="smallTxt" id="TelefonoCasa" maxlength="10">

                      </div></td>

                    </tr>

                    <tr>

                      <td><div align="right"><span class="contenidoNegritasCH">Teléfono de Oficina &nbsp;</span></div></td>

					  <td><div align="left">

                        <input name="TelefonoOfi" size="10" type="text" class="smallTxt" style="width:327px" value="<?php if($preregistro!=0) echo"$datos_pre[11]";?>" id="TelefonoOfi" maxlength="10">

                      </div></td>

                    </tr>

                    <tr>

                      <td><div align="right"><span class="contenidoNegritasCH">Teléfono Celular<?php if($preregistro!=0) echo"*";?> &nbsp;</span></div></td>

					  <td><div align="left">

                        <input name="TelefonoCel" style="width:327px" value="<?php if($preregistro!=0) echo"$datos_pre[12]";?>" <?php if($preregistro!=0) echo"required";?> size="10" type="text" class="smallTxt" id="TelefonoCel" maxlength="10">

                      </div></td>

                    </tr>

					<tr>

                      <td><div align="right"><span class="contenidoNegritasCH">Correo Electrónico<?php if($preregistro!=0) echo"*";?> &nbsp;</span></div></td>

					  <td><div align="left">

                        <input required name="email" value="<?php if($preregistro!=0) echo"$datos_pre[13]";?>" style="width:327px" size="30" type="email" class="smallTxt" id="email" maxlength="100">

                      </div></td>

                    </tr>

                    <tr>

                      <td><div align="right"><span class="contenidoNegritasCH">Dirección<?php if($preregistro!=0) echo"*";?> &nbsp;</span></div></td>

					  <td><div align="left">

                        <input name="Direccion" size="30" style="width:327px" value="<?php if($preregistro!=0) echo"$datos_pre[6]";?>" <?php if($preregistro!=0) echo"required";?> type="text" class="smallTxt" id="Direccion" maxlength="200">

                      </div></td>

					</tr>

					<tr>

					  <td><div align="right"><span class="contenidoNegritasCH">Ciudad<?php if($preregistro!=0) echo"*";?> &nbsp;</span></div></td>

					  <td><div align="left">

                        <input name="ciudad"  size="30" style="width:327px" value="<?php if($preregistro!=0) echo"$datos_pre[9]";?>" <?php if($preregistro!=0) echo"required";?> type="text" class="smallTxt" id="ciudad" maxlength="100">

                      </div></td>

					</tr>

					<tr>

					  <td><div align="right"><span class="contenidoNegritasCH">Estado<?php if($preregistro!=0) echo"*";?> &nbsp;</span></div></td>

					  <td><div align="left">

                        <input name="estado" style="width:327px" value="<?php if($preregistro!=0) echo"$datos_pre[8]";?>" <?php if($preregistro!=0) echo"required";?> type="text" size="30" class="smallTxt" id="estado" maxlength="100">

                      </div></td>

					</tr>

					<tr>

                      <td><div align="right"><span class="contenidoNegritasCH">CP<?php if($preregistro!=0) echo"*";?> &nbsp;</span></div></td>

					  <td><div align="left">

                        <input size="10" style="width:327px" name="cp" value="<?php if($preregistro!=0) echo"$datos_pre[7]"; else echo"";?>" <?php if($preregistro!=0) echo"required";?> type="number" class="smallTxt" id="cp" maxlength="10">

                      </div></td>

                    </tr>

                    <tr>

                      <td><div align="right"><span class="contenidoNegritasCH">Fecha de&nbsp; Nacimimiento &nbsp;</span></div></td>

					  <td><div align="left"><span class="style5">

                        <select name="dia" class="smallTxt" style="width:50px" id="dia">

                          <option value="01" <?php if(substr($datos_pre[16],8,2)=="01")echo"selected";?>>1</option>

                          <option value="02" <?php if(substr($datos_pre[16],8,2)=="02")echo"selected";?>>2</option>

                          <option value="03" <?php if(substr($datos_pre[16],8,2)=="03")echo"selected";?>>3</option>

                          <option value="04" <?php if(substr($datos_pre[16],8,2)=="04")echo"selected";?>>4</option>

                          <option value="05" <?php if(substr($datos_pre[16],8,2)=="05")echo"selected";?>>5</option>

                          <option value="06" <?php if(substr($datos_pre[16],8,2)=="06")echo"selected";?>>6</option>

                          <option value="07" <?php if(substr($datos_pre[16],8,2)=="07")echo"selected";?>>7</option>

                          <option value="08" <?php if(substr($datos_pre[16],8,2)=="08")echo"selected";?>>8</option>

                          <option value="09" <?php if(substr($datos_pre[16],8,2)=="09")echo"selected";?>>9</option>

                          <option value="10" <?php if(substr($datos_pre[16],8,2)=="10")echo"selected";?>>10</option>

                          <option value="11" <?php if(substr($datos_pre[16],8,2)=="11")echo"selected";?>>11</option>

                          <option value="12" <?php if(substr($datos_pre[16],8,2)=="12")echo"selected";?>>12</option>

                          <option value="13" <?php if(substr($datos_pre[16],8,2)=="13")echo"selected";?>>13</option>

                          <option value="14" <?php if(substr($datos_pre[16],8,2)=="14")echo"selected";?>>14</option>

                          <option value="15" <?php if(substr($datos_pre[16],8,2)=="15")echo"selected";?>>15</option>

                          <option value="16" <?php if(substr($datos_pre[16],8,2)=="16")echo"selected";?>>16</option>

                          <option value="17" <?php if(substr($datos_pre[16],8,2)=="17")echo"selected";?>>17</option>

                          <option value="18" <?php if(substr($datos_pre[16],8,2)=="18")echo"selected";?>>18</option>

                          <option value="19" <?php if(substr($datos_pre[16],8,2)=="19")echo"selected";?>>19</option>

                          <option value="20" <?php if(substr($datos_pre[16],8,2)=="20")echo"selected";?>>20</option>

                          <option value="21" <?php if(substr($datos_pre[16],8,2)=="21")echo"selected";?>>21</option>

                          <option value="22" <?php if(substr($datos_pre[16],8,2)=="22")echo"selected";?>>22</option>

                          <option value="23" <?php if(substr($datos_pre[16],8,2)=="23")echo"selected";?>>23</option>

                          <option value="24" <?php if(substr($datos_pre[16],8,2)=="24")echo"selected";?>>24</option>

                          <option value="25" <?php if(substr($datos_pre[16],8,2)=="25")echo"selected";?>>25</option>

                          <option value="26" <?php if(substr($datos_pre[16],8,2)=="26")echo"selected";?>>26</option>

                          <option value="27" <?php if(substr($datos_pre[16],8,2)=="27")echo"selected";?>>27</option>

                          <option value="28" <?php if(substr($datos_pre[16],8,2)=="28")echo"selected";?>>28</option>

                          <option value="29" <?php if(substr($datos_pre[16],8,2)=="29")echo"selected";?>>29</option>

                          <option value="30" <?php if(substr($datos_pre[16],8,2)=="30")echo"selected";?>>30</option>

                          <option value="31" <?php if(substr($datos_pre[16],8,2)=="31")echo"selected";?>>31</option>

                        </select>

                        <select name="mes" class="smallTxt" style="width:150px" id="mes">

                          <option value="01" <?php if(substr($datos_pre[16],5,2)=="01")echo"selected";?>>Enero</option>

                          <option value="02" <?php if(substr($datos_pre[16],5,2)=="02")echo"selected";?>>Febrero</option>

                          <option value="03" <?php if(substr($datos_pre[16],5,2)=="03")echo"selected";?>>marzo</option>

                          <option value="04" <?php if(substr($datos_pre[16],5,2)=="04")echo"selected";?>>Abril</option>

                          <option value="05" <?php if(substr($datos_pre[16],5,2)=="05")echo"selected";?>>Mayo</option>

                          <option value="06" <?php if(substr($datos_pre[16],5,2)=="06")echo"selected";?>>Junio</option>

                          <option value="07" <?php if(substr($datos_pre[16],5,2)=="07")echo"selected";?>>Julio</option>

                          <option value="08" <?php if(substr($datos_pre[16],5,2)=="08")echo"selected";?>>Agosto</option>

                          <option value="09" <?php if(substr($datos_pre[16],5,2)=="09")echo"selected";?>>Septiembre</option>

                          <option value="10" <?php if(substr($datos_pre[16],5,2)=="10")echo"selected";?>>Octubre</option>

                          <option value="11" <?php if(substr($datos_pre[16],5,2)=="11")echo"selected";?>>Noviembre</option>

                          <option value="12" <?php if(substr($datos_pre[16],5,2)=="12")echo"selected";?>>Diciembre</option>

                        </select>

                        <select name="anio" class="smallTxt" style="width:80px" id="select3">

                          <?php

		  for($i=date('Y'); $i>1930; $i--)

		  {

		  ?>

                          <option value="<?php echo"$i";?>" <?php if(substr($datos_pre[16],0,4)==$i) echo "selected";?> ><?php echo"$i";?></option>

                          <?php

		  }

		  ?>

                        </select>

                      </span></div></td>

					</tr>

					<tr>

					  <td><div align="right"><span class="contenidoNegritasCH">RFC &nbsp;</span></div></td>

                      <td><div align="left"><span class="style5"><input size="30" style="width:327px" value="<?php if($preregistro!=0) echo"$datos_pre[15]";?>" name="rfc" type="text" class="smallTxt" id="rfc" maxlength="15"></span></div></td>

					</tr>

					<tr>

					  <td><div align="right"><span class="contenidoNegritasCH">Género* &nbsp;</span></div></td>

					  <td height="45"><div align="left"><span class="style5"><span class="smallTxt"><input type="radio" name="genero" id="genero" value="0"<?php if($preregistro!=0) if($datos_pre[19]==0) echo "checked"; ?> >Hombre</span>

					  	<span class="smallTxt"><input type="radio" name="genero" <?php if($preregistro!=0) if($datos_pre[19]==1) echo "checked"; ?> id="genero" value="1">Mujer</span></span></div></td>

                    </tr>

					<tr>

                      <td><div align="right"><span class="contenidoNegritasCH">Banco &nbsp;</span></div></td>

					  <td><div align="left">

                        <input name="banco" style="width:327px" value="<?php if($preregistro!=0) echo"$datos_pre[23]";?>" size="30" type="text" class="smallTxt" id="banco" maxlength="30">

                      </div></td>

					</tr>

					<tr>

					  <td><div align="right"><span class="contenidoNegritasCH"># de Cuenta &nbsp;</span></div></td>

					  <td><div align="left">

                        <input size="30" style="width:327px" value="<?php if($preregistro!=0) echo"$datos_pre[22]";?>" name="cuenta" type="text" class="smallTxt" id="cuenta" maxlength="20">

                      </div></td>

                    </tr>

                    <tr>

                      <td colspan="2">

                        <img src="assets/imgs/spacer (1).gif" width="1" height="10" /></td><td></td>

                    </tr>

                  </table></td>

                </tr>

              </table>

          </div>

            <input type="submit" name="registrar" value="<?php if($preregistro!=0){echo"Confirmar";}else{echo"Registrar";}?>" class="saveBttn" style="margin-right:500px" target="info"/>

   	</form>

</body></html>