<?php

session_start();

include "coneccion.php";



$cuenta=0;



function genera_cierre($id_miembro,$id_quincena,$fecha_inicio,$fecha_final){

	function verificar_estatus($id_quincena,$fecha_final){

		$query="SELECT id FROM n_miembros where upline=1 and id not like 1";

		$ejecuta=mysql_query($query)or die("Error al consultar primera rama: ".mysql_error());

		$count=0;

		while(mysql_num_rows($ejecuta)>$count++){

			$row=mysql_fetch_row($ejecuta);

			$query="SELECT id FROM n_miembros WHERE upline=$row[0] and fecha_alta < '$fecha_final' and id not like 1";

			$ejecuta2=mysql_query($query)or die("Error al consultar segunda rama: ".mysql_error());

			for($i=0;$i<mysql_num_rows($ejecuta2);$i++){

				$miembro=mysql_fetch_row($ejecuta2);

				$query="SELECT fecha_alta,estatus from n_miembros WHERE id=$miembro[0]";

				$ejecuta3=mysql_query($query)or die("Error al consultar fecha_alta de $miembro[0]: ".mysql_query());

				$row3=mysql_fetch_row($ejecuta3);

				$f_alta=explode('-',$row3[0]);

				$mes=date('m');

				$mes_b=$mes-1;

				$mes_c=$mes_b-1;

				if($f_alta[2]>15){

					$fin=date('Y')."-".$mes."-1";

					$inicio=date('Y')."-".$mes_c."-".$f_alta[2];

				}else{

					$fin=date('Y')."-".$mes_b."-15";

					$inicio=date('Y')."-".$mes_b-1 ."-".$f_alta[2];

				}

				$id_q=$id_quincena-1;

				$anio=explode('-',$fecha_final);

				$query="SELECT miembro FROM n_pagos WHERE miembro=$miembro[0] and autorizacion=1 and quincena BETWEEN $id_q and $id_quincena and anio='".$anio[0]."'";

				$ejecuta4=mysql_query($query)or die("Error en consulta funcion 2: ".mysql_error());

				$pagaron=mysql_fetch_array($ejecuta4);

				if(in_array("$miembro[0]",$pagaron)==false){

					$estatus=3;

					$query="SELECT MAX(fecha_conf_pago), quincena from n_pagos WHERE miembro=$miembro[$i]";

					$ejecuta5=mysql_query($query)or die("Error al consultar [ultima fecha de pago de $miembro[$i]: ".mysql_error());

					$r=mysql_fetch_row($ejecuta5);

					if($id_quincena<5)

						$q=$id_quincena+24;

					if(abs($q - $r[1])>=4)

						$add=", puntos=0 ";

					if(abs(iq - $r[1])>=6)

						$estatus=0;

					$query="UPDATE n_miembros SET estatus=$estatus $add WHERE id=$miembro[$i]";

					$ejecutar=mysql_query($query)or die("Error al actualizar estatus de $miembro[$i]: ".mysql_error());

				}//end if verificar si va al corriente

			}//end for miembros debajo de la primera rama

		}//end while primer rama

		return true;

	}//end funcion



	function busca_poblacion_activa($id_miembro,$miembros,$fecha_final,$id_quincena){

		$query="SELECT m.id FROM n_miembros AS m INNER JOIN n_pagos AS p ON m.id=p.miembro WHERE p.quincena=$id_quincena and p.arriba=$id_miembro and estatus=1 and fecha_alta < '$fecha_final'";

		$ejecuta=mysql_query($query)or die("Error en consulta funcion 2: ".mysql_error());

		$c=0;

		while(mysql_num_rows($ejecuta)>$c++){

			$row=mysql_fetch_row($ejecuta);

			$id=$row[0];

			array_push($miembros,$id);

			//array_merge($miembros, busca_poblacion_activa($id,$fecha_inicio,$fecha_final,$id_quincena,$miembros));

			$miembros+=busca_poblacion_activa($id,$miembros,$fecha_final,$id_quincena);

		}

		return $miembros;

	}

	verificar_estatus($id_quincena,$fecha_final);

	

	$miembros=array();

	$query="SELECT id FROM n_miembros WHERE upline=1";

	$ejecuta=mysql_query($query)or die("Error al consultar primera rama: ".mysql_error());

	$count=0;

	while(mysql_num_rows($ejecuta)>$count++){

		$row=mysql_fetch_row($ejecuta);

		array_push($miembros,$row[0]);

		$query="SELECT id FROM n_miembros WHERE upline=$row[0]";

		$ejecuta2=mysql_query($query)or die("Error al consultar segunda rama: ".mysql_error());

		$miembros+=busca_poblacion_activa($row[0],$miembros,$fecha_final,$id_quincena);

	}

	$inscripciones=0;	//total inscripciones en el periodo

	

	$query="INSERT INTO n_cierres(fecha_cierre,quincena,anio) VALUES(CURDATE(),$id_quincena,'".date('Y')."')";

	$ejecuta=mysql_query($query)or die("Error al insertar nuevo cierre: ".mysql_error());

	$query="SELECT MAX(id) FROM n_cierres";

	$ejecuta=mysql_query($query)or die("Error al consultar cierre: ".mysql_error());

	$row=mysql_fetch_row($ejecuta);

	$id_cierre=$row[0];

	

	foreach($miembros as $elem){

		$query="SELECT id FROM n_detalle_cierre WHERE miembro=$elem AND cierre=$id_cierre";

		$ejecuta=mysql_query($query)or die("Error en primer consulta de $elem: ".mysql_error());

		if(mysql_num_rows($ejecuta)<1){

			$query="INSERT INTO n_detalle_cierre(cierre,miembro) VALUES($id_cierre,$elem)";

			$ejecuta=mysql_query($query)or die("Error al insertar detalle de cierre de $elem: ".mysql_error());

		}

		

		//cambios de rango

		$query="SELECT rango_actual FROM n_miembros WHERE id=$elem";

		$ejecuta=mysql_query($query)or die("Error en consulta rango de $elem: ".mysql_error());

		$row=mysql_fetch_row($ejecuta);

		$rango=$row[0];

		$activos=busca_poblacion_act($id_miembro,$fecha_inicio,$fecha_final,$id_quincena);

		if($activos<20){

			if($rango!=0){

				$query="UPDATE n_miembros SET rango_actual=0 WHERE id=$elem";

				$ejecuta=mysql_query($query)or die("Error en actualización de rango: ".mysql_error());

				if($rango==0)

					$rango=0;

			}

		}else{

			$query="SELECT MAX(r.id) FROM n_rangos AS r INNER JOIN n_miembros AS m ON r.genero=m.genero WHERE activos<=$activos and m.id=$elem";

			$ejecuta=mysql_query($query)or die("Error al consultar nuevo rango: ".mysql_error());

			$n_rango=mysql_fetch_row($ejecuta);

			if($n_rango[0]!=$rango){

				$rango=$n_rango[0];

				$query="UPDATE n_miembros SET rango_actual=$rango WHERE id=$elem";

				$ejecuta=mysql_query($query)or die("Error en actualización de rango: ".mysql_error());

				if($n_rango>$rango)

					$rango=1;

				else

					$rango=0;

			}

		}

		$query="UPDATE n_detalle_cierre SET rango=$rango WHERE miembro=$elem and cierre=$id_cierre";

		$ejecuta=mysql_query($query)or die("Error al insertar rango: ".mysql_error());

		

		//invitados

		$query="SELECT m.id FROM n_miembros AS m INNER JOIN n_pagos AS p ON m.id=p.miembro 

			WHERE p.autorizacion=1 and p.quincena=$id_quincena and m.estatus=1 and m.upline=$elem and m.fecha_alta BETWEEN '$fecha_inicio' and '$fecha_final'";

		$ejecuta=mysql_query($query)or die("Error en consulta inscripciones: ".mysql_error());

		if(mysql_num_rows($ejecuta)>0){

			$inscripciones+=mysql_num_rows($ejecuta);

			$query="UPDATE n_detalle_cierre SET inscripciones=".mysql_num_rows($ejecuta)." WHERE miembro=$elem and cierre=$id_cierre";

			$ejecuta2=mysql_query($query)or die("Error al insertar inscripciones: ".mysql_error());

		}

		//pago por invitados

		$comision_invitados=mysql_num_rows($ejecuta)*150;

		

		//pares

		$pares=validaPares($elem,$elem,$id_quincena);

		if($pares>1)

			$pares=busca_pares($elem,$fecha_inicio,$fecha_final,id_quincena);

		if($id_quincena==1)

			$id_quin=24;

		else

			$id_quin=$id_quincena-1;

		$query="SELECT cant from n_rezago_impar WHERE id_quincena=$id_quin and id_miembro=$elem";

		$ejecuta=mysql_query($query)or die("Error al consultar pares rezagados: ".mysql_error());

		if(mysql_num_rows($ejecuta)==1){

			$row=mysql_fetch_row($ejecuta);

			$pares+=$row[0];

		}

		$p=floor($pares/2);

		$query="SELECT r.diadas_acum FROM n_rangos AS r INNER JOIN n_miembros AS m ON m.rango_actual=r.id WHERE m.id=$elem";

		$ejecuta=mysql_query($query)or die("Error al consultar caracteristicas del rango axtual: ".mysql_error());

		if(mysql_num_rows($ejecuta)>0){

			$info_rango=mysql_fetch_array($ejecuta);

			$max_diadas=$info_rango[0];

		}else

			$max_diadas=4000;

		if($p>$max_diadas)

			$p=$max_diadas;

		if($pares>0){

			if(($pares%2)==1){

				$query="INSERT INTO n_rezago_impar(id_quincena,id_miembro,cant) VALUES($id_quincena,$elem,1)";

				$ejecuta=mysql_query($query)or die("Error al insertar par rezagado: ".mysql_error());

			}

			$query="UPDATE n_detalle_cierre SET pares=$p WHERE miembro=$elem and cierre=$id_cierre";

			$ejecuta=mysql_query($query)or die("Error al insertar pares: ".mysql_error());

		}

		

		//pago por pares

		$comision_pares=$p*50;

		//total a pagar

		$total_generado=$comision_invitados+$comision_pares;

		$total+=$total_generado;

		

		//deposito de puntos directos e indirectos

		$query="SELECT upline,arriba FROM n_miembros where id=$elem";

		$ejecuta=mysql_query($query)or die("Error al consultar upline y arriba de $elem: ".mysql_error());

		$row=mysql_fetch_row($ejecuta);

		$upline=$row[0];

		$arriba=$row[1];

		dep_puntos_directos($upline,$id_cierre);

		dep_puntos_ind($upline,$arriba,$id_cierre);

		

		$query="UPDATE n_detalle_cierre SET saldo_generado=$total_generado WHERE miembro=$elem and cierre=$id_cierre";

		$ejecuta=mysql_query($query)or die("Error al insertar saldo generado: ".mysql_error());

	}

	$query="UPDATE n_cierres SET nuevas_inscripciones=$inscripciones,total_generado=$total WHERE id=$id_cierre";

	$ejecuta=mysql_query($query)or die("Error al actualizar inscripciones: ".mysql_error());



	$query="SELECT miembro,puntos_acumulados FROM n_detalle_cierre WHERE cierre=$id_cierre";

	$ejecuta=mysql_query($query)or die("Error al consultar miembros y puntos: ".mysql_error());

	for($i=0;$i<mysql_num_rows($ejecuta);$i++){

		$row=mysql_fetch_row($ejecuta);

		$query="SELECT puntos FROM n_miembros WHERE id=$row[0]";

		$ejecuta2=mysql_query($query)or die("Error al consultar puntos de $row[0]: ".mysql_error());

		$info=mysql_fetch_row($ejecuta2);

		$pts=$info[0] + $row[1];

		$query="UPDATE n_miembros SET puntos=$pts WHERE id=$row[0]";

		$ejecuta3=mysql_query($query)or die("Error al actualizar puntos de $row[0]: ".mysql_error());

	}

	return true;

}



function getUltimoDiaMes($elAnio,$elMes) {

  return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));

}



function busca_poblacion($id_miembro){

	$query="SELECT id FROM n_miembros WHERE arriba=$id_miembro and id not like 1";

	$ejecuta=mysql_query($query)or die($cuenta." ".$query." Error en consulta funcion 1: ".mysql_error());

	$cuenta+=mysql_num_rows($ejecuta);

	$count=0;

	while(mysql_num_rows($ejecuta)>$count++){

		$row=mysql_fetch_row($ejecuta);

		$id=$row[0];

		$cuenta+=busca_poblacion($id);

	}



	return $cuenta;

}



function busca_poblacion_act($id_miembro,$fecha_inicio,$fecha_final,$id_quincena){

	$query="SELECT id from n_miembros where arriba=$id_miembro and id not like 1";

	$ejecuta=mysql_query($query)or die("Error al consultar primera rama 6665: ".mysql_error());

	for($i=0;$i<mysql_num_rows($ejecuta);$i++){

		$row=mysql_fetch_row($ejecuta);

		$id=$row[0];

		$query="SELECT id FROM n_pagos WHERE miembro=$id and autorizacion=1 and quincena=$id_quincena and fecha_conf_pago BETWEEN '$fecha_inicio' AND '$fecha_final'";

		$ejecutar=mysql_query($query)or die(" Error en consulta funcion 2: ".mysql_error());

		$cuenta+=mysql_num_rows($ejecutar);

		$cuenta+=busca_poblacion_act($id,$fecha_inicio,$fecha_final,$id_quincena);

	}

	return $cuenta;

}



function validaPares($usuario,$miembro,$quincena){

	$query="SELECT id FROM n_miembros WHERE arriba=$miembro and id not like 1";

	$ejecuta=mysql_query($query)or die($query." Error al consultar rama de $miembro: ".mysql_error());

	for($i=0;$i<mysql_num_rows($ejecuta);$i++){

		$row=mysql_fetch_row($ejecuta);

		$query="SELECT id FROM n_pagos WHERE miembro=$row[0] AND autorizacion=1 AND quincena=$quincena AND anio='".date('Y')."'";

		$ejecutar=mysql_query($query)or die($query." Error al consultar pagos de $miembro: ".mysql_error());

		if(mysql_num_rows($ejecutar)>0)

			$cantidad+=1;

		else

			$cantidad+=validaPares($usuario,$row[0],$quincena);

	}

	return $cantidad;

}



function busca_pares($id_miembro,$fecha_inicio,$fecha_final,$id_quincena){

	$query="SELECT id FROM n_miembros WHERE arriba=$id_miembro and id not like 1";

	$ejecuta=mysql_query($query)or die("Error al consultar rama de $miembro: ".mysql_error());

	for($i=0;$i<mysql_num_rows($ejecuta);$i++){

		$row=mysql_fetch_row($ejecuta);

		$query="SELECT n_pagos.id FROM n_pagos INNER JOIN n_miembros on n_pagos.miembro=n_miembros.id

			WHERE n_pagos.miembro=$row[0] and n_miembros.estatus=1 and quincena=$id_quincena

				and n_pagos.autorizacion=1 and anio=".date('Y')." and n_pagos.fecha_conf_pago BETWEEN '$fecha_inicio' and '$fecha_final'";

		$ejecutar=mysql_query($query)or die("Error en consulta fn3: ".mysql_error());

		$cuenta+=mysql_num_rows($ejecutar);

		$cuenta+=busca_pares($row[0],$fecha_inicio,$fecha_final,$id_quincena);	

	}

	return $cuenta;

}

function dep_puntos_directos($upline,$id_cierre){

	if($upline!=1){

		$query="SELECT estatus FROM n_miembros WHERE id=$upline";

		$ejecuta=mysql_query($query)or die("Error al consultar estatus de upline: ".mysql_error());

		$info=mysql_fetch_row($ejecuta);

		if($info[0]==1){

			$query="SELECT id, puntos_acumulados FROM n_detalle_cierre WHERE miembro=$upline and cierre=$id_cierre";

			$ejecuta=mysql_query($query)or die("Error al consultar puntos del cierre de $upline: ".mysql_error());

			if(mysql_num_rows($ejecuta)>0){

				$row=mysql_fetch_row($ejecuta);

				$pts=$row[1];

			}else{

				$query="INSERT INTO n_detalle_cierre(cierre,miembro) VALUES($id_cierre,$upline)";

				$ejecuta=mysql_query($query)or die("Error al insertar nuevo registro de $upline: ".mysql_error());

				$pts=0;

			}

			$pts+=100;

			$query="SELECT r.pts_acum FROM n_miembros AS m INNER JOIN n_rangos AS r ON m.genero = r.genero WHERE m.id=$upline";

			$ejecuta=mysql_query($query)or die("Error al consultar pts del rango: ".mysql_error());

			if(mysql_num_rows($ejecuta)>0){

				$pt=mysql_fetch_row($ejecuta);

				$max_pts=$pt[0];

			}

			else

				$max_pts=500000;

			if($pts>$max_pts)

				$pts=$max_pts;

			$query="UPDATE n_detalle_cierre SET puntos_acumulados=$pts WHERE miembro=$upline AND cierre=$id_cierre";

			$ejecuta=mysql_query($query)or die("Error en funcion 4.1: ".mysql_error());

		}

	}

}



function dep_puntos_ind($upline,$arriba,$id_cierre){

	if($arriba!=1){

		if($upline==$arriba){

			$query="SELECT arriba,upline FROM n_miembros WHERE id=$arriba";

			$ejecuta=mysql_query($query)or die("Error en funcion 5: ".mysql_error());

			$row=mysql_fetch_row($ejecuta);

			if($row[0]!=1){

				$query="SELECT estatus FROM n_miembros WHERE id=$row[0]";

				$ejecuta=mysql_query($query)or die("Error al consultar estatus de upline: ".mysql_error());

				$info=mysql_fetch_row($ejecuta);

				if($info[0]==1){

					$query="SELECT id, puntos_acumulados FROM n_detalle_cierre WHERE miembro=$row[0] and cierre=$id_cierre";

					$ejecuta=mysql_query($query)or die("Error al consultar puntos del cierre de $row[0]: ".mysql_error());

					if(mysql_num_rows($ejecuta)>0){

						$r=mysql_fetch_row($ejecuta);

						$pts=$r[1];

					}else{

						$query="INSERT INTO n_detalle_cierre(cierre,miembro) VALUES($id_cierre,$row[0])";

						$ejecuta=mysql_query($query)or die("Error al insertar nuevo registro de $row[0]: ".mysql_error());

						$pts=0;

					}

					$pts+=50;

					$query="SELECT r.pts_acum FROM n_miembros AS m INNER JOIN n_rangos AS r ON m.genero = r.genero WHERE m.id=$row[0]";

					$ejecuta=mysql_query($query)or die("Error al consultar pts del rango: ".mysql_error());

					if(mysql_num_rows($ejecuta)>0){

						$pt=mysql_fetch_row($ejecuta);

						$max_pts=$pt[0];

					}

					else

						$max_pts=500000;

					if($pts>$max_pts)

						$pts=$max_pts;

					$query="UPDATE n_detalle_cierre SET puntos_acumulados=$pts where miembro=$row[0] AND cierre=$id_cierre";

					$ejecuta=mysql_query($query)or die($query." Error en funcion 5.1: ".mysql_error());

					if($row2[1]!=1)

						dep_puntos_ind($row2[2],$row[1]);

				}

			}

		}else{

			$query="SELECT estatus FROM n_miembros WHERE id=$arriba";

			$ejecuta=mysql_query($query)or die("Error al consultar estatus de upline: ".mysql_error());

			$info=mysql_fetch_row($ejecuta);

			if($info[0]==1){

				$query="SELECT id, puntos_acumulados FROM n_detalle_cierre WHERE miembro=$arriba and cierre=$id_cierre";

				$ejecuta=mysql_query($query)or die("Error al consultar puntos del cierre de $arriba: ".mysql_error());

				if(mysql_num_rows($ejecuta)>0){

					$r=mysql_fetch_row($ejecuta);

					$pts=$r[1];

				}else{

					$query="INSERT INTO n_detalle_cierre(cierre,miembro) VALUES($id_cierre,$arriba)";

					$ejecuta=mysql_query($query)or die("Error al insertar nuevo registro de $arriba: ".mysql_error());

					$pts=0;

				}

				$pts+=50;

				$query="SELECT r.pts_acum FROM n_miembros AS m INNER JOIN n_rangos AS r ON m.genero = r.genero WHERE m.id=$row[0]";

				$ejecuta=mysql_query($query)or die("Error al consultar pts del rango: ".mysql_error());

				if(mysql_num_rows($ejecuta)>0){

					$pt=mysql_fetch_row($ejecuta);

					$max_pts=$pt[0];

				}

				else

					$max_pts=500000;

				if($pts>$max_pts)

					$pts=$max_pts;

				$query="UPDATE n_detalle_cierre SET puntos_acumulados=$pts where miembro=$arriba AND cierre=$id_cierre";

				$ejecuta=mysql_query($query)or die($query." Error en funcion 5.1: ".mysql_error());

				if($row[1]!=1)

					dep_puntos_ind($row[2],$row[1]);

			}

		}

	}

}



?>