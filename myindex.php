<?
$ver=$_GET["ver"];
$ver2=$_GET["ver2"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0020)http://www.dandy.mx/ -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="stylesheet" href="assets/css/styles.css">

<!-- Script -->
<script src="assets/jQuery/jquery-1.2.6.min.js" type="text/javascript"></script>

<script>
function verframe(valor){
window.location="#ventan";
	document.getElementById("myframe").src=valor;
}

</script>
<title>Dandy</title>
<style type="text/css">
<!--
.style11 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
-->
</style>
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div id="dBg">
    	<div id="mainBg">
		
        	<div id="logow">
        	  <table width="95%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><div align="right"></div></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td height="30">&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><div align="right"><a href="https://www.facebook.com/dandymx" target="_blank"><img src="assets/imgs/fbBttn.png" width="30" height="30" border="0" /></a></div></td>
                </tr>
              </table>
        	</div>
			
            <div id="header">
			

            	<div id="menuTop">
                	<ul id="menuTopList">
					<table width="195" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="right">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="21%" class="style11">&nbsp;</td>
            <td width="64%" height="21" class="style11"><div align="right"><a href="javascript:verframe('f_home.php');" class="letrasMenu"  >HOME</a></div></td>
            <td width="15%" class="style11">&nbsp;</td>
          </tr>
          </table>
    </div></td>
    </tr>
  <tr>
    <td><div align="right">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="12%" class="style11">&nbsp;</td>
            <td width="73%" height="21" class="style11"><div align="right"><a href="javascript:verframe('f_registro.php');" class="letrasMenu" >REGÍSTRATE</a></div></td>
            <td width="15%" class="style11">&nbsp;</td>
          </tr>
          </table>
    </div></td>
  </tr>
  <tr>
    <td><div align="right">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="14%" class="style11">&nbsp;</td>
            <td width="73%" height="21" class="style11"><div align="right"><a href="javascript:verframe('f_usuarios.php');" class="letrasMenu"  >USUARIOS</a></div></td>
            <td width="13%" class="style11">&nbsp;</td>
          </tr>
          </table>
    </div></td>
  </tr>
  <tr>
    <td><div align="right">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="9%" class="style11">&nbsp;</td>
            <td width="81%" height="21" class="style11"><div align="right"><a href="javascript:verframe('f_puntos.php');" class="letrasMenu" >PUNTOS DE VENTA</a></div></td>
            <td width="10%" class="style11">&nbsp;</td>
          </tr>
          </table>
    </div></td>
  </tr>
  <tr>
    <td><div align="right">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="12%" class="style11">&nbsp;</td>
            <td width="82%" height="21" class="style11"><div align="right"><a href="javascript:verframe('f_acerca.php');" class="letrasMenu" >CONÓCENOS</a></div></td>
            <td width="6%" class="style11">&nbsp;</td>
          </tr>
          </table>
    </div></td>
  </tr>
  <tr>
    <td><div align="right">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="13%" class="style11">&nbsp;</td>
            <td width="86%" height="21" class="style11"><div align="right"><a href="javascript:verframe('f_contacto.php');" class="letrasMenu"  >CONTACTO</a></div></td>
            <td width="1%" class="style11">&nbsp;</td>
          </tr>
          </table>
    </div></td>
  </tr>
</table>
                    	
                    </ul>
              </div>
                <div id="vid"><div id="vid2"><iframe src="slider2.php" name="myslider"  id="myslider" scrolling="no" width="436" height="254" style="background-image:url(http://Dandy.mx/assets/imgs/bg1.png)" frameborder="0">
                    </iframe></div></div>
            </div>
            <div id="main">
            	<div id="menuCenter">
                	<ul id="menuCenterList"><table width="824" height="35" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center"><A NAME="ventan"></A><a href="javascript:verframe('lista2.php?id=1');" class="letrasMenu2" >ALIMENTOS</a></div></td>
    <td><img src="assets/imgs/separador_naranja.jpg" /></td>
    <td><div align="center"><a href="javascript:verframe('lista2.php?id=2');" class="letrasMenu2" >VIDA NOCTURNA</a></div></td>
    <td><img src="assets/imgs/separador_naranja.jpg" /></td>
    <td><div align="center"><a href="javascript:verframe('lista2.php?id=3');" class="letrasMenu2" >TIENDAS</a></div></td>
    <td><img src="assets/imgs/separador_naranja.jpg" /></td>
    <td><div align="center"><a href="javascript:verframe('lista2.php?id=4');" class="letrasMenu2" >ENTRETENIMIENTO</a></div></td>
    <td><img src="assets/imgs/separador_naranja.jpg" /></td>
    <td><div align="center"><a href="javascript:verframe('lista2.php?id=5');" class="letrasMenu2" >ACTIVIDADES</a></div></td>
    <td><img src="assets/imgs/separador_naranja.jpg" /></td>
    <td><div align="center"><a href="javascript:verframe('lista2.php?id=6');" class="letrasMenu2" >SERVICIOS</a></div></td>
  </tr>
</table>

                    	                    		
                  </ul>
                </div>
                <div id="center">
                  <div id="clientContainer">
                    <iframe src="f_home.php" name="myframe"  id="myframe" scrolling="yes" width="823px" height="657px" style="background-image:url(images/fondo_lista.jpg)">
                    </iframe>
                  </div>
                </div>
            </div>
            <div id="footer">© Copyright Dandy Co. 2013	
            </div>
			<div id="footer"><div class="fb-like" data-href="https://www.facebook.com/dandymx" data-send="false" data-width="280" data-show-faces="false" data-colorscheme="dark"></div></div>
        </div>
    </div>

<? if($ver!="")
{
?>
<script>
verframe('detalle.php?id=<? echo"$ver";?>&idE=<? echo"$ver2";?>');
</script>
<?
}
?>
</body></html>