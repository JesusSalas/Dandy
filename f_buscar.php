<?php



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

</head>

	<body>

	<form action="" method="post" accept-charset="utf-8"> 

	 <div  style="width:100%;margin-top:-10px; margin-left:100px; position:absolute;">

             <table width="626" border="0" cellpadding="0" cellspacing="0">

			 <?php

		

		$consulta  = "select Empresas.idEmpresa, Nombre, Logo, Direccion from Empresas inner join Empresa_Categoria on Empresas.idEmpresa=Empresa_Categoria.idEmpresa where idCategoria=$id order by Nombre";//, Promocion1, Promocion2

	$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1: " . mysql_error());

	$count=1;

	while(@mysql_num_rows($resultado)>=$count)

	{

		$res=mysql_fetch_row($resultado);		

	?>

               <tr>

                 <td width="96">&nbsp;</td>

                 <td width="150" ><img src="assets<?php echo"$res[2]";?>" width="150" height="150" /></td>

                 <td width="27"><p class="style2">&nbsp;</p>                 </td>

                 <td width="405"><p class="style3"><a href="javascript:verframe('ver_lugar.php?id=<?php echo"$res[0]";?>');" class="style3"><?php echo"$res[1]";?></a> </p>

                   <hr />

                   <p class="style1 style2"><strong>Dirección:</strong> <?php echo"$res[3]";?><br />

                   <span class="style2"><strong>Promocion:</strong> 1 Shot de tekila </span></p>

                   <p align="right" class="style4"><a href="javascript:verframe('ver_lugar.php?id=<?php echo"$res[0]";?>');" class="style4">mas detalles...</a> </p></td>

               </tr>

		 <?php

			   $count=$count+1;

	}

	

?>  	   

			   

       </table>

           </div>

	<div id="header_2" style="width:100%; margin-top:-200px; position:absolute; z-index:3;">

        	<img src="assets/imgs/<?php echo"$header";?>">

    </div>

	        

	 <div class="contentWrapper" style="width:507px; margin-top:200px;">

          

          

           

           

       </div>

        

    </form>

</body></html>