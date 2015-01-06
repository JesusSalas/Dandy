<?php



include "coneccion.php";

$id=$_GET["id"];

$idE=$_GET["idE"];

if($id=="1")

{

	$titulo="Alimentos";

	$header="alimentos";

}

else

{ 

	if($id=="2")

	{

		$titulo="Vida Noctura";

		$header="vida";

	}	

	else

	{ 

		if($id=="3")

		{

			$titulo="Compras";

			$header="compras";

		}

		else

		{ 

			if($id=="4")

			{

				$titulo="Entretenimiento";

				$header="entretenimiento";

			}

			else

			{

				 if($id=="5")

				 {

					$titulo="Actividades";

					$header="actividades";

				 }

				 else

				 { 

				 	if($id=="6")

					{

						$titulo="Servicios";

						$header="servicios";

					}

				 }

			}

		}

	}

}



		$consulta  = "update Empresas set contador=contador+1  where idEmpresa=$idE ";

		$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1: " . mysql_error());

		

		$consulta  = "insert into estadistica(empresa, fecha) values($idE, now()) ";

		$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1: " . mysql_error());

	

		$consulta  = "select * from Empresas  where idEmpresa=$idE ";

	$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1: " . mysql_error());

	$count=1;

	if(@mysql_num_rows($resultado)>0)

	{

		$res=mysql_fetch_row($resultado);	

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

		<!--<script src='jquery-1.8.3.min.js'></script>-->

	<script src='assets/jQuery/jquery.elevateZoom-2.5.5.min.js'></script>

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

				$(".iframe").colorbox({iframe:true, width:"98%", height:"98%"});

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

		

		overflow-x:hidden;

		overflow-y: scroll;

	}

-->

</style>

</head>



<body>

<table width="806" border="0"  cellpadding="0" cellspacing="0">

  <tr>

    <td height="96" valign="top" background="images/titulo_detalle_<?php echo"$header";?>.jpg"><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td><img src="images/spacer.gif" width="20" height="20" /></td>

      </tr>

      <tr>

        <td><div align="left" class="style1"></div></td>

      </tr>

    </table></td>

  </tr>

  <tr>

    <td height="24" valign="top"><table width="806" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td width="302"><img src="images/titulo_detalle_2_<?php echo"$header";?>.jpg" width="302" height="208" /></td>

        <td><img src="assets<?php echo"$res[32]";?>" width="227" height="208" /></td>

        <td width="227"><img src="images/titulo_detalle_3.jpg" width="277" height="208" /></td>

      </tr>

    </table></td>

  </tr>

  <tr>

    <td height="114" valign="top" background="images/detalle_direccion.jpg"><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td><img src="images/spacer.gif" width="20" height="25" /></td>

      </tr>

      <tr>

        <td><div align="left" class="style1">

          <div align="center"><span class="direccionDetalle"><?php echo"$res[2]";?><br /></span></div>

        </div></td>

      </tr>

      <tr>

        <td height="35"><div align="center"><span class="referenciaDetalle"><?php echo"$res[3]";?></span> <span class="horarioDetalle"><?php echo"$res[6]";?></span></div></td>

      </tr>

    </table></td>

  </tr>

  <tr>

    <td height="100%" valign="top" background="images/fondo_lista.jpg" bgcolor="#000000"><table width="680" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>

          <td width="300" valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">

            <tr>

              <td ><div align="left" class="tituloDetalle"><?php echo"$res[1]";?></div></td>

            </tr>

            <tr>

              <td><img src="images/franja_detalle.png" width="346" height="11" /></td>

            </tr>

            <tr>

              <td class="style1"><div align="justify" class="textoDetalle"><?php echo"$res[13]";?></div></td>

            </tr>

          </table></td>

          <td width="20" rowspan="9"><img src="images/spacer.gif" width="40" height="20" /></td>

          <td width="430"><img src="assets/<?php echo"$res[10]";?>" width="358" height="269" /></td>

        </tr>

        <tr>

          <td><img src="images/spacer.gif" width="40" height="40" /></td>

          <td><img src="images/spacer.gif" width="40" height="40" /></td>

        </tr>

        <tr>

          <td valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">

            <tr>

              <td class="style2"><div align="left" class="tituloDetalle">¿Cómo llegar?</div></td>

            </tr>

            <tr>

              <td><img src="images/franja_detalle.png" width="346" height="11" /></td>

            </tr>

            <tr>

              <td valign="top" class="style1"><div align="justify"><p>

                  <iframe width="347" height="202" frameborder="0" scrolling="No" marginheight="0" marginwidth="0" src="<?php echo"$res[11]";?>&output=embed"></iframe>

                  <br />

                  <small><a href="<?php echo"$res[11]";?>" target="_blank" class="contenidoNegritas" >Ver mapa m&aacute;s grande</a></small></p></div></td>

            </tr>

          </table></td>

          <td valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td class="style2"><div align="left" class="tituloDetalle">Beneficios</div></td>

              </tr>

              <tr>

                <td><img src="images/franja_detalle.png" width="346" height="11" /></td>

              </tr>

              <tr>

                <td class="style1"><div align="justify">

                    <p><span class="benedicioTipo">DeLuxe</span><br />

                        <span class="benedicio"><?php echo"$res[24]";?></span><br />

                        <span class="vigenciaBeneficio"><?php echo"$res[30]";?></span></p>

                  <p><span class="benedicioTipo2">Diamond</span><br />

                        <span class="benedicio"><?php echo"$res[25]";?></span><br />

                        <span class="vigenciaBeneficio"><?php echo"$res[31]";?></span></p>

                </div></td>

              </tr>

            </table></td>

        </tr>

        <tr>

          <td><img src="images/spacer.gif" width="40" height="40" /></td>

          <td><img src="images/spacer.gif" width="40" height="40" /></td>

        </tr>

        <tr>

          <td valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">

            <tr>

              <td valign="bottom" class="style2"><div align="left" class="tituloDetalle">Contacto</div></td>

            </tr>

            <tr>

              <td><img src="images/franja_detalle.png" width="346" height="11" /></td>

            </tr>

            <tr>

              <td class="style1"><div align="left"><p><span class="textoDetalle">Tel: <?php echo"$res[4]";?>

			   

                 <?php if($res[5]!=""){?><br />                   

Email: <?php echo"$res[5]";?>

<?php }?> </span>

                <?php if($res[7]!=""){?>

<br/>

<a href="<?php echo"$res[7]";?>" target="_blank" class="textoDetalle"><?php echo"$res[7]";?></a>

<?php }?>

<?php if($res[8]!=""){?>

<br/>

<a href="<?php echo"$res[8]";?>" target="_blank" class="textoDetalle"><?php echo"$res[8]";?></a>

<?php }?></div></p></td>

            </tr>

          </table></td>

          <td valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">

            <tr>

              <td class="style2"><div align="left" class="tituloDetalle"><?php echo"$res[34]";?></div></td>

            </tr>

            <tr>

              <td><img src="images/franja_detalle.png" width="346" height="11" /></td>

            </tr>

            <tr>

              <td class="style1"><span class="style3">

                <p>

                  <?php		

	$consulta  = "select id_empresa, nombre from imagenes_menu where id_empresa = $idE";



	$resultado = mysql_query($consulta) or die("Error en operacion3: " . mysql_error());

	$count=1;

	while(@mysql_num_rows($resultado)>=$count)

	{

		$res_img=mysql_fetch_row($resultado);

		?>

                  <a href="zoom.php?id=<?php echo"$res_img[1]";?>" class="iframe"><img  src='assets/fotos/chica_<?php echo"$res_img[1]";?>' border="0" /></a>

                  <?php

		$count++;

	}

        ?>

                </p>

              </span></td>

            </tr>

          </table></td>

        </tr>

        <tr>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

        </tr>

        <tr>

          <td valign="bottom" class="tituloDetalle"><?php if($res[16]!=""){?>Galería<?php }?></td>

          <td>&nbsp;</td>

        </tr>

      </table>      </td>

  </tr>

  <tr>

    <td height="204" valign="top" background="images/abajo_lista.jpg"><table width="718" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td width="132"><?php if($res[16]!=""){?>

            <a class="group1" href="assets<?php echo"$res[16]";?>" title="<?php echo"$res[1]";?>"><img src="assets<?php echo"$res[16]";?>" width="132" height="87" border="0" /></a>

            <?php }else echo"&nbsp;";?></td>

        <td width="13">&nbsp;</td>

        <td width="135"><?php if($res[17]!=""){?>

            <a class="group1" href="assets<?php echo"$res[17]";?>" title="<?php echo"$res[1]";?>"><img src="assets<?php echo"$res[17]";?>" width="132" height="87" border="0" /></a>

            <?php }else echo"&nbsp;";?></td>

        <td width="10">&nbsp;</td>

        <td width="135"><?php if($res[18]!=""){?>

            <a class="group1" href="assets<?php echo"$res[18]";?>" title="<?php echo"$res[1]";?>"><img src="assets<?php echo"$res[18]";?>" width="132" height="87" border="0" /></a>

            <?php }else echo"&nbsp;";?></td>

        <td width="10">&nbsp;</td>

        <td width="135"><?php if($res[19]!=""){?>

            <a class="group1" href="assets<?php echo"$res[19]";?>" title="<?php echo"$res[1]";?>"><img src="assets<?php echo"$res[19]";?>" width="132" height="87" border="0" /></a>

            <?php }else echo"&nbsp;";?></td>

        <td width="10">&nbsp;</td>

        <td width="138"><?php if($res[20]!=""){?>

            <a class="group1" href="assets<?php echo"$res[20]";?>" title="<?php echo"$res[1]";?>"><img src="assets<?php echo"$res[20]";?>" width="132" height="87" border="0" /></a>

            <?php }else echo"&nbsp;";?></td>

      </tr>

    </table></td>

  </tr>

</table>

<script>

   

<?php		

	$consulta  = "select id_empresa, nombre from imagenes_menu where id_empresa = $idE";



	$resultado = mysql_query($consulta) or die("Error en operacion3: " . mysql_error());

	$count=1;

	while(@mysql_num_rows($resultado)>=$count)

	{

		$res_img=mysql_fetch_row($resultado);

		?>

		 $('#zoom_0<?phpecho"$count";?>').elevateZoom();

	

		<?php

		$count++;

	}

        ?>

	

</script>

</body>

</html>

<?php }?>