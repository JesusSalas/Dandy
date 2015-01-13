<?php

session_start();

//include "checar_sesion_admin.php";

include "coneccion.php";



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link rel="stylesheet" href="../assets/css/styles.css">

<link rel="stylesheet" type="text/css" href="../assets/css/admonStyles.css">

<link rel="stylesheet" type="text/css" href="../assets/css/lugarStyles.css">

<script src="../assets/jQuery/funciones.js" type="text/javascript"></script>

<title>Panel Administrativo</title>

<style type="text/css">

<!--

.style3 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #104352; }

body {

	margin-left: 0px;

	margin-top: 0px;

}

.style4 {color: #FFFFFF}

-->

</style>



</head>

<?php

$login=$_POST["login"];

$pass=$_POST["pass"];

if($_POST['entrar']!="")

{

	

		$redirect = "adm_mi_empresa.php";

		

		$consulta  = "SELECT Usuario, Password, idEmpresa from Empresas where Usuario='$login' AND Password = '$pass'";

		$consulta2  = "SELECT Usuario,  password_noAdmin, idEmpresa from Empresas where Usuario='$login' AND password_noAdmin = '$pass'";


		$res = mysql_query($consulta) or die("La consulta fall&oacute;P1: " );//. mysql_error()." <br> $consulta");

		$res2 = mysql_query($consulta2) or die("La consulta fall&oacute;P2: " );//. mysql_error()." <br> $consulta");


		if(@mysql_num_rows($res)==1){

			$res=mysql_fetch_row($res);

			$_SESSION['id_empresa']=$res[2];

			if($res[2]==1){

				$_SESSION['tipo_usuario']="super_admin";

				$redirect = "adm_empresas.php";

			} else $_SESSION['tipo_usuario']="admin";

			 

		} else if(@mysql_num_rows($res2)==1){

			$res2=mysql_fetch_row($res2);

			$_SESSION['id_empresa']=$res2[2];

			$_SESSION['tipo_usuario']="normal";

			$redirect = "servicio_clientes.php";

		}

		

		if($_SESSION['id_empresa']!=""){

			echo"<script>window.location='$redirect';</script>";

		}else

		{

			echo"<script>alert(\"Usuario o password invalido\");</script>";

		}

}







?>

<body  onLoad="document.form1.login.focus();">

<form id="form1" name="form1" method="post" action="index.php">

<table width="900" border="0" align="center" cellpadding="1" cellspacing="0">

  <tr>

    <td bgcolor="#000000"><div align="center">&nbsp; </div></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td><table width="800" border="0" cellspacing="0" cellpadding="1">

      <tr>

        <td width="43%">&nbsp;</td>

        <td width="57%">&nbsp;</td>

      </tr>

      <tr>

        <td rowspan="3"><img src="imgs/logo_contact.png" width="263" height="300" /></td>

        <td>&nbsp;</td>

      </tr>

      <tr>

        <td><p class="contenido"><span class="contenidoNegritas">Bienvenido  al Panel Administrativo de Dandy Perspective.</span><br />

        </p>          </td>

      </tr>

      <tr>

        <td valign="top">

          <p class="contenido">Este  Panel ha sido creado para que nuestras empresas afiliadas puedan llevar un  control sobre las promociones que ofrecen y su informaci&oacute;n visible al p&uacute;blico.<br />

            <span class="contenido">Si representas a una empresa afiliada a nuestro  sitio ingresa con el usuario y password correspondiente a tu establecimiento.</span><br />

          </p>

          <table width="82%" border="0" cellspacing="15">

            <tr>

              <td width="29%" height="25"><div align="right" class="style3">

                <div align="left"><span class="style4">usuario</span>:</div>

              </div></td>

              <td width="71%"><input name="login" type="text" class="smallTxt" id="login" size="20" maxlength="100" style="width:100px"/>              </td>

            </tr>

            <tr>

              <td><div align="right" class="style3">

                <div align="left"><span class="style4">password</span>:</div>

              </div></td>

              <td><input name="pass" type="password" class="smallTxt" id="pass" size="20" maxlength="100" style="width:100px"/></td>

            </tr>

            <tr>

              <td>&nbsp;</td>

              <td>&nbsp;</td>

            </tr>

            <tr>

              <td colspan="2"><div align="center"></div></td>

            </tr>

          </table>        </td>

      </tr>

      <tr>

        <td colspan="2"><input name="entrar" type="submit" class="saveBttn" id="entrar" value="Entrar" /></td>

        </tr>

      <tr>

        <td bgcolor="#000000">&nbsp;</td>

        <td bgcolor="#000000">&nbsp;</td>

      </tr>

    </table></td>

  </tr>

  <tr>

    <td><p>&nbsp;</p>

    <p>&nbsp;</p>

    <p>&nbsp;</p>    </td>

  </tr>

</table>

</form>

</body>

</html>

