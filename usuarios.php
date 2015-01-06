<?

session_start();

include "checar_sesion_usuario.php";

	$usuario=$_SESSION['usuario'];

	//echo" tarjeta $no_tarjeta";	



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!-- saved from url=(0046)http://dandy.mx/index.php/patrocinadores/index -->

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



<script>

if(navigator.userAgent.indexOf("MSIE")>0)

{

document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/admonStylesE.css" /> ');

document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/lugarStylesE.css" /> ');

document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/stylesE.css" /> ');

}

else

{

document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/admonStyles.css" /> ');

document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/lugarStylesE.css" /> ');

document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/styles.css" /> ');



}

</script>

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

<script src="assets/jQuery/jquery-1.2.6.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="../assets/color3/colorbox.css" />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

		<script src="assets/color3/jquery.colorbox.js"></script>

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



$consulta  = "SELECT m.id,tarjeta,codigo,m.nombre,app,apm,direccion,cp,estado,ciudad,tel_fijo,tel_oficina,tel_cel,email,rfc,fecha_nac,puntos,cuenta_banco,banco,fecha_alta,r.nombre FROM n_miembros AS m INNER JOIN n_rangos AS r on m.genero=r.genero where m.id = $usuario";

//echo"$consulta";

$resultado = mysql_query($consulta) or die("Error en operacion3: " . mysql_error());

if(@mysql_num_rows($resultado)>=1){

	$usu_info=mysql_fetch_row($resultado);

	$tarjeta=$usu_info[1];

	$codigo=$usu_info[2];

	$nombre="$usu_info[3] $usu_info[4] $usu_info[5]";

	$direccion=$usu_info[6];

	$cp=$usu_info[7];

	$estado=$usu_info[8];

	$ciudad=$usu_info[9];

	$tel_fijo=$usu_info[10];

	$tel_ofi=$usu_info[11];

	$cel=$usu_info[12];

	$email=$usu_info[13];

	$rfc=$usu_info[14];

	$fecha= $usu_info[15];

	$fechat = explode('-', $fecha);

	$f_nac="$fechat[2]-$fechat[1]-$fechat[0]";

	$puntos=$usu_info[16];

	$cuenta=$usu_info[17];

	$banco=$usu_info[18];

	$fecha=$usu_info[19];

	$fechat=explode('-',$fecha);

	$f_registro="$fechat[2]-$fechat[1]-$fechat[0]";

	$rango=$usu_info[20];

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

                          <td colspan="3" bgcolor="#333333" class="subtitle">Mis Datos </td>

                        </tr>

                        <tr>

                          <td colspan="3" bgcolor="#333333" class="subtitle"><hr /></td>

                        </tr>

                        <tr>

                          <td height="22" colspan="2" bgcolor="#333333" class="contenidoNegritas">Tarjeta: </td>

                          <td width="409" height="22" bgcolor="#333333" class="contenido"><div align="left"><? echo"$tarjeta";?></div></td>

                        </tr>

                        <tr>

                          <td height="22" colspan="2" bgcolor="#333333" class="contenidoNegritas">Nombre:</td>

                          <td height="22" bgcolor="#333333" class="contenido"><div align="left"><? echo"$nombre";?></div></td>

                        </tr>

                        <tr>

                          <td height="22" colspan="2" bgcolor="#333333" class="contenidoNegritas">Dirección:</td>

                          <td height="22" bgcolor="#333333" class="contenido"><div align="left"><? echo"$direccion";?></div></td>

                        </tr>

                        <tr>

                          <td height="22" colspan="2" bgcolor="#333333" class="contenidoNegritas">Fecha de Nacimiento: </td>

                          <td height="22" bgcolor="#333333" class="contenido"><div align="left"><? echo"$f_nac";?></div></td>

                        </tr>

                        <tr>

                          <td height="22" colspan="2" bgcolor="#333333" class="contenidoNegritas">Correo Electrónico: </td>

                          <td height="22" bgcolor="#333333" class="contenido"><div align="left"><? echo"$email";?></div></td>

                        </tr>

                        <tr>

                          <td height="22" colspan="2" bgcolor="#333333" class="contenidoNegritas">Miembro desde : </td>

                          <td height="22" bgcolor="#333333" class="contenido"><div align="left"><? echo"$f_registro";?></div></td>

                        </tr>

                        <tr>

                          <td width="19" bgcolor="#333333" ></td>

                          <td width="170" height="10" bgcolor="#333333" ></td>

                          <td bgcolor="#333333" ></td>

                        </tr>

                        <tr>

                          <td height="30" colspan="3" bgcolor="#333333" class="masLista"><div align="center" class="horarioDetalle"><a href="cambia_pass.php" class="horarioDetalle iframe"></a></div></td>

                        </tr>

                        <tr>

                          <td height="30" colspan="3" class="masLista">&nbsp;</td>

                        </tr>

                        <tr>

                          <td height="30" colspan="3" class="masLista"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#333333">

                            <tr>

                              <td colspan="2" class="contenidoNegritas">&nbsp;</td>

                            </tr>

                            <tr>

                              <td colspan="2" class="contenidoNegritas"><div align="center" class="subtitle">

                                <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                  <tr>

                                    <td>Puntos generados </td>

									<td background="../assets/imgs/menu_sep.png" class="contenido"><? echo"$puntos";?> </td>

                                  </tr>

                                </table>

                              </div></td>

                            </tr>

                            <tr>

                              <td colspan="2" class="contenidoNegritas"><hr /></td>

                            </tr>

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