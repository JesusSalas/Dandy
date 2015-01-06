<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<?php

session_start();

include "coneccion.php";





$guardar= $_POST["guardar"];

if($guardar=="Guardar"){

	$old= $_POST["old"];

	$old=md5($old);

	$new= $_POST["new"];

	$new=md5($new);

	$usuario=$_SESSION['usuario'];

	$consulta  = "SELECT password from n_miembros where id=$usuario";

	$resultado = mysql_query($consulta) or die("Error en operacion3: " . mysql_error());

	if(@mysql_num_rows($resultado)>=1){

		$usu_info=mysql_fetch_row($resultado);

		if($usu_info[0]==$old){

			$consulta  = "update n_miembros set password='$new' where id=$usuario";

			$resultado = mysql_query($consulta) or die("Error en operacion3: " . mysql_error());

			echo"<script>alert(\"Password cambiado\");parent.cerrarV(); </script>";

		}else{

			echo"<script>alert(\"Password actual incorrecto $old\");</script>";

		}

	}else{

		echo"<script>alert(\"Error!\");</script>";

	}

}

?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Untitled Document</title>

<style type="text/css">

<!--

-->

</style>

<script>

function validar(){

	if(document.form2.new.value!=document.form2.conf.value){

		alert("Password nuevo no coincide, inténtelo nuevamente");

		document.form2.new.focus();

		return false;

	}

}

</script>



<link rel="stylesheet" href="assets/css/lugarStyles.css">

</head>



<body>

<table width="489" height="294" border="0" cellpadding="0" cellspacing="0" background="assets/imgs/vid2.png">

  <tr>

    <td width="489"><form id="form2" name="form2" method="post" action="">

    

    <table width="400" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td colspan="2" class="subtitleCentrado">Cambia tu Password </td>

        </tr>

      <tr>

        <td width="180" class="contenido">Password actual: </td>

        <td width="220"><input required name="old" type="password" id="old" size="15" maxlength="15" /></td>

      </tr>

      <tr>

        <td><span class="contenido">Nuevo Password: </span></td>

        <td><input name="new" required type="password" id="new" size="15" maxlength="15" /></td>

      </tr>

	  <tr>

        <td><span class="contenido">Confirma Password: </span></td>

        <td><input name="conf" required type="password" id="conf" size="15" maxlength="15" /></td>

      </tr>

      <tr>

        <td colspan="2" class="contenido"><div align="center">&nbsp;</div></td>

        </tr>

	  <tr>

        <td colspan="2" class="contenido"><div align="center"><hr />Maximo 15 caracteres </div></td>

        </tr>

      <tr>

        <td colspan="2" class="contenido">&nbsp;</td>

      </tr>

      <tr>

        <td colspan="2" class="contenido">

		  <input name="guardar" type="submit" class="boton" id="guardar" value="Guardar" onclick="return validar();"/>

		</td>

      </tr>

    </table>

    </form></td>

  </tr>

</table>

</body>

</html>

