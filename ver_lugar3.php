<?

include "coneccion.php";
$id=$_GET["id"];
$idE=$_GET["idE"];
if($id=="1")
{
	$titulo="Alimentos";
	$header="headerAlimentos.png";
}
else
{ 
	if($id=="2")
	{
		$titulo="Vida Noctura";
		$header="headerVidaNocturna.png";
	}	
	else
	{ 
		if($id=="3")
		{
			$titulo="Compras";
			$header="headerShopping.png";
		}
		else
		{ 
			if($id=="4")
			{
				$titulo="Entretenimiento";
				$header="headerEntretenimiento.png";
			}
			else
			{
				 if($id=="5")
				 {
					$titulo="Actividades";
					$header="headerActividades.png";
				 }
				 else
				 { 
				 	if($id=="6")
					{
						$titulo="Servicios";
						$header="headerAlimentos.png";
					}
				 }
			}
		}
	}
}

		
		$consulta  = "select * from Empresas  where idEmpresa=$idE ";
	$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1: " . mysql_error());
	$count=1;
	if(@mysql_num_rows($resultado)>0)
	{
		$res=mysql_fetch_row($resultado);	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	background-color: #1D1D1D;
	overflow-x:hidden;
}
-->
</style>


<link rel="stylesheet" href="assets/css/lugarStyles.css">
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
<style type="text/css">
<!--
.style3 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #FFFFFF; font-weight: bold;text-decoration: none; }
.style4 {font-size: 14px; color: #FFFFFF; text-decoration: none; font-family: Arial, Helvetica, sans-serif;}
-->
</style>
</head>

<body>

<table width="803" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="239" valign="bottom" background="assets/imgs/header_alimentos2.png" style="background-repeat:no-repeat;"><table width="100%" height="310" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td height="292" valign="bottom"><div align="center"><img src="assets<? echo"$res[14]";?>" width="184" height="184" /></div>
          <div align="left"></div></td>
        </tr>
      <tr>
        <td valign="bottom">          <p align="center"><span class="subtitle"><? echo"$res[2]";?></span><span class="horarioNaranja">s</span></p></td>
        </tr>
      <tr>
        <td valign="bottom"><div align="center"><span class="contenido"><? echo"$res[3]";?></span><span class="horarioNaranja"><? echo"$res[6]";?></span></div></td>
      </tr>
    </table></td>
  </tr>
  
  <tr>
    <td valign="bottom">
      <table width="799" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr>
          <td width="23">&nbsp;</td>
          <td width="406" valign="top"><div align="center">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="94%"><span class="subtitle"><strong><? echo"$res[1]";?></strong></span></td>
                <td width="6%">&nbsp;</td>
              </tr>
              <tr>
                <td><hr /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><? echo"$res[13]";?></td>
                <td>&nbsp;</td>
              </tr>
            </table>
            </div></td>
          <td width="349" class="contenido"><div align="center"><img src="assets/<? echo"$res[10]";?>"  height="250" /></div></td>
          <td width="22">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="style3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="13%">&nbsp;</td>
                <td width="87%" class="direccionLista">&nbsp;</td>
              </tr>
          </table></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"><table width="800" height="22" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                <td width="38">&nbsp;</td>
                <td width="304" height="40" valign="bottom"><span class="subtitle">Como llegar </span></td>
                <td width="24" valign="bottom">&nbsp;</td>
                <td width="404" height="40" valign="bottom" ><span class="subtitle">Menú</span> </td>
                <td width="30">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><p>
                  <iframe width="400" height="200" frameborder="0" scrolling="No" marginheight="0" marginwidth="0" src="<? echo"$res[11]";?>&output=embed"></iframe>
                  <br />
                  <small><a href="<? echo"$res[11]";?>" target="_blank" class="contenidoNegritas" >Ver mapa m&aacute;s grande</a></small></p></td>
                <td>&nbsp;</td>
                <td valign="top" class="style3"><?		
	$consulta  = "select id_empresa, nombre from imagenes_menu where id_empresa = $idE";

	$resultado = mysql_query($consulta) or die("Error en operacion3: " . mysql_error());
	$count=1;
	while(@mysql_num_rows($resultado)>=$count)
	{
		$res_img=mysql_fetch_row($resultado);
		if($count=="1")
		{
		?>
                  <a class="group2" href="assets<? echo"$res_img[1]";?>" title="Menú"><img src="assets<? echo"$res_img[1]";?>" width="70" height="70" border="0" /></a>
                  <?
		}
		else
		{
		?>
                  <a class="group2" href="assets<? echo"$res_img[1]";?>" title="Menú"><img src="assets<? echo"$res_img[1]";?>" width="70" height="70" border="0" /></a>
                  <? 
		}
		
		$count++;
	}
        ?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td height="40" valign="bottom"><span class="subtitle">Contacto</span></td>
                <td>&nbsp;</td>
                <td class="subtitle" >Promociones</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td valign="top" ><span class="contenido"><span class="contenidoNegritas">Tel: </span><? echo"$res[4]";?>
                    <? if($res[5]!=""){?>
                    <span class="contenidoNegritas"><br />
Email: </span><? echo"$res[4]";?>
<? }?>
<? if($res[7]!=""){?>
<br/>
<a href="<? echo"$res[7]";?>" target="_blank" class="contenido"><? echo"$res[7]";?></a>
<? }?>
<? if($res[8]!=""){?>
<br/>
<a href="http://www.facebook.com/<? echo"$res[8]";?>" target="_blank"><img src="assets/imgs/fbBttn.png" width="30" height="30" border="0" /></a>
<? }?>
                </span></td>
                <td>&nbsp;</td>
                <td valign="top" ><table width="100%" border="0" cellspacing="0" cellpadding="0">

                  <tr>
                    <td><span class="subtitle">DeLuxe </span></td>
                  </tr>
                  <tr>
                    <td><span class="contenido"><? echo"$res[24]";?></span></td>
                  </tr>
                  <tr>
                    <td class="subtitle">Diamond</td>
                  </tr>
                  <tr>
                    <td><span class="contenido"><? echo"$res[25]";?></span></td>
                  </tr>
                </table></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td height="40" valign="bottom"  ><span class="subtitle">Galeria</span></td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="3" valign="bottom"  ><table width="718" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="132"><? if($res[16]!=""){?>
                          <a class="group1" href="assets<? echo"$res[16]";?>" title="<? echo"$res[1]";?>"><img src="assets<? echo"$res[16]";?>" width="132" height="87" border="0" /></a>
                        <? }else echo"&nbsp;";?></td>
                      <td width="13">&nbsp;</td>
                      <td width="135"><? if($res[17]!=""){?>
                          <a class="group1" href="assets<? echo"$res[17]";?>" title="<? echo"$res[1]";?>"><img src="assets<? echo"$res[17]";?>" width="132" height="87" border="0" /></a>
                        <? }else echo"&nbsp;";?></td>
                      <td width="10">&nbsp;</td>
                      <td width="135"><? if($res[18]!=""){?>
                          <a class="group1" href="assets<? echo"$res[18]";?>" title="<? echo"$res[1]";?>"><img src="assets<? echo"$res[18]";?>" width="132" height="87" border="0" /></a>
                        <? }else echo"&nbsp;";?></td>
                      <td width="10">&nbsp;</td>
                      <td width="135"><? if($res[19]!=""){?>
                          <a class="group1" href="assets<? echo"$res[19]";?>" title="<? echo"$res[1]";?>"><img src="assets<? echo"$res[19]";?>" width="132" height="87" border="0" /></a>
                        <? }else echo"&nbsp;";?></td>
                      <td width="10">&nbsp;</td>
                      <td width="138"><? if($res[20]!=""){?>
                          <a class="group1" href="assets<? echo"$res[20]";?>" title="<? echo"$res[1]";?>"><img src="assets<? echo"$res[20]";?>" width="132" height="87" border="0" /></a>
                        <? }else echo"&nbsp;";?></td>
                    </tr>
                </table></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td height="40" colspan="3" valign="bottom"  >&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="3" valign="bottom"  >&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="3" valign="bottom"  >&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
          </table></td>
        </tr>
      </table>
    </td>
  </tr>
</table>

</body>
</html>
<? }?>
