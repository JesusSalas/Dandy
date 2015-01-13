<?php
session_start();
if(!isset($_SESSION['usuario']))
	include('checar_sesion_usuario.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0041)http://dandy.mx/index.php/welcome/contact -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script>
	if(navigator.userAgent.indexOf("MSIE")>0){
		document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/admonStylesE.css" /> ');
		document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/stylesE.css" /> ');
	}else{
		document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/admonStyles.css" /> ');
		document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/styles.css" /> ');
	}
</script>
<title>Untitled Document</title>
<?php
include "coneccion.php";
include_once("Mail.php");
$enviar=$_POST['enviar'];
if ($enviar=="Enviar") {
    	$date=getdate();
		$fechaActual="$date[mday]-$date[mon]-$date[year] $date[hours]:$date[minutes]:0";
		$ip= getenv("REMOTE_ADDR");
		$ip=Trim(stripslashes($ip));
			$EmailFrom = "contactanos@dandy.mx";
			//$EmailTo = "mgarciavarela@gmail.com";
			$EmailTo = "Dandyperspective@gmail.com";
		$Nombre = Trim(stripslashes($_POST['nombre'])); 
		$Nombre2 = Trim(stripslashes($_POST['email']));
		$Nombre3 = Trim(stripslashes($_POST['texto'])); 
		$Body = "<html>";
		$Body .= "<head>";
		//$Body .= "<link rel='stylesheet' href='http://www.dandy.mx/assets/css/lugarStyles.css'>";
		$Body .= "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
		$Body .= "<title>Untitled Document</title>";
		$Body .= "<style type='text/css'>";
		//$Body .= "<!--";
		$Body .= "body {";
		$Body .= "	margin-left: 0px;";
		$Body .= "	margin-top: 0px;";
		$Body .= "}";
		$Body .= ".style1 { font-size: 24px; font-weight: bold;color: #FFFFFF;}.style2 { font-size: 14px; color: #FFFFFF;}";
		//$Body .= "-->";
		$Body .= "</style></head>";
		$Body .= "<body>";
		$Body .= "<table width='586' border='0' cellspacing='0' cellpadding='0' background='assets/imgs/bg.png>";
		$Body .= "  <tr>";
		$Body .= "    <td width='250'><img src='assets/imgs/logo.png' width='212' height='140' /></td>";
		$Body .= "    <td width='315' class='style1'><span style='font-size: 24px; font-weight: bold;color: #FFFFFF;'>Contacto</span></td>";
		$Body .= "    <td width='21'>&nbsp;</td>";
		$Body .= "  </tr>";
		$Body .= "  <tr>";
		$Body .= "    <td colspan='3'><div align='center' ></div></td>";
		$Body .= "  </tr>";
		$Body .= "  <tr>";
		$Body .= "    <td colspan='3'><table width='464' border='0' align='center' cellpadding='0' cellspacing='0' style='font-size: 14px; font-weight: bold;color: #FFFFFF;'  >";
		$Body .= "      <tr>";
		$Body .= "        <td colspan='2'>&nbsp;</td>";
		$Body .= "      </tr>";
		$Body .= "      <tr>";
		$Body .= "        <td colspan='2'><div align='center'><strong>Hemos sido contactados por la pagina web</strong> </div></td>";
		$Body .= "        </tr>";
		$Body .= "      <tr>";
		$Body .= "        <td>&nbsp;</td>";
		$Body .= "        <td>&nbsp;</td>";
		$Body .= "      </tr>";
		$Body .= "      <tr>";
		$Body .= "        <td width='85'>Nombre:</td>";
		$Body .= "        <td width='315'>$Nombre</td>";
		$Body .= "      </tr>";
		$Body .= "      <tr>";
		$Body .= "        <td>Correo:</td>";
		$Body .= "        <td>$Nombre2</td>";
		$Body .= "      </tr>";
		$Body .= "      <tr>";
		$Body .= "        <td>Mensaje:</td>";
		$Body .= "        <td>$Nombre3</td>";
		$Body .= "      </tr>";
		//$Body .= "      <tr>";
		//$Body .= "        <td colspan='2'><hr /></td>";
		//$Body .= "        </tr>";
		$Body .= "      <tr>";
		$Body .= "        <td colspan='2'>&nbsp;</td>";
		$Body .= "      </tr>";
		$Body .= "    </table></td>";
		$Body .= "  </tr>";
  		$Body .= "  <tr>";
		$Body .= "    <td colspan='3'><div align='center' >&nbsp;</div></td>";
		$Body .= "  </tr>";
		$Body .= "</table>";
		$Body .= "</body>";
		$Body .= "</html>";

		$Subject = "Dandy.mx - Contacto";
		//$Body = "Mensaje recibido de la pagina web\n\nNombre: $Nombre\n Email: $Nombre2\nMensaje: $Nombre3 \n\n\n Contactanos- Dandy.mx";
		//$success2 = mail($EmailTo, $Subject, $Body, "From: dandy.mx <$EmailFrom>\nContent-type: text/html; charset=utf-8\n");
		$Host = "mail.dandy.mx"; 
		$Username = "contacto@dandy.mx"; 
		$Password = "Partner160";
 		$EmailFrom = "contacto@dandy.mx";
		$Headers = array ('From' => $EmailFrom, 'To' => $EmailTo, 'Subject' => $Subject,'MIME-Version' => '1.0',
        'Content-Type' => 'text/html; charset=utf-8'); 
		$SMTP = Mail::factory('smtp', array ('host' => $Host,  'auth' => true, 'port' => '2525', 
		'username' => $Username, 'password' => $Password)); 
		$mail = $SMTP->send($EmailTo, $Headers, $Body);
		//$success2 = mail($EmailTo, $Subject, $Body, "From: dandy.mx <$EmailFrom>");
		$Nombre = ""; 
		$Nombre2 ="";
		$Nombre3 =""; 
		$Nombre4 = "";
		$Nombre5 = "";
		if (PEAR::isError($mail)){ 
echo($mail->getMessage()); 
} else { 
 print "<script>alert('Tu comentario ha sido enviado. Gracias!');</script>";
} 
			/*if ($success2){
			}
			else{
		 		 print "<script>alert('unspected error, please try again');</script>";
			}*/
}
?>
<style>
	html{
		margin:0 0;
	}
	body{
		background:transparent;
		margin: 0 0;
    }
</style>
<script>
function valida(){
	if(document.form1.nombre.value==""){
		alert("No escribio su nombre");
		document.form1.nombre.focus();
		return false;
	}else{
		if(document.form1.email.value==""){
			alert("No escribio su correo");
			document.form1.email.focus();
			return false;
		}else{
			if(document.form1.texto.value==""){
				alert("No escribio mensaje");
				document.form1.texto.focus();
				return false;
			}else{
				if(document.form1.email.value=="" || document.form1.email.value.indexOf("'")>=1 || document.form1.email.value.indexOf("\"")>=1  || document.form1.email.value.indexOf("[")>=1 || document.form1.email.value.indexOf("]")>=1 || document.form1.email.value.indexOf(">")>=1 || document.form1.email.value.indexOf("/")>=1 || document.form1.email.value.indexOf(":")>=1 || document.form1.email.value.indexOf("|")>=1 || document.form1.email.value.indexOf("@")<0){
					alert("Formato invalido de correo electronico");
					document.form1.email.focus();
					return false;
				}
			}
		}
	}
}
</script>
</head>
	<body><div id="header_2" style="width:100%; margin-top:-200px; position:absolute; z-index:3;">
        	<img src="assets/imgs/h_contacto.png">
    </div>
	<form method="post" name="form1" id="form1">
        <div class="contentWrapper" style="width:507px; margin-top:200px;">
           <div class="subTitle2" style="font-size:30px; height:30px;">Envíanos un Mensaje</div>
           <div class="clear" style="height:20px;"></div>
           <div class="inserts">
                    <label class="Lbl">Nombre:</label>
                    <input type="text" class="smallTxt" id="nombre" name="nombre" required>
           </div>
           <div class="inserts">
                    <label class="Lbl">Correo:</label>
                    <input type="email" class="smallTxt" id="email" name="email" required>
           </div>
           <div class="inserts">
                    <label class="Lbl">Mensaje:</label>
                    <textarea class="bigTxt" id="texto" name="texto" required></textarea>
           </div>
        </div>
        <div class="clear" style="height:20px;"></div>
    <input type="submit" name="enviar" value="Enviar" class="saveBttn" style="margin-left:300px;" onclick="return valida();">    </form>
</body></html>