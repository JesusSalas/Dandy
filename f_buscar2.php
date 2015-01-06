<?

include "coneccion.php";
$id=$_GET["id"];
if($id=="1")
{
	$titulo="Alimentos";
	$header="headerAlimentos.png";
}
else
{ 
	if($id=="2")
	{
		$titulo="Vida Noctura";
		$header="headerVidaNocturna.png";
	}	
	else
	{ 
		if($id=="3")
		{
			$titulo="Compras";
			$header="headerShopping.png";
		}
		else
		{ 
			if($id=="4")
			{
				$titulo="Entretenimiento";
				$header="headerEntretenimiento.png";
			}
			else
			{
				 if($id=="5")
				 {
					$titulo="Actividades";
					$header="headerActividades.png";
				 }
				 else
				 { 
				 	if($id=="6")
					{
						$titulo="Servicios";
						$header="headerAlimentos.png";
					}
				 }
			}
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0046)http://dandy.mx/index.php/patrocinadores/index -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="assets/jQuery/jquery-1.2.6.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="http://dandy.mx/assets/css/admonStyles.css">
<link rel="stylesheet" href="http://dandy.mx/assets/css/styles.css">

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
.style2 {color: #FFFFFF}
.style3 {
	color: #FFFFFF;
	font-size: 16px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	text-decoration: none;
}
.style4 {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	text-decoration: none;
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
	<form action="" method="post" accept-charset="utf-8"> 
	 <img src="assets/imgs/<? echo"$header";?>">
             <table width="789" border="0" cellpadding="0" cellspacing="0">
			 <?
		
		$consulta  = "select Empresas.idEmpresa, Nombre, Logo, Direccion, promocion_normal, descripcion from Empresas inner join Empresa_Categoria on Empresas.idEmpresa=Empresa_Categoria.idEmpresa where idCategoria=$id order by Nombre";//, Promocion1, Promocion2
	$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1: " . mysql_error());
	$count=1;
	while(@mysql_num_rows($resultado)>=$count)
	{
		$res=mysql_fetch_row($resultado);		
	?>
               <tr>
                 <td width="111">&nbsp;</td>
                 <td width="150" ><a href="javascript:ver('ver_lugar.php?id=<? echo"$id";?>&idE=<? echo"$res[0]";?>');" ><img src="assets<? echo"$res[2]";?>" width="150" height="150" border="0" /></a></td>
                 <td width="41"><p class="style2">&nbsp;</p>                 </td>
                 <td width="487"><p class="style3"><a href="javascript:ver('ver_lugar.php?id=<? echo"$id";?>&idE=<? echo"$res[0]";?>');" class="style3"><? echo"$res[1]";?></a> </p>
                   <hr />
                   <p class="style1 style2"><strong>Descripción: </strong><? echo"$res[3]";?><strong><br />
  Dirección: </strong> <? echo"$res[3]";?><br />
                   <span class="style2"><strong>Promoción: </strong><? echo"$res[4]";?> </span></p>
                   <p align="right" class="style4"><a href="javascript:ver('ver_lugar.php?id=<? echo"$id";?>&idE=<? echo"$res[0]";?>');" class="style4">mas detalles...</a> </p></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td colspan="3" ><img src="assets/imgs/spacer (1).gif" width="1" height="5" /></td>
               </tr>
		 <?
			   $count=$count+1;
	}
	
?>  	   
      </table>
          
	
        	
  
	        
	 
        
    </form>
</body></html>