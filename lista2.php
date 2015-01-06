<?php



include "coneccion.php";

$id=$_GET["id"];

if($id=="1")

{

	$titulo="Alimentos";

	$header="titulo_lista_alimentos.jpg";

}

else

{ 

	if($id=="2")

	{

		$titulo="Vida Noctura";

		$header="titulo_lista_vida.jpg";

	}	

	else

	{ 

		if($id=="3")

		{

			$titulo="Compras";

			$header="titulo_lista_compras.jpg";

		}

		else

		{ 

			if($id=="4")

			{

				$titulo="Entretenimiento";

				$header="titulo_lista_entretenimiento.jpg";

			}

			else

			{

				 if($id=="5")

				 {

					$titulo="Actividades";

					$header="titulo_lista_actividades.jpg";

				 }

				 else

				 { 

				 	if($id=="6")

					{

						$titulo="Servicios";

						$header="titulo_lista_servicios.jpg";

					}

				 }

			}

		}

	}

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>

<script>

if(navigator.userAgent.indexOf("MSIE")>0)

{

document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/lugarStylesE.css" /> ');

}

else

{

document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/lugarStyles.css" /> ');



}

</script>



<link rel="stylesheet" href="assets/color3/colorbox.css" />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

		<script src="assets/color3/jquery.colorbox.js"></script>

		<script>

			$(document).ready(function(){

				//Examples of how to assign the ColorBox event to elements

				$(".group1").colorbox({rel:'group1'});

				$(".group2").colorbox({rel:'group2', transition:"fade"});

				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});

				$(".group4").colorbox({rel:'group4', slideshow:true});

				$(".ajax").colorbox();

				$(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});

				$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});

				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});

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

		</script>

		<script>

function ver(valor){

window.location=valor;

	//document.getElementById("myframe").src=valor;

}

</script>

<style type="text/css">

<!--

.style1 {color: #FFFFFF}

.style3 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #FFFFFF; font-weight: bold;text-decoration: none; }

.style4 {font-size: 14px; color: #FFFFFF; text-decoration: none; font-family: Arial, Helvetica, sans-serif;}

body {

	margin-left: 0px;

	margin-top: 0px;

	

}

html{

	

}

-->

</style>



</head>



<body>

<table width="822" height="323" border="0"  cellpadding="0" cellspacing="0">

  <tr>

    <td height="105" valign="top" background="assets/imgs/<?php echo"$header";?>"><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td><img src="images/spacer.gif" width="20" height="20" /></td>

      </tr>

      <tr>

        <td><div align="left" class="headerLista"></div></td>

      </tr>

    </table></td>

  </tr>

  <tr>

    <td height="204" background="images/abajo_lista.jpg">

	<div style="height:540px;overflow-x:hidden;">

	<table width="806" height="100%" border="0"  cellpadding="0" cellspacing="0">



      <tr>

        <td height="100%" valign="top" background="images/fondo_lista.jpg" bgcolor="#000000"><table width="777" border="0" align="center" cellpadding="0" cellspacing="0">

          <?php

		

		$consulta  = "select Empresas.idEmpresa, Nombre, Logo, Direccion, promocion_normal, descripcion from Empresas inner join Empresa_Categoria on Empresas.idEmpresa=Empresa_Categoria.idEmpresa where idCategoria=$id order by Nombre";//, Promocion1, Promocion2

	$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1: " . mysql_error());

	$count=1;

	$columna=1;

	while(@mysql_num_rows($resultado)>=$count)

	{

		$res=mysql_fetch_row($resultado);

		if($columna=="1")

		{		

?>

          <tr>

            <td valign="top"><table width="366" border="0" align="center" cellpadding="0" cellspacing="0">

                <tr>

                  <td width="128" valign="top"><a href="javascript:ver('detalle.php?id=<?php echo"$id";?>&amp;idE=<?php echo"$res[0]";?>');" ><img src="assets<?php echo"$res[2]";?>" width="128" height="128" border="0" /></a></td>

                  <td width="20"><img src="images/spacer.gif" width="20" height="20" /></td>

                  <td width="219"><table width="100%" border="0" cellspacing="2" cellpadding="0">

                      <tr>

                        <td><div align="left" class="subtitle"><a href="javascript:ver('detalle.php?id=<?php echo"$id";?>&amp;idE=<?php echo"$res[0]";?>');" class="subtitle"><?php echo"$res[1]";?></a></div></td>

                      </tr>

                      <tr>

                        <td><div align="left" class="descrLista"><?php echo"$res[5]";?></div></td>

                      </tr>

                      <tr>

                        <td><img src="images/franja_lista.png" width="170" height="7" /></td>

                      </tr>

                      <tr>

                        <td><div align="left" class="deluxeLista">DELUXE</div></td>

                      </tr>

                      <tr>

                        <td><div align="left" class="descuentoLista"><?php echo"$res[4]";?></div></td>

                      </tr>

                      <tr>

                        <td><img src="images/spacer.gif" width="20" height="7" /></td>

                      </tr>

                      <tr>

                        <td><table width="170" border="0" cellspacing="0" cellpadding="0">

                            <tr>

                              <td width="17"><img src="images/triangulo.png" width="17" height="12" /></td>

                              <td width="10"><img src="images/spacer.gif" width="10" height="10" /></td>

                              <td width="143"><div align="left" class="masLista"><a href="javascript:ver('detalle.php?id=<?php echo"$id";?>&amp;idE=<?php echo"$res[0]";?>');" class="masLista">Más...</a></div></td>

                            </tr>

                        </table></td>

                      </tr>

                  </table></td>

                </tr>

            </table></td>

            <td><img src="images/spacer.gif" width="40" height="20" /></td>

            <?php

 			$columna="2";

			}

			else

			{

				if($columna=="2")

				{

				?>

            <td valign="top"><table width="366" border="0" align="center" cellpadding="0" cellspacing="0">

                <tr>

                  <td width="128" valign="top"><a href="javascript:ver('detalle.php?id=<?php echo"$id";?>&amp;idE=<?php echo"$res[0]";?>');" ><img src="assets<?php echo"$res[2]";?>" width="128" height="128" border="0" /></a></td>

                  <td width="20"><img src="images/spacer.gif" width="20" height="20" /></td>

                  <td width="220"><table width="100%" border="0" cellspacing="2" cellpadding="0">

                      <tr>

                        <td><div align="left" class="subtitle"><a href="javascript:ver('detalle.php?id=<?php echo"$id";?>&amp;idE=<?php echo"$res[0]";?>');" class="subtitle"><?php echo"$res[1]";?></a></div></td>

                      </tr>

                      <tr>

                        <td><div align="left" class="descrLista"><?php echo"$res[5]";?></div></td>

                      </tr>

                      <tr>

                        <td><img src="images/franja_lista.png" width="170" height="7" /></td>

                      </tr>

                      <tr>

                        <td><div align="left" class="deluxeLista">DELUXE</div></td>

                      </tr>

                      <tr>

                        <td><div align="left" class="descuentoLista"><?php echo"$res[4]";?></div></td>

                      </tr>

                      <tr>

                        <td><img src="images/spacer.gif" width="20" height="7" /></td>

                      </tr>

                      <tr>

                        <td><table width="170" border="0" cellspacing="0" cellpadding="0">

                            <tr>

                              <td width="17"><img src="images/triangulo.png" width="17" height="12" /></td>

                              <td width="10"><img src="images/spacer.gif" width="10" height="10" /></td>

                              <td width="143"><div align="left" class="masLista"><a href="javascript:ver('detalle.php?id=<?php echo"$id";?>&amp;idE=<?php echo"$res[0]";?>');" class="masLista">Más..</a>.</div></td>

                            </tr>

                        </table></td>

                      </tr>

                  </table></td>

                </tr>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

            <td><img src="images/spacer.gif" width="40" height="20" /></td>

            <td>&nbsp;</td>

          </tr>

          <?php

				$columna="1";

				}

			}

			   $count=$count+1;

	}

	if($columna=="2")

	{

	?>

          <tr>

            <td><table width="366" border="0" align="center" cellpadding="0" cellspacing="0">

                <tr>

                  <td width="128" valign="top"><a href="javascript:ver('detalle.php?id=<?php echo"$id";?>&amp;idE=<?php echo"$res[0]";?>');" ></a></td>

                  <td width="10"><img src="images/spacer.gif" width="20" height="20" /></td>

                  <td width="202"><table width="202" border="0" cellspacing="2" cellpadding="0">

                      <tr>

                        <td><div align="left" class="subtitle"></div></td>

                      </tr>

                      <tr>

                        <td><div align="left" class="descrLista"></div></td>

                      </tr>

                      <tr>

                        <td>&nbsp;</td>

                      </tr>

                      <tr>

                        <td><div align="left" class="deluxeLista"></div></td>

                      </tr>

                      <tr>

                        <td><div align="left" class="descuentoLista"></div></td>

                      </tr>

                      <tr>

                        <td><img src="images/spacer.gif" width="20" height="7" /></td>

                      </tr>

                      <tr>

                        <td><table width="170" border="0" cellspacing="0" cellpadding="0">

                            <tr>

                              <td width="17">&nbsp;</td>

                              <td width="10"><img src="images/spacer.gif" width="10" height="10" /></td>

                              <td width="143"><div align="left" class="masLista"><a href="javascript:ver('detalle.php?id=<?php echo"$id";?>&amp;idE=<?php echo"$res[0]";?>');" class="masLista"></a></div></td>

                            </tr>

                        </table></td>

                      </tr>

                  </table></td>

                </tr>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

            <td><img src="images/spacer.gif" width="40" height="20" /></td>

            <td>&nbsp;</td>

          </tr>

          <?php

	}

?>

        </table>

        </td>

      </tr>

    </table>

	</div></td>

  </tr>

</table>

</body>

</html>

