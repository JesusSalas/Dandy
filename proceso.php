<?php

include "coneccion.php";

$id=$_POST['id'];

$query="SELECT tarjeta,codigo,nombre,app,apm,direccion,cp,estado,ciudad,tel_fijo,tel_oficina,

	tel_cel,email,rfc,fecha_nac,genero,cuenta_banco,banco,venc_tarjeta,rango_actual

	FROM n_miembros WHERE id=$id";

$ejecuta=mysql_query($query)or die("Error al consultar datos de $id: ".mysql_error());

$row=mysql_fetch_row($ejecuta);

$tarjeta=$row[0];

$codigo=$row[1];

$nombre=$row[2];

$app=$row[3];

$apm=$row[4];

$direccion=$row[5];

$cp=$row[6];

$estado=$row[7];

$ciudad=$row[8];

$tel_fijo=$row[9];

$tel_ofi=$row[10];

$tel_cel=$row[11];

$email=$row[12];

$rfc=$row[13];

$fecha_nac=$row[14];

$genero=$row[15];

$cuenta=$row[16];

$banco=$row[17];

$vencimiento=$row[18];

$rango=$row[19];



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<form method="post" action="adm_usuarios.php"><table border="0" cellpadding="0" cellspacing="0">

	<tr>

	  <td width="300"><div align="right"><span class="contenidoNegritasCH">Tarjeta*&nbsp;</span></div></td>

	  <td><div align="left">

	  	<input value="<?php echo"$id";?>" name="id" type="hidden" id="id">

		<input value="<?php echo"$tarjeta";?>" style="width:327px" name="tarjeta" type="text" class="smallTxt" id="tarjeta" maxlength="7" required>

	  </div></td>

	</tr>

	<tr>

	  <td width="300"><div align="right"><span class="contenidoNegritasCH">Código de Seguridad*&nbsp;</span></div></td>

	  <td><div align="left">

		<input value="<?php echo"$codigo";?>" style="width:327px" name="codigo" type="text" class="smallTxt" id="codigo" maxlength="4" required>

	  </div></td>

	</tr>

	<tr>

	  <td width="300"><div align="right"><span class="contenidoNegritasCH">Vencimiento de la tarjeta*&nbsp;</span></div></td>

	  <td><div align="left">

		<input value="<?php echo"$vencimiento";?>" style="width:327px" name="venc" type="text" class="smallTxt" id="venc" maxlength="10" required>

	  </div></td>

	</tr>

	<tr>

	  <td width="300"><div align="right"><span class="contenidoNegritasCH">Nombre*&nbsp;</span></div></td>

	  <td><div align="left">

		<input value="<?php echo"$nombre";?>" style="width:327px" required name="nombre" type="text" class="smallTxt" id="nombre" maxlength="100">

	  </div></td>

	</tr>					

	<tr>

	  <td><div align="right"><span class="contenidoNegritasCH">Apellido Paterno*&nbsp;</span></div></td>

	  <td><div align="left">

	  <input required style="width:327px" value="<?php echo"$app";?>" name="app" type="text" class="smallTxt" id="app" maxlength="100">

	  </div></td>

	</tr>

	<tr>

	  <td><div align="right"><span class="contenidoNegritasCH">Apellido Materno &nbsp;</span></div></td>

	  <td><div align="left">

		<input style="width:327px" value="<?php echo"$apm";?>" name="apm" type="text" class="smallTxt" id="apm" maxlength="100">

	  </div></td>

	</tr>

	<tr>

	  <td><div align="right"><span class="contenidoNegritasCH">Teléfono de Casa &nbsp;</span></div></td>

	  <td><div align="left">

		<input style="width:327px" value="<?php echo"$tel_casa";?>" name="telCasa" type="text" class="smallTxt" id="telCasa" maxlength="10">

	  </div></td>

	</tr>

	<tr>

	  <td><div align="right"><span class="contenidoNegritasCH">Teléfono de Oficina &nbsp;</span></div></td>

	  <td><div align="left">

		<input name="telOfi" type="text" class="smallTxt" style="width:327px" value="<?php echo"$tel_ofi";?>" id="telOfi" maxlength="10">

	  </div></td>

	</tr>

	<tr>

	  <td><div align="right"><span class="contenidoNegritasCH">Teléfono Celular* &nbsp;</span></div></td>

	  <td><div align="left">

		<input name="telCel" style="width:327px" value="<?php echo"$tel_cel";?>" type="text" class="smallTxt" id="telCel" maxlength="10" required>

	  </div></td>

	</tr>

	<tr>

	  <td><div align="right"><span class="contenidoNegritasCH">Correo Electrónico* &nbsp;</span></div></td>

	  <td><div align="left">

		<input required name="email" value="<?php echo"$email";?>" style="width:327px" type="email" class="smallTxt" id="email" maxlength="100">

	  </div></td>

	</tr>

	<tr>

	  <td><div align="right"><span class="contenidoNegritasCH">Dirección* &nbsp;</span></div></td>

	  <td><div align="left">

		<input name="direccion" style="width:327px" value="<?php echo"$direccion";?>" type="text" class="smallTxt" id="direccion" maxlength="200" required>

	  </div></td>

	</tr>

	<tr>

	  <td><div align="right"><span class="contenidoNegritasCH">Ciudad* &nbsp;</span></div></td>

	  <td><div align="left">

		<input name="ciudad" style="width:327px" value="<?php echo"$ciudad";?>" type="text" class="smallTxt" id="ciudad" maxlength="100" required>

	  </div></td>

	</tr>

	<tr>

	  <td><div align="right"><span class="contenidoNegritasCH">Estado* &nbsp;</span></div></td>

	  <td><div align="left">

		<input name="estado" style="width:327px" value="<?php echo"$estado";?>" type="text" class="smallTxt" id="estado" maxlength="100" required>

	  </div></td>

	</tr>

	<tr>

	  <td><div align="right"><span class="contenidoNegritasCH">CP*&nbsp;</span></div></td>

	  <td><div align="left">

		<input style="width:327px" name="cp" value="<?php echo"$cp";?>" type="number" class="smallTxt" id="cp" maxlength="10" required>

	  </div></td>

	</tr>

	<tr>

	  <td><div align="right"><span class="contenidoNegritasCH">Fecha de&nbsp; Nacimimiento &nbsp;</span></div></td>

	  <td><div align="left"><span class="style5">

		<select name="dia" class="smallTxt" style="width:60px" id="dia">

		  <option value="01" <?php if(substr($fecha_nac,8,2)=="01")echo"selected";?>>1</option>

		  <option value="02" <?php if(substr($fecha_nac,8,2)=="02")echo"selected";?>>2</option>

		  <option value="03" <?php if(substr($fecha_nac,8,2)=="03")echo"selected";?>>3</option>

		  <option value="04" <?php if(substr($fecha_nac,8,2)=="04")echo"selected";?>>4</option>

		  <option value="05" <?php if(substr($fecha_nac,8,2)=="05")echo"selected";?>>5</option>

		  <option value="06" <?php if(substr($fecha_nac,8,2)=="06")echo"selected";?>>6</option>

		  <option value="07" <?php if(substr($fecha_nac,8,2)=="07")echo"selected";?>>7</option>

		  <option value="08" <?php if(substr($fecha_nac,8,2)=="08")echo"selected";?>>8</option>

		  <option value="09" <?php if(substr($fecha_nac,8,2)=="09")echo"selected";?>>9</option>

		  <option value="10" <?php if(substr($fecha_nac,8,2)=="10")echo"selected";?>>10</option>

		  <option value="11" <?php if(substr($fecha_nac,8,2)=="11")echo"selected";?>>11</option>

		  <option value="12" <?php if(substr($fecha_nac,8,2)=="12")echo"selected";?>>12</option>

		  <option value="13" <?php if(substr($fecha_nac,8,2)=="13")echo"selected";?>>13</option>

		  <option value="14" <?php if(substr($fecha_nac,8,2)=="14")echo"selected";?>>14</option>

		  <option value="15" <?php if(substr($fecha_nac,8,2)=="15")echo"selected";?>>15</option>

		  <option value="16" <?php if(substr($fecha_nac,8,2)=="16")echo"selected";?>>16</option>

		  <option value="17" <?php if(substr($fecha_nac,8,2)=="17")echo"selected";?>>17</option>

		  <option value="18" <?php if(substr($fecha_nac,8,2)=="18")echo"selected";?>>18</option>

		  <option value="19" <?php if(substr($fecha_nac,8,2)=="19")echo"selected";?>>19</option>

		  <option value="20" <?php if(substr($fecha_nac,8,2)=="20")echo"selected";?>>20</option>

		  <option value="21" <?php if(substr($fecha_nac,8,2)=="21")echo"selected";?>>21</option>

		  <option value="22" <?php if(substr($fecha_nac,8,2)=="22")echo"selected";?>>22</option>

		  <option value="23" <?php if(substr($fecha_nac,8,2)=="23")echo"selected";?>>23</option>

		  <option value="24" <?php if(substr($fecha_nac,8,2)=="24")echo"selected";?>>24</option>

		  <option value="25" <?php if(substr($fecha_nac,8,2)=="25")echo"selected";?>>25</option>

		  <option value="26" <?php if(substr($fecha_nac,8,2)=="26")echo"selected";?>>26</option>

		  <option value="27" <?php if(substr($fecha_nac,8,2)=="27")echo"selected";?>>27</option>

		  <option value="28" <?php if(substr($fecha_nac,8,2)=="28")echo"selected";?>>28</option>

		  <option value="29" <?php if(substr($fecha_nac,8,2)=="29")echo"selected";?>>29</option>

		  <option value="30" <?php if(substr($fecha_nac,8,2)=="30")echo"selected";?>>30</option>

		  <option value="31" <?php if(substr($fecha_nac,8,2)=="31")echo"selected";?>>31</option>

		</select>

		<select name="mes" class="smallTxt" style="width:180px" id="mes">

		  <option value="01" <?php if(substr($fecha_nac,5,2)=="01")echo"selected";?>>Enero</option>

		  <option value="02" <?php if(substr($fecha_nac,5,2)=="02")echo"selected";?>>Febrero</option>

		  <option value="03" <?php if(substr($fecha_nac,5,2)=="03")echo"selected";?>>marzo</option>

		  <option value="04" <?php if(substr($fecha_nac,5,2)=="04")echo"selected";?>>Abril</option>

		  <option value="05" <?php if(substr($fecha_nac,5,2)=="05")echo"selected";?>>Mayo</option>

		  <option value="06" <?php if(substr($fecha_nac,5,2)=="06")echo"selected";?>>Junio</option>

		  <option value="07" <?php if(substr($fecha_nac,5,2)=="07")echo"selected";?>>Julio</option>

		  <option value="08" <?php if(substr($fecha_nac,5,2)=="08")echo"selected";?>>Agosto</option>

		  <option value="09" <?php if(substr($fecha_nac,5,2)=="09")echo"selected";?>>Septiembre</option>

		  <option value="10" <?php if(substr($fecha_nac,5,2)=="10")echo"selected";?>>Octubre</option>

		  <option value="11" <?php if(substr($fecha_nac,5,2)=="11")echo"selected";?>>Noviembre</option>

		  <option value="12" <?php if(substr($fecha_nac,5,2)=="12")echo"selected";?>>Diciembre</option>

		</select>

		<select name="anio" class="smallTxt" style="width:90px" id="select3">

		  <?php

		  for($i=date('Y'); $i>1930; $i--){ ?>

		  <option value="<?php echo"$i";?>" <?php if(substr($fecha_nac,0,4)==$i) echo "selected";?> ><?php echo"$i";?></option>

		  <?php }?>

		</select>

	  </span></div></td>

	</tr>

	<tr>

	  <td><div align="right"><span class="contenidoNegritasCH">RFC &nbsp;</span></div></td>

	  <td><div align="left"><span class="style5"><input style="width:327px" value="<?php echo"$rfc";?>" name="rfc" type="text" class="smallTxt" id="rfc" maxlength="15"></span></div></td>

	</tr>

	<tr>

	  <td><div align="right"><span class="contenidoNegritasCH">Género* &nbsp;</span></div></td>

	  <td height="40"><div align="left"><span class="style5"><span class="smallTxt"><input type="radio" name="genero" id="genero" value="0"<?php if($genero==0) echo "checked"; ?> >Hombre</span>

		<span class="smallTxt"><input type="radio" name="genero" <?php if($genero==1) echo "checked"; ?> id="genero" value="1">Mujer</span></span></div></td>

	</tr>

	<tr>

	  <td><div align="right"><span class="contenidoNegritasCH">Banco &nbsp;</span></div></td>

	  <td><div align="left">

		<input name="banco" style="width:327px" value="<?php echo"$banco";?>" type="text" class="smallTxt" id="banco" maxlength="30">

	  </div></td>

	</tr>

	<tr>

	  <td><div align="right"><span class="contenidoNegritasCH"># de Cuenta &nbsp;</span></div></td>

	  <td><div align="left">

		<input style="width:327px" value="<?php echo"$cuenta";?>" name="cuenta" type="text" class="smallTxt" id="cuenta" maxlength="20">

	  </div></td>

	</tr>

	<tr>

	  <td><div align="right"><span class="contenidoNegritasCH">Rango &nbsp;</span></div></td>

	  <td><div align="left"><span class="style5">

		<select name="rango" class="smallTxt" style="width:330px" id="rango">

		  <option value="0" <?php if($rango==0) echo "selected";?> >RECLUTADOR</option>

		  <?php

		  $query="SELECT id,nombre FROM n_rangos WHERE genero=$genero";

		  $res=mysql_query($query)or die("Error al consultar rangos: ".mysql_error());

		  for($i=0; $i<mysql_num_rows($res); $i++){ 

		  	$row=mysql_fetch_row($res);

		  	?>

		  	<option value="<?php echo"$row[0]";?>" <?php if($rango==$row[0]){ echo "selected";}?> ><?php echo"$row[1]";?></option>

		  <?php }?>

		</select>

	  </span></div></td>

	</tr>

	<tr>

	  <td colspan="2">

		<img src="assets/imgs/spacer (1).gif" width="1" height="10" /></td><td></td>

	</tr>

	<tr><td align="left">

		<a href="menu.php?ver=<?php echo"$id";?>"><input type="button" value="Ver como" style="margin-left:50px" class="saveBttn"/></a>

	</td>

	<td align="right">

		<input type="submit" name="guardar" value="Guardar" style="margin-left:90px" class="saveBttn"/>

	</td></tr>

</table></form>

</html>