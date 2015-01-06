<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0020)http://www.dandy.mx/ -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?
session_start();
include "checar_sesion_usuario.php";
	$no_tarjeta=$_SESSION['no_tarjeta'];
	echo" tarjeta $no_tarjeta";	

include "../coneccion.php";



$consulta  = "select * from Tarjetahabientes where numero_de_tarjeta = $no_tarjeta";
//echo"$consulta";
$resultado = mysql_query($consulta) or die("Error en operacion3: " . mysql_error());
if(@mysql_num_rows($resultado)>=1)
{
	$empresa_info=mysql_fetch_row($resultado);
	$nombre=$empresa_info[2];
	$direccion=$empresa_info[3];
	$email=$empresa_info[4];
	$telefono=$empresa_info[5];
	$num1=substr($no_tarjeta,0, 4);
	$num2=substr($no_tarjeta,4, 4);
	$num3=substr($no_tarjeta,8, 4);
	$num4=substr($no_tarjeta,12);
	
	$fecha= $empresa_info[7];
	$fechat = explode('-', $fecha);
	$f_nac="$fechat[2]-$fechat[1]-$fechat[0]";
	$fecha= $empresa_info[9];
	$fechat = explode('-', $fecha);
	$f_act="$fechat[2]-$fechat[1]-$fechat[0]";
	$fecha= $empresa_info[10];
	$fechat = explode('-', $fecha);
	$f_vig="$fechat[2]-$fechat[1]-$fechat[0]";
	$tipo= $empresa_info[1];
	if($tipo=="1")
		$tipo_t="Deluxe";
	else
	{
		if($tipo=="2")
		$tipo_t="Diamond";
		
	}
}
?>		
<link rel="stylesheet" href="http://www.dandy.mx/assets/css/styles.css">
<link rel="stylesheet" href="http://www.dandy.mx/assets/css/admonStyles.css">
<link rel="stylesheet" href="http://www.dandy.mx/assets/css/lugarStyles.css">
<!-- Script -->
<script src="../assets/jQuery/jquery-1.2.6.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../assets/color3/colorbox.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script src="../assets/color3/jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements
				
				$(".iframe").colorbox({iframe:true, width:"520", height:"335"});
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
			
			function cerrarV()
{

$.fn.colorbox.close();
}
		</script>
		
<script>
function verframe(valor){
window.location="#ventan";
	document.getElementById("myframe").src=valor;
}
</script>
<title>Dandy</title>
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
                  <td><div align="right"><a href="https://www.facebook.com/dandymx" target="_blank"><img src="../assets/imgs/fbBttn.png" width="30" height="30" border="0" /></a></div></td>
                </tr>
              </table>
        	</div>
			
            <div id="header2">
            	<div id="menuTop">
                	<ul id="menuTopList">
                    	<li><a href="http://www.dandy.mx"  style="padding-left:120px">HOME</a></li>
						<li><a href="http://www.dandy.mx/logout.php" style="padding-left:125px">SALIR</a></li>
                       <!-- <li><a href="javascript:verframe('f_registro.php');" style="padding-left:75px">REGISTRATE</a></li>
						<li><a href="javascript:verframe('f_usuarios.php');"  style="padding-left:95px">USUARIOS</a></li>
                		<li><a href="javascript:verframe('f_puntos.php');" >PUNTOS DE VENTA</a></li>
                		<li><a href="javascript:verframe('f_acerca.php');"  style="padding-left:92px">ACERCA DE</a></li>
                        <li><a href="javascript:verframe('f_contacto.php');"  style="padding-left:100px">CONTACTO</a></li>-->
						
                    </ul>
              </div>
                <div id="vid"><div id="vid2"><table width="400" border="0" cellspacing="0" cellpadding="0">
 
  <tr>
    <td colspan="2" class="subtitle">Mis Datos </td>
    </tr>
  <tr>
    <td width="198" height="22" class="contenidoNegritas">Tarjeta: </td>
    <td width="202" height="22" class="contenido"><? echo"$num1";?>-<? echo"$num2";?>-<? echo"$num3";?>-<? echo"$num4";?></td>
  </tr>
  <tr>
    <td height="22" class="contenidoNegritas">Nombre:</td>
    <td height="22" class="contenido"><? echo"$nombre";?></td>
  </tr>
  <tr>
    <td height="22" class="contenidoNegritas">Dirección:</td>
    <td height="22" class="contenido"><? echo"$direccion";?></td>
  </tr>
  <tr>
    <td height="22" class="contenidoNegritas">F. de Nacimiento: </td>
    <td height="22" class="contenido"><? echo"$f_nac";?></td>
  </tr>
  <tr>
    <td height="22" class="contenidoNegritas">Correo : </td>
    <td height="22" class="contenido"><? echo"$email";?></td>
  </tr>
  <tr>
    <td height="22" class="contenidoNegritas">Miembro desde : </td>
    <td height="22" class="contenido"><? echo"$f_act";?></td>
  </tr>
  <tr>
    <td height="22" class="contenidoNegritas">Vigente hasta : </td>
    <td height="22" class="contenido"><? echo"$f_vig";?></td>
  </tr>
  <tr>
    <td height="10" ></td>
    <td ></td>
  </tr>
  <tr>
    <td class="contenidoNegritas">Tipo</td>
    <td class="benedicioTipo">Deluxe</td>
  </tr>
  <tr>
    <td height="30" colspan="2" class="masLista"><div align="center" class="horarioDetalle"><a href="cambia_pass.php" class="horarioDetalle iframe">Cambio de Password </a></div></td>
    </tr>
</table>
</div></div>
            </div>
			<div >
              <table width="464" border="0" align="center" cellpadding="0" cellspacing="0">

                <tr>
                  <td colspan="2" class="contenidoNegritas"><div align="center">Puntos generados en establecimientos afiliados </div></td>
                </tr>
                <tr>
                  <td width="337" class="contenidoNegritas"><div align="center">
                    
                    
                    <table width="149" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><span class="subtitle">Establecimiento</span></td>
                      </tr>
                    </table>
                  </div></td>
                  <td width="127" class="contenidoNegritas"><div align="center" class="subtitle">
                    <table width="86" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>Puntos</td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
				<?
		$consulta  = "select Empresas.Nombre, sum(consumos.puntos) from Empresas inner join consumos on Empresas.idEmpresa=consumos.id_empresa where consumos.id_tarjeta='$no_tarjeta' group by Empresas.idEmpresa order by Empresas.Nombre";
	$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1: " . mysql_error());
	$count=1;
	while(@mysql_num_rows($resultado)>=$count)
	{
		$res=mysql_fetch_row($resultado);
		
	?>
                <tr>
                  <td background="../assets/imgs/menu_sep.png" class="contenidoNegritas">La norteñita </td>
                  <td background="../assets/imgs/menu_sep.png" class="contenidoNegritas"><div align="center">24</div></td>
                </tr>
	<?
			   $count=$count+1;
	}
	
?>  
              </table>
			</div>
            <div id="footer">© Copyright Dandy Co. 2013	
            </div>
			<div id="footer"><div class="fb-like" data-href="https://www.facebook.com/dandymx" data-send="false" data-width="280" data-show-faces="false" data-colorscheme="dark"></div></div>
        </div>
    </div>


</body></html>