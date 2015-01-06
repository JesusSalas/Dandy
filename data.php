<?php
session_start();
$usuario=$_GET['id'];
$id_quincena=$_SESSION['id_quincena'];
if($usuario==""){
	header("Refresh: 5; URL=http://www.dandy.mx/");
	echo "No ha iniciado sesión, será redireccionado en 5 segundos";
}else{
	include "coneccion.php";
	include "miembros.php";
	
	$mes=date('m');
	$cur_dia=date('d');
	$mes_b=$mes+1;
	if(15>=$cur_dia){
		$fecha_inicio=date('Y')."-$mes-1";
		$fecha_final=date('Y')."-$mes-15";
	}else{
		$fecha_inicio=date('Y')."-$mes-15";
		$fecha_final=date('Y')."-$mes_b-1";
	}

	$query="SELECT id,nombre FROM n_miembros WHERE arriba=$usuario and id not like 1";
	$result = mysql_query($query)or die("Error al consultar primer rama: ".mysql_error());;
	for($i=0;$i<mysql_num_rows($result);$i++){
		$row = mysql_fetch_row($result);
		$pob_act=busca_poblacion_act($row[0],$fecha_inicio,$fecha_final,$id_quincena);
		$pob_total=busca_poblacion($row[0]);
		echo $row[1] ." (". $pob_total .")/". $pob_act ."/";
	}
}
?> 