<?php

session_start();

$usuario=$_SESSION['usuario'];

if(isset($_GET['ver']))

	$usuario=$_GET['ver'];

$periodo_pago=$_SESSION['periodo_pago'];

include "coneccion.php";

include "miembros.php";

if($usuario=="")

	include"checar_sesion_usuario.php";

if(isset($_GET['id_a']))

	$id_a=$_GET['id_a'];

else

	$id_a=$usuario;

//info usuario arbol

$query="SELECT nombre,puntos,id,arriba,upline FROM n_miembros WHERE id=$id_a";

$exec=mysql_query($query)or die("Error al consultar datos del usuario de arbol: ".mysql_error());

$usu_a=mysql_fetch_row($exec);



//info del usuario

$query= "SELECT id,tarjeta,codigo,nombre,app,apm,direccion,cp,estado,ciudad,tel_fijo,tel_oficina,tel_cel,email,rfc,fecha_nac,puntos,cuenta_banco,banco,fecha_alta,rango_actual,genero,arriba,fecha_alta,upline 

	FROM n_miembros where id = $usuario";

$ejecuta=mysql_query($query)or die("Error en consulta 1: ".mysql_error());



if(@mysql_num_rows($ejecuta)>=1){

	$usu_info=mysql_fetch_row($ejecuta);

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

	$id_rango=$usu_info[20];

	$genero=$usu_info[21];

	$alta=$usu_info[23];

	$upline=$usu_info[24];

	if($id_rango==0){

		$rango="RECLUTADOR";

		$min_activos=0;

		$max_diadas=4000;

		$max_puntos=500000;

	}else{

		$query="SELECT nombre, activos,diadas_acum,pts_acum FROM n_rangos WHERE id=$id_rango and genero=$genero";

		$ejecutar=mysql_query($ejecuta)or die("Error en consulta 0001: ".mysql_error());

		$rango_info=mysql_fetch_row($ejecutar);

		$rango=$rango_info[0];

		$min_activos=$rango_info[1];

		$max_diadas=$rango_info[2];

		$max_puntos=$rango_info[3];

	}

}

$quincena_actual=$_SESSION['quincena'];

$id_quincena=$_SESSION['id_quincena'];



//arbol de red

$query="SELECT id,nombre,puntos,arriba,upline FROM n_miembros where arriba=$id_a and id not like 1";

$ejecuta2=mysql_query($query)or die("Error en consulta 2: ".mysql_error());



$meses=array('ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE');

$mes=date('m');

$cur_mes=(int)$mes-1;

$cur_dia=date('d');

$dia_q=15;

$mes_b=$mes+1;

$mes_c=$mes-1;

if($dia_q>=$cur_dia){

	$fecha_inicio=date('Y')."-$mes-1";

	$fecha_final=date('Y')."-$mes-15";

}else{

	$fecha_inicio=date('Y')."-$mes-15";

	$fecha_final=date('Y')."-$mes_b-1";

}





//periodo,corte

$in=$id_quincena+1;

$fin=$in+1;

$query="SELECT nombre FROM n_quincenas WHERE id BETWEEN $in AND $fin";

$exe=mysql_query($query)or die("Error en consulta de quincenas".mysql_error());

$quincena1=mysql_fetch_row($exe);

$quincena2=mysql_fetch_row($exe);



//inscritos en el periodo

function invitados($id_quincena,$usuario,$fecha_inicio,$fecha_final){

	$query="SELECT p.miembro FROM n_pagos AS p INNER JOIN n_miembros AS m ON p.miembro=m.id WHERE p.autorizacion=1 AND p.quincena=$id_quincena AND p.anio='".date('Y')."' AND

		p.upline=$usuario AND m.fecha_alta BETWEEN '$fecha_inicio' AND '$fecha_final'";

	$ejecuta3=mysql_query($query)or die("Error en consulta 3: ".mysql_error());

	return mysql_num_rows($ejecuta3);

}

$invitados=0;

if($usuario==1){

	$query="SELECT id FROM n_miembros WHERE id not like 1";

	$ejecuta=mysql_query($query)or die("Error al consultar directos: ".mysql_error());

	$count=0;

	while(mysql_num_rows($ejecuta)>$count++){

		$row=mysql_fetch_row($ejecuta);

		$invitados+=invitados($id_quincena,$row[0],$fecha_inicio,$fecha_final);

	}

}else

	$invitados=invitados($id_quincena,$usuario,$fecha_inicio,$fecha_final);



//pares

if(validaPares($usuario,$usuario,$id_quincena)>1){

	if($usuario==1){

		$query="SELECT id FROM n_miembros WHERE id not like 1";

		$ejecuta=mysql_query($query)or die("Error al consultar directos: ".mysql_error());

		$count=0;

		while(mysql_num_rows($ejecuta)>$count++){

			$row=mysql_fetch_row($ejecuta);

			$p=busca_pares($row[0],$fecha_inicio,date('Y-m-d'),$id_quincena);

			$ri+=floor($p/2);

		}

	}else{

		$ri+=busca_pares($usuario,$fecha_inicio,date('Y-m-d'),$id_quincena);

	}

}



//periodo de pago

$f_alta=explode('-',$alta);

if($f_alta[2]<15)

	$periodo_pago=1;

else

	$periodo_pago=0;

$_SESSION['periodo_pago']=$periodo_pago;



//si ha pagado

$pagar=1;

if($usu_info[22]!=1){

	if($f_alta[2]>15){

		$fin=date('Y')."-".$mes."-".$f_alta[2];

		$inicio=date('Y')."-$mes_b-".$f_alta[2];

	}else{

		$fin=date('Y')."-$mes_b-".$f_alta[2];

		$inicio=date('Y')."-$mes-".$f_alta[2];

	}

	$query="SELECT id FROM n_pagos WHERE autorizacion=1 and miembro=$usuario and (quincena BETWEEN ($id_quincena-1) and $id_quincena) and fecha_conf_pago not like '0000-00-00'";

	$ejecuta4=mysql_query($query)or die("Error en consulta 4: ".mysql_error());

	if(mysql_num_rows($ejecuta4)>0)

		$pagar=0;

}else

	$pagar=0;



//pts acumulados del periodo

$query="SELECT miembro FROM n_pagos WHERE upline=$usuario and quincena=$id_quincena and anio='".date('Y')."' and autorizacion=1";

$ejecuta=mysql_query($query)or die("Error al consultar directos: ".mysql_error());

$acumulados=(mysql_num_rows($ejecuta)*100);

$contados=mysql_fetch_array($ejecuta);



$query="SELECT miembro FROM n_pagos WHERE arriba=$usuario and upline not like $usuario and quincena=$id_quincena and anio='".date('Y')."' and autorizacion=1";

$ejecuta=mysql_query($query)or die("Error al consultar indirectos: ".mysql_error());

$acumulados+=(mysql_num_rows($ejecuta)*50);

array_push($contados,mysql_fetch_array($ejecuta));



$query="SELECT id from n_miembros WHERE arriba=$usuario and id not like 1";

$ejecuta=mysql_query($query)or die("Error al consultar primera rama: ".mysql_error());

for($i=0;$i<mysql_num_rows($ejecuta);$i++){

	$row=mysql_fetch_row($ejecuta);

	if(in_array($row[0],$contados,false))

		$acumulados+=puntos($usuario,$row[0],$id_quincena,$contados);

}



function puntos($usuario,$miembro,$id_quincena,$array){

	$query="SELECT miembro,upline,arriba from n_pagos WHERE arriba=$miembro AND quincena=$id_quincena AND anio='".date('Y')."'";

	$ejecutar=mysql_query($query)or die("Error al consultar 1: ".mysql_error());

	for($j=0;$j<mysql_num_rows($ejecutar);$j++){

		$r=mysql_fetch_row($ejecutar);

		if($r[1]==$usuario)

			$cuenta+=100;

		else

			$cuenta+=50;

		array_push($r[0],$array);

		$query="SELECT id FROM n_miembros WHERE arriba=$r[0]";

		$eje=mysql_query($query)or die("Error al consultar primera rama de $r[0]: ".mysql_error());

		for($k=0; $k<mysql_num_rows($eje); $k++){

			$r=mysql_fetch_row($eje);

			$cuenta+=puntos($usuario,$r[0],$id_quincena,$array);

		}

	}

	return $cuenta;

}



$query="SELECT r.pts_acum FROM n_miembros AS m INNER JOIN n_rangos AS r ON m.genero = r.genero WHERE m.id=$usuario";

$ejecuta=mysql_query($query)or die("Error al consultar pts del rango: ".mysql_error());

if(mysql_num_rows($ejecuta)>0){

	$pt=mysql_fetch_row($ejecuta);

	$max_pts=$pt[0];

}

else

	$max_pts=500000;

if($acumulados>$max_pts)

	$acumulados=$max_pts;

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>

<style type="text/css">

<!--

body {

	background-color: #000000;

}

.style1 {

	font-family: Geneva, Arial, Helvetica, sans-serif;

	color: #FFFFFF;

	font-size: 14px;

}

.style3 {font-family: Geneva, Arial, Helvetica, sans-serif; color: #f63d12; font-size: 14px; }

a.nounderline:link   

{   

 text-decoration:none;   

}

-->

</style>

<script type="text/javascript">

<!--

function MM_preloadImages() { //v3.0

  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();

    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)

    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}

}

function MM_swapImgRestore() { //v3.0

  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;

}

function MM_findObj(n, d) { //v4.01

  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {

    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}

  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];

  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);

  if(!x && d.getElementById) x=d.getElementById(n); return x;

}



function MM_swapImage() { //v3.0

  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)

   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}

}

//-->

</script>



<link rel="stylesheet" href="../assets/color3/colorbox.css" />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

		<script src="assets/color3/jquery.colorbox.js"></script>

		<script>

			$(document).ready(function(){

				//Examples of how to assign the ColorBox event to elements

				

				$(".iframe").colorbox({iframe:true, width:"530", height:"340" });

				$(".iframe2").colorbox({iframe:true, width:"823", height:"658" });

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

<script src="highcharts.js"></script>

<script src="themes/gray.js"></script>

<script src="http://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript">

	$(function(){

		var activa=[];

		var miembros=[];

		var switch1=true;

		$.get('data.php?id=<?php echo"$usuario"?>', function(data){

			data=data.split('/');

			for(var i in data){

				if(switch1==true){

					miembros.push(data[i]);

					switch1=false;

				}else{

					activa.push(parseInt(data[i]));

					switch1=true;

				}

			}

			miembros.pop();

			$('#chart').highcharts({

				chart: {

					type: 'column',

					animation: true,

					width: 270,

					height: 225,

					backgroundColor: ''

				},

				title: {

					text:''

				},

				xAxis: {

					title: {

						text: 'Miembros (Población Total)'

					},

					categories: miembros

				},

				yAxis: {

					title:{

						text: ''

					},

					labels: {

						formatter : function() {

							return this.value

						}

					}

				},

				tooltip: {

					crosshairs: false,

					shared: true,

					valueSuffix: ''

				},

				plotOptions: {

					spline: {

						marker: {

							radius:2,

							lineColor: '#666666',

							lineWidth: 1

						}

					},

					column: {

						color: '#f63d12'

					}

				},

				series: [{

					name: 'Activos',

					data: activa

				}]

			});

		});

	});

</script>

</head>



<body onload="MM_preloadImages('../images/b_atras_r.png','../images/b_lista_r.png','../images/1_15_r.png','../images/b_pagar_r.png')">

<table width="815" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td valign="top"><table width="810" border="0" cellspacing="0" cellpadding="0">

		  <!--<tr>

		  	<td colspan="3" width="534" class="subTitle2"><div class="subTitle2" align="right"><a href="cambia_pass.php" class="subTitle2 iframe">Cambio de Password </a></div></td>

		  </tr>-->

          <tr>

            <td colspan="3"><img src="images/tit_oficina.jpg" alt="Salir" width="810" height="57" border="0" usemap="#Map" href="cambia_pass.php" /></td>

          </tr>

          <tr>

            <td><img src="images/tit_datos.jpg" width="271" height="37" /></td>

            <td><img src="images/tit_red.jpg" width="270" height="37" /></td>

            <td><img src="images/tit_rango.jpg" width="269" height="37" /></td>

          </tr>

          <tr>

            <td height="225" valign="top" background="../images/contenido_bkg.jpg"><table width="245" border="0" align="center" cellpadding="0" cellspacing="2">

              <tr>

                <td><img src="images/spacer.gif" width="10" height="13" /></td>

              </tr>

              <tr>

                <td><div align="center" class="style1"><?php echo "$nombre";?> </div></td>

              </tr>

              <tr>

                <td><div align="center"><span class="style3"><?php if($usuario!=1) echo "$tarjeta"; else echo"&nbsp;";?> </span></div></td>

              </tr>

              <tr>

                <td><div align="center"><img src="images/spacer.gif" width="10" height="10" /></div></td>

              </tr>

              <tr>

                <td><div align="center"><span class="style1">Población total </span></div></td>

              </tr>

              <tr>

                <td><div align="center"><span class="style3"><?php $pob_total=busca_poblacion($usuario); echo number_format($pob_total,0,'.',',');?></span></div></td>

              </tr>

              <tr>

                <td><div align="center"><img src="images/spacer.gif" width="10" height="10" /></div></td>

              </tr>

              <tr>

                <td><div align="center"><span class="style1">Población activa </span></div></td>

              </tr>

              <tr>

                <td><div align="center"><span class="style3"><?php $pob_act=busca_poblacion_act($usuario,$fecha_inicio,$fecha_final,$id_quincena); if($usuario==1) $pob_act+=4; echo number_format($pob_act,0,'.',',');?></span></div></td>

              </tr>

              <tr>

                <td><div align="center"><img src="images/spacer.gif" width="10" height="10" /></div></td>

              </tr>

			  <?php if($usuario!=1){?>

              <tr>

                <td><div align="center"><span class="style1">Ruler Rewards</span></div></td>

              </tr>

              <tr>

                <td><div align="center"><span class="style3"><?php echo number_format($puntos,0,'.',',');?> PT </span></div></td>

              </tr>

			  <?php }?>

            </table></td>

            <td height="225" valign="top" background="../images/contenido_bkg_2.jpg"><table width="245" border="0" align="center" cellpadding="0" cellspacing="0">

              <tr>

                <td colspan="3"><img src="images/spacer.gif" width="10" height="13" /></td>

                </tr>

              <tr>

                <td width="70"><table width="95" border="0" cellspacing="2" cellpadding="0">

                  <?php

				  $style="style3";

				  if($usu_a[2]!=$usuario && $usu_a[4]!=$usuario)

					$style="style1";

				  ?>

				  <tr>

                    <td><div align="center"><span class="<?php echo"$style";?>"><?php echo "$usu_a[0]";?></span></div></td>

                  </tr>

				  <?php if($usu_a[2]!=1){?>

                  <tr>

                    <td class="<?php echo"$style";?>"><div align="center"><?php if($id_a==$usuario){ echo number_format($acumulados,0,'.',',');?> pt<br />(acumulados de período)<?php }?></div></td>

                  </tr>

				  <?php }?>

                </table></td>

                <td width="50"><img src="images/lineas_puntos.png" width="62" height="154" /></td>

                <td valign="top"><table width="90" border="0" cellspacing="2" cellpadding="0">

				  <?php

				  if(mysql_num_rows($ejecuta2)>0){

					  $count=0;

					  while(mysql_num_rows($ejecuta2)>$count++){

					  	$row=mysql_fetch_row($ejecuta2);

						$style="style3";

						if($row[4]!=$usuario)

							$style="style1";

				  ?>

                  <tr>

                    <td><div align="center"><span class="style3"><a class="<?php echo"$style";?> nounderline" href="?id_a=<?php echo"$row[0]&ver=$usuario";?>"><?php echo "$row[1]";?></a></span></div></td>

                  </tr>

                  <tr>

                    <td class="style3"><div align="center"><a class="<?php echo"$style";?> nounderline" href="?id_a=<?php echo"$row[0]&ver=$usuario";?>">

						<?php if($usuario!=1){ if($row[4]==$usuario){echo"100";}else{echo"50";}?> pt<?php }else echo"&nbsp;";?></a></div></td>

                  </tr>

				  <tr>

                    <td><div align="center"><img src="images/spacer.gif" width="10" height="4" /></div></td>

                  </tr>

				  <?php  }

				  }

				  ?>

                </table></td>

              </tr>

              

              <tr>

                <td colspan="3"><img src="images/spacer.gif" width="10" height="5" /></td>

                </tr>

              <tr>

                <td colspan="3"><table width="0" border="0" align="center" cellpadding="0" cellspacing="2">

                  <tr>

                    <td><?php if($usu_a[2]!=$usuario){?><a href="<?php echo"?ver=$usuario&id_a=$usu_a[3]";?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image22','','../images/b_atras_r.png',1)"><img title="Ir Atrás" alt="Ir atrás" src="images/b_atras.png" name="Image22" width="20" height="24" border="0" id="Image22" /></a><?php }?></td>

                    <td><img src="images/spacer.gif" width="130" height="13" /></td>

                    <td><a href="arbol.php?id=<?php echo"$usuario";?>" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image23','','images/b_lista_r.png',1)"><img title="Ver Árbol Completo" alt="Ver Árbol Completo" src="images/b_lista.png" name="Image23" width="20" height="24" border="0" id="Image23" /></a></td>

                  </tr>

                </table></td>

              </tr>

            </table></td>

            <td height="225" valign="top" background="../images/contenido_bkg_3.jpg"><table width="245" border="0" align="center" cellpadding="0" cellspacing="2">

              <tr>

                <td><img src="images/spacer.gif" width="10" height="13" /></td>

              </tr>

              <tr>

                <td height="127"><div align="center" class="style3"><?php if($usuario!=1) echo str_replace("_"," ",$rango);//if($rango!=""){?><!--<img src="images/rango_marques.png" width="105" height="127" />--><?php //}?></div></td>

              </tr>

              

              <tr>

                <td><div align="center"><img src="images/spacer.gif" width="10" height="15" /></div></td>

              </tr>



              <tr>

                <td><div align="center" class="style1">Población activa<br />

                </div></td>

              </tr>

              <tr>

                <td><div align="center"><span class="style3"><?php echo number_format($pob_act,0,'.',',');?></span><img src="images/spacer.gif" width="10" height="10" /></div></td>

              </tr>



              

            </table></td>

          </tr>

          <tr>

            <td><img src="images/marco_poblacion.jpg" width="271" height="38" /></td>

            <td><img src="images/marco_periodo.jpg" width="270" height="38" /></td>

            <td><img src="images/marco_saldos.jpg" width="269" height="38" /></td>

          </tr>

          <tr>

            <td height="225" valign="middle" background="../images/contenido_bkg.jpg">

				<div align="center" id="chart" style="margin:0 auto"></div>

			</td>

            <td height="225" valign="top" background="../images/contenido_bkg_2.jpg"><table width="245" border="0" align="center" cellpadding="0" cellspacing="2">

              <tr>

                <td><img src="images/spacer.gif" width="10" height="13" /></td>

              </tr>

              <tr>

                <td><div align="center" class="style1"><?php echo "$meses[$cur_mes]";?></div></td>

              </tr>

              <tr>

                <td><div align="center"><img src="images/spacer.gif" width="10" height="10" /></div></td>

              </tr>

              

              <tr>

                <td><div align="center"><?php if($cur_dia>=1 && $cur_dia<=15){?>

				  <img src="images/1_15.png" name="Image34" width="233" height="37" border="0" id="Image34" />

				  <?php }else{?>

				  <img src="images/1_15_r.png" name="Image34" width="233" height="37" border="0" id="Image34" />

				  <?php }?>

				</div></td>

              </tr>

              <tr>

                <td><div align="center"><img src="images/spacer.gif" width="10" height="10" /></div></td>

              </tr>

              

              <tr>

                <td><div align="center" class="style1">Periodo actual: <?php if($cur_dia>=1 && $cur_dia<=15) echo"1 - 15"; else echo "15 - 1"; ?><br />

                </div></td>

              </tr>

			  <?php if($usuario!=1){?>

              <tr>

                <td><div align="center"><?php if($upline!=1){?><span class="style1"><?php if($pagar==1) if($f_alta[2]<15) echo"Periodo de pago: Tienes hasta el 15 de ".$meses[$mes-1]." para realizar el pago de la mensualidad"; else echo "Periodo de pago: Tienes hasta el 1 de ".$meses[$mes]." para realizar tu pago de la mensualidad"; else echo"Ya realizaste tu pago del mes";?></span></div></td>

              </tr>

              <tr>

                <td><div align="center"><img src="images/spacer.gif" width="10" height="20" /></div>                  <div align="center"></div></td>

              </tr>

              <tr>

                <td><div align="center"><?php if($pagar==1){?>

				  <a href="registra_pago.php?id=<?php echo"$usuario";?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image35','','images/b_pagar_r.png',1)">

				  <img src="images/b_pagar.png" name="Image35" width="127" height="22" border="0" id="Image35" /></a>

				  <?php }else{?>

				  <img onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image35','','images/b_pagar_r.png',1)" src="images/b_pagar.png" name="Image35" width="127" height="22" border="0" id="Image35" />

				  <?php }}else{ echo"&nbsp;";}?>

				</div></td>

              </tr>

              <?php }?>

            </table></td>

            <td height="225" valign="top" background="../images/contenido_bkg_3.jpg"><table width="245" border="0" align="center" cellpadding="" cellspacing="2">

              <tr>

                <td height="25" colspan="3"><img src="images/spacer.gif" width="10" height="13" /></td>

              </tr>

			  <tr><td colspan="3"><table width="100%" border="1" align="center" cellpadding="" cellspacing="">

				  <tr>

					<td>&nbsp;</td>

					<td><div align="center" class="style1"><span class="style3">Inscripciones: </span></div></td>

					<td><div align="center"><span class="style3">Pares: </span></div></td>

				  </tr>

				  <tr>

					<td><div align="center" class="style1"><span class="style3">#</span></div></td>

					<td><div align="center" class="style1"><?php echo "$invitados";?></div></td>

					<td><div align="center"><span class="style1"><?php echo number_format(floor($ri/2),0,'.',',');?></span></div></td>

				  </tr>

				  <tr>

					<td><div align="center" class="style1"><span class="style3">Monto</span></div></td>

					<td><div align="center"><span class="style1"> $<?php $ci=150*$invitados; $i=number_format($ci,2,'.',','); echo $i;?></span></div></td>

					<td><div align="center"><span class="style1">$<?php $pago=floor($ri/2)*50; echo number_format($pago,2,'.',',');?></span></div></td>

				  </tr>

				  <tr>

				  	<td><div align="center"><span class="style3">Total: </span></div></td>

					<td colspan="2"><div align="center"><span class="style1">$<?php $total=$ci+$pago; $i=number_format($total,2,'.',','); echo $i;?></span></div></td>

				  </tr>

				  <tr>

				  	<td><div align="center"><span class="style3">A recibir: </span></div></td>

					<td colspan="2"><div align="center"><span class="style1"><?php  echo"$quincena2[0], ".date('Y');?></span></div></td>

				  </tr>

				  <tr>

				  	<td><div align="center"><span class="style3">Corte: </span></div></td>

					<td colspan="2"><div align="center"><span class="style1"><?php echo "$quincena1[0], ".date('Y');?></span></div></td>

				  </tr>

				 </table></td>

              <tr>

                <td colspan="3"><div align="center"><img src="images/spacer.gif" width="10" height="20" /></div>                  <div align="center"></div></td>

              </tr>

			  <?php if($usuario!=1){?>

              <tr>

                <td colspan="3"><div align="center" class="style1"><span class="style3"></span><a href="historial_cta.php?id=<?php echo"$usuario";?>" class="style1 nounderline iframe2">HISTORIAL DE CUENTA</a></div></td>

              </tr>

              <?php }?>

            </table></td>

          </tr>

          <tr>

            <td colspan="3" align="center"><?php if($usuario!=1){?><a href="recompensas.php?idU=<?php echo"$usuario";?>"><img src="images/banner_premios.jpg" width="100%" height="55" /></a>

				<?php }else{?><img src="images/banner_premios.jpg" width="100%" height="55" /><?php }?></td>

            </tr>

        </table></td>

      </tr>

    </table></td>

  </tr>

</table>



<map name="Map" id="Map">

  <?php if($usuario==$_SESSION['usuario']){?><area shape="rect" coords="590,10,669,48" class="iframe" href="cambia_pass.php" alt="Cambiar Password" /><?php }?>

<area shape="rect" coords="720,17,761,44" href="<?php if($usuario!=$_SESSION['usuario']){ echo"f_home.php";}else{ echo"logout.php";}?>" alt="Salir" />

</map>

</body>

</html>

