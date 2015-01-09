<?php

session_start();

$permiso = "super_admin";

include "checar_sesion_admin.php";

include "coneccion.php";



$importar= $_POST["importar"];

if($importar=="Importar" )  

{



if ($_FILES["archivo"]["error"] > 0)

{

	echo "file error.\n";

}

else

{

	$allowedExts = array("csv", "CSV");

	$extension = end(explode(".", $_FILES["archivo"]["name"]));

	

	if (in_array($extension, $allowedExts))

	  {

	  	$uploadfile = 'csv/tempfile.csv';

		if(move_uploaded_file($_FILES['archivo']['tmp_name'],"$uploadfile"))

		{

			$file = fopen($uploadfile,"r");

			$size = filesize($uploadfile);



			if(!$size) {

				echo "File is empty.\n";

				exit;

			}else

			{

				$csvcontent = fread($file,$size);

				//echo"contenido=$csvcontent <br>";

				fclose($file);

				$lines = 0;

				$queries = "";

				$linearray = array();

				

				foreach(explode("\n",$csvcontent) as $line) {

					if(strlen($line)>3)

					{

					$lines++;

					if($lines==1)

					$insertado="<tr><td class=\"contenido\"><strong>Tarjetas Insertadas</strong></td></tr>";

					//$line = trim($line," \t");

					

					//$line = str_replace("\r","",$line);

					

					/************************************

					This line escapes the special character. remove it if entries are already escaped in the csv file

					************************************/

					//$line = str_replace("'","\'",$line);

					/*************************************/

					//echo"linea=$line <br>";

					$linearray = explode(',',$line);

					

					$linemysql = implode("','",$linearray);

					//echo"sql=$linemysql <br>";

					$consulta  = "select numero_de_tarjeta from Tarjetahabientes  where numero_de_tarjeta='$linearray[0]'";

					$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1: " . mysql_error());

					if(@mysql_num_rows($resultado)>=1)

					{

					$insertado="$insertado <tr><td class=\"contenido\">$linearray[0] (duplicada)</td>";

					}

					else

					{

						$consulta  = "INSERT INTO Tarjetahabientes (numero_de_tarjeta, clave, tipo_tarjeta) values('$linemysql')";

		

						$resultado = mysql_query($consulta) or die("Error en operacion1: " . mysql_error()."<br>$consulta");

						$insertado="$insertado <tr><td class=\"contenido\">$linearray[0]</td>";

					}

					}

				}// fon foreach	

				echo"<script>alert(\"$lines Tarjetas procesadas\");</script>";			

			}// fin else si tien size

		}// fin if si se subio archivo

	  }// fin ext valida

	else

	  {

	  echo "Invalid file";

	  }

}

}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!-- saved from url=(0037)http://dandy.mx/index.php/login/index -->

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



<link rel="stylesheet" type="text/css" href="../assets/css/admonStyles.css">

<link rel="stylesheet" type="text/css" href="../assets/css/lugarStyles.css">



<script src="imgs/jquery-1.6.1.js" type="text/javascript"></script>

<script src="imgs/fileuploader.js" type="text/javascript"></script>

<script src="imgs/upload_images.js" type="text/javascript"></script>



<title>Administración de tarjetas</title>

<style type="text/css">

<!--

.style1 {

	font-family: font_bureau__stainlessextlight;

	color: #FFFFFF;

	font-weight: bold;

	font-size:12px;

}

.style3 {color: #FFFFFF}

-->

</style>

</head>

<body>



	<div class="headerWrapper">

    	<div class="logo"></div>

        <div class="title">Portal Administrativo</div>

                         <div class="menu"><?php include "menu_2.html";?></div>

                                    

    </div>

<form action="" method="post" enctype="multipart/form-data" accept-charset="utf-8">    

    <div class="clear">

      <table width="580" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>

          <td>&nbsp;</td>

          <td width="80%" >&nbsp;</td>

        </tr>

        <tr>

          <td class="subTitle2">Tarjetas</td>

          <td ><div align="right"><a href="adm_tarjeta_nueva.php" class="style1"></a></div></td>

        </tr>

        <tr>

          <td colspan="2"><div align="center" class="subTitle">

            <p>&nbsp;</p>

            </div></td>

        </tr>

        <tr>

          <td colspan="2" bgcolor="#666666" class="contenidoNegritas"><div align="center">Seleccione archivo CSV con tarjetas a importar: </div></td>

        </tr>

        <tr>

          <td colspan="2" bgcolor="#666666"><div align="center">

            <input name="archivo" type="file" class="browseBttn" id="archivo" />

          </div></td>

        </tr>

        <tr>

          <td colspan="2" bgcolor="#666666">

            <div align="center">&nbsp;</div></td>

        </tr>

        <tr>

          <td colspan="2" bgcolor="#666666"><div align="center">

            <input name="importar" type="submit" id="importar" value="Importar" />

          </div></td>

        </tr>

        <tr>

          <td colspan="2" class="contenidoNegritas"><table width="400" border="0" align="center" cellpadding="0" cellspacing="0">

            <?php echo"$insertado";?>

            </tr>

          </table></td>

        </tr>

        <tr>

          <td colspan="2">&nbsp;</td>

        </tr>

        <tr>

          <td colspan="2"><table width="453" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#999999">

            <tr>

              <td><p class="contenido">El aechivo debe tener el siguiente formato</p>

                <table width="340" border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">

                  <tr>

                    <td><span class="style3">1234123412341234</span></td>

                    <td><span class="style3">claveactivacion</span></td>

                    <td><span class="style3">1</span></td>

                  </tr>

                  <tr>

                    <td><span class="style3">4321432143214321</span></td>

                    <td><span class="style3">calveactivacio2</span></td>

                    <td><span class="style3">2</span></td>

                  </tr>

                </table>

                <p class="contenido">Columna1 = Numero de tarjeta</p>

                <p class="contenido">Columna2 = Cakve de activacion (max 15 caracteres)</p>

                <p class="contenido">Columna 3 = Tipo de Tarjeta 1= Deluxe , 2 = Diamond </p>

              <p class="contenido">Exportar en excel como CSV </p></td>

            </tr>

          </table>

            <p class="contenido">&nbsp;</p>

          <p>&nbsp; </p></td>

        </tr>

      </table>

    </div>

    

    

</form>



</body></html>