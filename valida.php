<?php
session_start();
include "coneccion.php";

$confirma= $_POST["confirmar"];

if($confirma=="Continuar"){

	$tarjeta= $_POST["tarjeta"];
	$digitos=strlen($tarjeta);
	$faltan=7-$digitos;
	if($faltan>0)
		for($i=0;$i<$faltan;$i++)
			$tarjeta="0".$tarjeta;
	$codigo= $_POST["codigo"];
	$usuario=$_SESSION['usuario'];
	$consulta  = "SELECT tarjeta,codigo from n_miembros where id=$usuario";
	$resultado = mysql_query($consulta) or die("Error en operacion3: " . mysql_error());
	$info=mysql_fetch_row($resultado);
	if($info[0]==$tarjeta && $info[1]==$codigo)
		echo"<script>window.parent.verframe('f_registro.php');window.parent.cerrarV();</script>";
	else
		echo"<script>alert('Datos incorrectos');</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script>
function validar(){
	if(document.form2.tarjeta.length>7){
		alert("Número de tarjeta inválido");
		document.form2.tarjeta.focus();
		return false;
	}
	if(document.form2.codigo.length>4){
		alert("Código Inválido");
		document.form2.codigo.focus();
		return false;
	}
}
</script>
<script>
	if(navigator.userAgent.indexOf("MSIE")>0){
		document.write(' <link rel="stylesheet" href="assets/css/admonStylesE.css" /> ');
		document.write(' <link rel="stylesheet" href="assets/css/lugarStylesE.css" /> ');
	}else{
		document.write(' <link rel="stylesheet" href="assets/css/admonStyles.css" /> ');
		document.write(' <link rel="stylesheet" href="assets/css/lugarStyles.css" /> ');
	}
</script>
</head>

<body>
	<table height="330" border="0" align="center" cellspacing="0" cellpadding="0">
		<tr valign="middle">
			<td valign="middle"><table align="center" height="294" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td width="489" background="assets/imgs/vid2.png" style="background-image:assets/imgs/vid2.png; background-position:center">
					<form id="form2" name="form2" method="post" action="">
						<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr><td colspan="2" class="subtitleCentrado style1">Confirmar Datos</td></tr>
							<tr><td colspan="2" class="subtitleCentrado">&nbsp;</td></tr>
							<tr><td width="200" class="contenido" align="right"># Tarjeta:&nbsp; </td>
								<td width="200"><input required name="tarjeta" maxlength="7" type="number" id="tarjeta" class="smallTxt" style="width:100px" /></td>
							</tr>
							<tr><td align="right"><span class="contenido">Código de seguridad:&nbsp; </span></td>
								<td><input name="codigo" required type="text" maxlength="4" id="codigo" class="smallTxt" style="width:50px" /></td>
							</tr>
							<tr><td colspan="2" class="contenido"><div align="center">&nbsp;</div></td></tr>
							<tr><td colspan="2" class="contenido"><div align="center"><hr /></div></td></tr>
							<tr><td colspan="2" class="contenido">&nbsp;</td></tr>
							<tr><td colspan="2" class="contenido">
								<input name="confirmar" type="submit" class="boton" id="confirmar" value="Continuar"/>
								</td>
							</tr>
						</table>
					</form></td>
				</tr>
			</table></td>
		</tr>
	</table>
</body>
</html>

