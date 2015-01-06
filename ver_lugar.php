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
	background-color: #000000;
	overflow-x:hidden;
}
-->
</style>

<link rel="stylesheet" href="http://dandy.mx/assets/css/Local.css">
<link rel="stylesheet" href="http://dandy.mx/assets/css/lugarStyles.css">
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

<table width="823" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="239" valign="bottom" background="assets/imgs/<? echo"$header";?>"><table width="732" height="173" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td width="348" valign="bottom"><div align="left" ><span class="subtitle"><strong><? echo"$res[1]";?> </strong></span></div></td>
        <td width="267" valign="top"><div align="left"><img src="assets<? echo"$res[14]";?>" width="150" height="150" /></div></td>
      </tr>
    </table></td>
  </tr>
  
  <tr>
    <td valign="bottom">
	<div style="height:400px;overflow:scroll;">
	<table width="799" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td width="23">&nbsp;</td>
        <td width="425"><div align="center"><img src="assets/<? echo"$res[10]";?>" width="327" height="250" /></div></td>
        <td width="336" class="style4"><? echo"$res[13]";?></td>
        <td width="22">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td class="style3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="13%">&nbsp;</td>
              <td width="87%"><? echo"$res[2]";?><br />
                <? echo"$res[3]";?></td>
            </tr>
          </table></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4"><table width="800" height="22" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td width="38">&nbsp;</td>
            <td width="304" height="40" valign="bottom"><span class="subtitle">Datos de Contacto </span></td>
            <td width="24" valign="bottom">&nbsp;</td>
            <td width="404" height="40" valign="bottom" ><span class="subtitle">Precios y Servicios</span> </td>
            <td width="30">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span class="style3">Tel: <? echo"$res[4]";?> </span></td>
            <td>&nbsp;</td>
            <td class="style3">Menu</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="40" valign="bottom"><span class="subtitle">Horario de Servicio</span> </td>
            <td>&nbsp;</td>
            <td >&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td valign="top" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="100" valign="top"><span class="style3"><? echo"$res[6]";?></span></td>
                </tr>
                <tr>
                  <td><span class="subtitle">Promoción Deluxe </span></td>
                </tr>
                <tr>
                  <td><span class="style3"><? echo"$res[24]";?></span></td>
                </tr>
              </table></td>
            <td>&nbsp;</td>
            <td ><iframe width="400" height="200" frameborder="0" scrolling="No" marginheight="0" marginwidth="0" src="<? echo"$res[11]";?>&output=embed"></iframe>
                <br />
              <small><a href="<? echo"$res[11]";?>" target="_blank" class="style3" >Ver mapa m&aacute;s grande</a></small></td>
            <td><img src="assets/imgs/comoLlegar.png" width="30" height="200" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td valign="bottom" ><span class="subtitle">Promoción Diamante </span></td>
            <td>&nbsp;</td>
            <td >&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td valign="bottom" class="style3" ><? echo"$res[25]";?></td>
            <td>&nbsp;</td>
            <td >&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td valign="bottom"  ><span class="subtitle">Galeria</span></td>
            <td>&nbsp;</td>
            <td >&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="3" valign="bottom"  ><table width="718" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="132"><? if($res[16]!=""){?><a class="group1" href="assets<? echo"$res[16]";?>" title="<? echo"$res[1]";?>"><img src="assets<? echo"$res[16]";?>" width="132" height="87" border="0" /></a><? }else echo"&nbsp;";?></td>
                  <td width="13">&nbsp;</td>
                  <td width="135"><? if($res[17]!=""){?><a class="group1" href="assets<? echo"$res[17]";?>" title="<? echo"$res[1]";?>"><img src="assets<? echo"$res[17]";?>" width="132" height="87" border="0" /></a><? }else echo"&nbsp;";?></td>
                  <td width="10">&nbsp;</td>
                  <td width="135"><? if($res[18]!=""){?><a class="group1" href="assets<? echo"$res[18]";?>" title="<? echo"$res[1]";?>"><img src="assets<? echo"$res[18]";?>" width="132" height="87" border="0" /></a><? }else echo"&nbsp;";?></td>
                  <td width="10">&nbsp;</td>
                  <td width="135"><? if($res[19]!=""){?><a class="group1" href="assets<? echo"$res[19]";?>" title="<? echo"$res[1]";?>"><img src="assets<? echo"$res[19]";?>" width="132" height="87" border="0" /></a><? }else echo"&nbsp;";?></td>
                  <td width="10">&nbsp;</td>
                  <td width="138"><? if($res[20]!=""){?><a class="group1" href="assets<? echo"$res[20]";?>" title="<? echo"$res[1]";?>"><img src="assets<? echo"$res[20]";?>" width="132" height="87" border="0" /></a><? }else echo"&nbsp;";?></td>
                </tr>
              </table></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="3" valign="bottom"  ><span class="subtitle">Redes Sociales </span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="3" valign="bottom"  ><? if($res[8]!=""){?>
              <a href="http://www.facebook.com/<? echo"$res[8]";?>" target="_blank"><img src="assets/imgs/fbBttn.png" width="30" height="30" border="0" /></a>              <? }?></td>
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
	</div>	</td>
  </tr>
</table>

</body>
</html>
<? }?>
