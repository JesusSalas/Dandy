<?

include "coneccion.php";
$id=$_GET["id"];
if($id=="1")
{
	$titulo="Alimentos";
	$header="headerAlimentosR.png";
}
else
{ 
	if($id=="2")
	{
		$titulo="Vida Noctura";
		$header="headerVidaNocturnaR.png";
	}	
	else
	{ 
		if($id=="3")
		{
			$titulo="Compras";
			$header="headerShoppingR.png";
		}
		else
		{ 
			if($id=="4")
			{
				$titulo="Entretenimiento";
				$header="headerEntretenimientoR.png";
			}
			else
			{
				 if($id=="5")
				 {
					$titulo="Actividades";
					$header="headerActividadesR.png";
				 }
				 else
				 { 
				 	if($id=="6")
					{
						$titulo="Servicios";
						$header="headerAlimentosR.png";
					}
				 }
			}
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



<link rel="stylesheet" href="assets/css/lugarStyles.css">
<title>Untitled Document</title>
<style>
	html{
		margin:0 0;
	}
	body{
		background:transparent;
		margin: 0 0;
		overflow-x:hidden;
    }

</style>
<script>
function ver(valor){
window.location=valor;
	//document.getElementById("myframe").src=valor;
}
</script>
</head>
	<body>
	 
	  <img src="assets/imgs/<? echo"$header";?>">   
	  <p>&nbsp; </p>
	  <table width="789" border="0" cellspacing="0" cellpadding="0">
       <?
		
		$consulta  = "select Empresas.idEmpresa, Nombre, Logo, Direccion, promocion_normal, descripcion from Empresas inner join Empresa_Categoria on Empresas.idEmpresa=Empresa_Categoria.idEmpresa where idCategoria=$id order by Nombre";//, Promocion1, Promocion2
	$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1: " . mysql_error());
	$count=1;
	$columna=1;
	while(@mysql_num_rows($resultado)>=$count)
	{
		$res=mysql_fetch_row($resultado);
		if($columna=="1")
		{		
?>
	   <tr>
         <td><table width="403" border="0" cellpadding="0" cellspacing="0">
             <tr>
               <td width="26">&nbsp;</td>
               <td width="150" valign="top" ><a href="javascript:ver('ver_lugar2.php?id=<? echo"$id";?>&amp;idE=<? echo"$res[0]";?>');" ><img src="assets<? echo"$res[2]";?>" width="150" height="150" border="0" /></a></td>
               <td width="18"><p class="style2">&nbsp;</p></td>
               <td width="224" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                   <tr>
                     <td><span class="contenidoNegritas"><a href="javascript:ver('ver_lugar2.php?id=<? echo"$id";?>&amp;idE=<? echo"$res[0]";?>');" class="contenidoNegritas"><? echo"$res[1]";?></a></span></td>
                   </tr>
                   <tr>
                     <td><span class="direccionLista"><? echo"$res[4]";?></span></td>
                   </tr>
                   <tr>
                     <td><hr /></td>
                   </tr>
                   <tr>
                     <td><span class="direccionLista"><? echo"$res[3]";?></span></td>
                   </tr>
                   <tr>
                     <td><span class="direccionLista"><? echo"$res[4]";?> Membresia Deluxe </span>
                     <p align="right"><span class="direccionLista"><a href="javascript:ver('ver_lugar3.php?id=<? echo"$id";?>&amp;idE=<? echo"$res[0]";?>');" class="direccionLista">mas detalles...</a></span> </p></td>
                   </tr>
               </table></td>
             </tr>
             <tr>
               <td>&nbsp;</td>
               <td colspan="3" ><img src="assets/imgs/spacer (1).gif" width="1" height="5" /></td>
             </tr>
         </table></td>
	     <?
 			$columna="2";
			}
			else
			{
				if($columna=="2")
				{
				?>
         <td><table width="403" border="0" cellpadding="0" cellspacing="0">
             <tr>
               <td width="26">&nbsp;</td>
               <td width="150" valign="top" ><a href="javascript:ver('ver_lugar2.php?id=<? echo"$id";?>&amp;idE=<? echo"$res[0]";?>');" ><img src="assets<? echo"$res[2]";?>" width="150" height="150" border="0" /></a></td>
               <td width="18"><p class="style2">&nbsp;</p></td>
               <td width="224" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                   <tr>
                     <td><span class="contenidoNegritas"><a href="javascript:ver('ver_lugar2.php?id=<? echo"$id";?>&amp;idE=<? echo"$res[0]";?>');" class="contenidoNegritas"><? echo"$res[1]";?></a></span></td>
                   </tr>
                   <tr>
                     <td><span class="direccionLista"><? echo"$res[4]";?></span></td>
                   </tr>
                   <tr>
                     <td><hr /></td>
                   </tr>
                   <tr>
                     <td><span class="direccionLista"><? echo"$res[3]";?></span></td>
                   </tr>
                   <tr>
                     <td><span class="direccionLista"><? echo"$res[4]";?> Membresia Deluxe </span>
                         <p align="right"><span class="direccionLista"><a href="javascript:ver('ver_lugar2.php?id=<? echo"$id";?>&amp;idE=<? echo"$res[0]";?>');" class="direccionLista">mas detalles...</a></span> </p></td>
                   </tr>
               </table></td>
             </tr>
             <tr>
               <td>&nbsp;</td>
               <td colspan="3" ><img src="assets/imgs/spacer (1).gif" width="1" height="5" /></td>
             </tr>
         </table></td>
       </tr>
       <?
				$columna="1";
				}
			}
			   $count=$count+1;
	}
	if($columna=="2")
	{
	?>
       <tr>
         <td><table width="418" border="0" cellpadding="0" cellspacing="0">
             <tr>
               <td width="111">&nbsp;</td>
               <td width="150" ><a href="javascript:ver('ver_lugar.php?id=<? echo"$id";?>&amp;idE=<? echo"$res[0]";?>');" ></a></td>
               <td width="41"><p class="style2">&nbsp;</p></td>
               <td width="487"><p class="style3"><a href="javascript:ver('ver_lugar.php?id=<? echo"$id";?>&amp;idE=<? echo"$res[0]";?>');" class="style3"></a> </p>
                   <p class="style1 style2">&nbsp;</p></td>
             </tr>
             <tr>
               <td>&nbsp;</td>
               <td colspan="3" ><img src="assets/imgs/spacer (1).gif" width="1" height="5" /></td>
             </tr>
         </table></td>
       </tr>
       <?
	}
?>
     </table>
	
</body></html>