<?
session_start();
include "checar_sesion_usuario.php";
	$no_tarjeta=$_SESSION['no_tarjeta'];
	//echo" tarjeta $no_tarjeta";	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0046)http://dandy.mx/index.php/patrocinadores/index -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="stylesheet" href="http://www.dandy.mx/assets/css/admonStyles.css">
<link rel="stylesheet" href="http://www.dandy.mx/assets/css/lugarStyles.css">
<link rel="stylesheet" href="http://www.dandy.mx/assets/css/styles.css">

<title>Untitled Document</title>
<style>
	html{
		margin:0 0;
	}
	body{
		background:transparent;
		margin: 0 0;
		overflow-x:hidden;
		overflow-y:hidden;
    }
.style5 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; }
.style3 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #104352; }
.style4 {color: #FFFFFF}
</style>
<script>
function ira2(){
	if(document.form1.Numero1.value.length=="4")
	{
		document.form1.Numero2.focus();
	}
}
function ira3(){
	if(document.form1.Numero2.value.length=="4")
	{
		document.form1.Numero3.focus();
	}
}
function ira4(){
	if(document.form1.Numero3.value.length=="4")
	{
		document.form1.Numero4.focus();
	}
}

</script>
<script src="../assets/jQuery/jquery-1.2.6.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../assets/color3/colorbox.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script src="../assets/color3/jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements
				
				$(".iframe").colorbox({iframe:true, width:"530", height:"340"});
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
</head>
<?

//include "checar_sesion_admin.php";
include "coneccion.php";

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
	<body>
        	<form action="" method="post" name="form1" id="form1" accept-charset="utf-8">
			<div align="center">
        	  <table width="822" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="231" valign="bottom" background="assets/imgs/h_usuarios.png"><table width="582" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="48" class="subTitle2"><div align="center"></div></td>
                      <td width="534" class="subTitle2"><div align="right"><a href="cambia_pass.php" class="saveBttnSmall iframe">Cambio de Password </a></div></td>
                    </tr>
                    <tr>
                      <td colspan="2" class="subTitle2"><div align="center" class="benedicioTipo2"></div></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><table width="671" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="62">&nbsp;</td>
                      <td width="571"><table width="598" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td colspan="3" class="subtitle">Mis Datos </td>
                        </tr>
                        <tr>
                          <td width="89" class="contenidoNegritas">&nbsp;</td>
                          <td width="186" height="22" class="contenidoNegritas">Tarjeta: </td>
                          <td width="314" height="22" class="contenido"><? echo"$num1";?>-<? echo"$num2";?>-<? echo"$num3";?>-<? echo"$num4";?></td>
                        </tr>
                        <tr>
                          <td class="contenidoNegritas">&nbsp;</td>
                          <td height="22" class="contenidoNegritas">Nombre:</td>
                          <td height="22" class="contenido"><? echo"$nombre";?></td>
                        </tr>
                        <tr>
                          <td class="contenidoNegritas">&nbsp;</td>
                          <td height="22" class="contenidoNegritas">Dirección:</td>
                          <td height="22" class="contenido"><? echo"$direccion";?></td>
                        </tr>
                        <tr>
                          <td class="contenidoNegritas">&nbsp;</td>
                          <td height="22" class="contenidoNegritas">F. de Nacimiento: </td>
                          <td height="22" class="contenido"><? echo"$f_nac";?></td>
                        </tr>
                        <tr>
                          <td class="contenidoNegritas">&nbsp;</td>
                          <td height="22" class="contenidoNegritas">Correo : </td>
                          <td height="22" class="contenido"><? echo"$email";?></td>
                        </tr>
                        <tr>
                          <td class="contenidoNegritas">&nbsp;</td>
                          <td height="22" class="contenidoNegritas">Miembro desde : </td>
                          <td height="22" class="contenido"><? echo"$f_act";?></td>
                        </tr>
                        <tr>
                          <td class="contenidoNegritas">&nbsp;</td>
                          <td height="22" class="contenidoNegritas">Vigente hasta : </td>
                          <td height="22" class="contenido"><? echo"$f_vig";?></td>
                        </tr>
                        <tr>
                          <td ></td>
                          <td height="10" ></td>
                          <td ></td>
                        </tr>
                        <tr>
                          <td class="contenidoNegritas">&nbsp;</td>
                          <td class="contenidoNegritas">Tipo</td>
                          <td class="benedicioTipo">Deluxe</td>
                        </tr>
                        <tr>
                          <td height="30" colspan="3" class="masLista"><div align="center" class="horarioDetalle"><a href="cambia_pass.php" class="horarioDetalle iframe"></a></div></td>
                        </tr>
                        <tr>
                          <td height="30" colspan="3" class="masLista"><table width="589" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td colspan="2" class="contenidoNegritas"><div align="center" class="subtitle">Puntos generados </div></td>
                            </tr>
                            <tr>
                              <td width="337" class="contenidoNegritas"><div align="center">
                                  <table width="149" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td><span class="contenidoNegritas">Establecimiento</span></td>
                                    </tr>
                                  </table>
                              </div></td>
                              <td width="127" class="contenidoNegritas"><div align="center" class="subtitle">
                                  <table width="86" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td class="contenidoNegritas">Puntos</td>
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
                              <td background="../assets/imgs/menu_sep.png" class="contenido"><? echo"$res[0];"?> </td>
                              <td background="../assets/imgs/menu_sep.png" class="contenido"><div align="center"><? echo"$res[1];"?></div></td>
                            </tr>
                            <?
			   $count=$count+1;
	}
	
?>
                          </table></td>
                        </tr>
                      </table></td>
                      <td width="17">&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><div align="right" class="contenidoNegritas"><a href="logout.php" class="contenidoNegritas">SALIR</a></div></td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                  <p>&nbsp;</p></td>
                </tr>
              </table>
          </div>
        	
        	 
        
            </form>
</body></html>