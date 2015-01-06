<?php

session_start();

$usuario=$_GET['id'];

$id_quincena=$_SESSION['id_quincena'];

if($usuario==""){

	header("Refresh: 5; URL=http://www.dandy.mx/");

	echo "No ha iniciado sesión, será redireccionado en 5 segundos";

}else{

	include "coneccion.php";



	$query="SELECT nombre,estatus,rango_actual,id,app,upline FROM n_miembros where id=$usuario";

	$ejecuta=mysql_query($query)or die("Error en consulta 1: ".mysql_error());

	$info_usu=mysql_fetch_row($ejecuta);

	$nombre="$info_usu[0] $info_usu[4]";

	$estatus=$info_usu[1];

	$rango=$info_usu[2];

	$id=$info_usu[3];

	$upline=$info_usu[5];

	$query="SELECT nombre FROM n_rangos WHERE id=$rango";

	$ejecuta=mysql_query($query)or die("Error en consulta 2: ".mysql_error());

	if(mysql_num_rows($ejecuta)>0){

		$info_r=mysql_fetch_row($ejecuta);

		$rango=$info_r[0];

	}else

		$rango="RECLUTADOR";

	if($upline!=1){

		$query="SELECT id FROM n_pagos WHERE miembro=$id and autorizacion=1 and quincena=$id_quincena";

		$ejecuta3=mysql_query($query)or die("Error en consulta 2 $miembro: ".mysql_error());

		if(mysql_num_rows($ejecuta3)>0)

			$ima="act.png";

		else

			$ima="inact.png";

	}

	else

		$ima="act.png";

	if($estatus!=1)

		$ima="desh.png";

	function rama_abajo($miembro){

		$usuario=$_SESSION['usuario'];

		$id_quincena=$_SESSION['id_quincena'];

		$query="SELECT nombre,estatus,rango_actual,id,app,upline FROM n_miembros where arriba=$miembro and id not like 1";

		$ejecuta=mysql_query($query)or die("Error en consulta 1 $miembro: ".mysql_error());

		if(mysql_num_rows($ejecuta)>0){

			echo"<ul>";

			for($i=0;$i<mysql_num_rows($ejecuta);$i++){

				$info_usu=mysql_fetch_row($ejecuta);

				$nombre="$info_usu[0] $info_usu[4]";

				$estatus=$info_usu[1];

				$rango=$info_usu[2];

				$id=$info_usu[3];

				$upline=$info_usu[5];

				if($upline==$usuario)

					$color="#c7551f";

				$query="SELECT nombre FROM n_rangos WHERE id=$rango";

				$ejecuta2=mysql_query($query)or die("Error en consulta 2 $miembro: ".mysql_error());

				if(mysql_num_rows($ejecuta2)>0){

					$info_r=mysql_fetch_row($ejecuta2);

					$rango=$info_r[0];

				}else

					$rango="RECLUTADOR";

				if($upline!=1){

					if($estatus!=1)

						$imagen="desh.png";

					else{

						$query="SELECT id FROM n_pagos WHERE miembro=$id and autorizacion=1 and quincena=$id_quincena";

						$ejecuta3=mysql_query($query)or die("Error en consulta 2 $miembro: ".mysql_error());

						if(mysql_num_rows($ejecuta3)>0)

							$imagen="act.png";

						else

							$imagen="inact.png";

					}

				}

				else

					$imagen="act.png";

				echo"<li class=\"collapsed\"><span style=\"color:$color;\"><img src=\"images/$imagen\" /><br>$nombre<br><p>$rango</p></span> "; echo rama_abajo($id); echo"</li>";

			}

			echo"</ul>";

		}

	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="assets/css/jquery.jOrgChart.css"/>

<link rel="stylesheet" href="assets/css/custom.css"/>

<script>

if(navigator.userAgent.indexOf("MSIE")>0)

{

document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/admonStylesE.css" /> ');

document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/lugarStylesE.css" /> ');

}

else

{

document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/admonStyles.css" /> ');

document.write(' <link rel="stylesheet" href="http://www.dandy.mx/assets/css/lugarStyles.css" /> ');



}

</script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script type="text/javascript" src="jquery.jOrgChart.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>

<script>

jQuery(document).ready(function() {

    $("#org").jOrgChart();

});

</script>

<script type="text/javascript" src="prettify.js"></script>

<title>Árbol de Red</title>

<style type="text/css">

<!--



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



</head>

<body onLoad="prettyPrint();" style="background-image:url(images/fondo_lista.jpg) background-position:center;">

<ul id="org" style="display:none">

	<li><span style="color:#c7551f;"><? echo "<img src='images/$ima' /><br>$nombre<br><p>$rango</p>";?></span>

		<?php echo rama_abajo($usuario);?>

	</li>

</ul>

<table align="center" width="100%">

	<tr>

		<td height="60px" class="subTitle2"><div align="center"><span class="subTitle2" style="font-size:36px">ARBOL DE RED</span></div></td>

	</tr>

</table>

<div id="chart" align="center" class="orgChart"></div>

<script>

	jQuery(document).ready(function() {

		

		/* Custom jQuery for the example */

		$("#show-list").click(function(e){

			e.preventDefault();

			

			$('#list-html').toggle('fast', function(){

				if($(this).is(':visible')){

					$('#show-list').text('Hide underlying list.');

					$(".topbar").fadeTo('fast',0.9);

				}else{

					$('#show-list').text('Show underlying list.');

					$(".topbar").fadeTo('fast',1);                  

				}

			});

		});

		

		$('#list-html').text($('#org').html());

		

		$("#org").bind("DOMSubtreeModified", function() {

			$('#list-html').text('');

			

			$('#list-html').text($('#org').html());

			

			prettyPrint();                

		});

	});

</script>

</body>

</html>

<?php }?>