<?php

include "coneccion.php";

$id= $_GET["id"];



		

	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Untitled Document</title>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<script type="text/javascript" src="coin-slider/coin-slider.min.js"></script>

<link rel="stylesheet" href="coin-slider/coin-slider-styles.css" type="text/css" />



<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	background-color: #000000;

}

-->

</style>

<script>

function ver(uno, dos){

	top.verframe('detalle.php?id=' + uno + '&amp;idE=' + dos);

}

</script>

</head>



<body>

<div align="center">

<div id='coin-slider'>



  <?php

//$consultaI  = "select  idEmpresa, slider_principal, Web from Empresas where slider_principal<>''  order by idEmpresa  " ;

$consultaI  = "SELECT Empresas.idEmpresa,`slider_principal`, idCategoria FROM `Empresas` inner join Empresa_Categoria on Empresas.idEmpresa=Empresa_Categoria.idEmpresa WHERE slider_principal<>'' group by slider_principal	";

		$resultadoI = mysql_query($consultaI) or die("La consulta fall&oacute;P1:$consulta " . mysql_error());

		$count=1;

		while(@mysql_num_rows($resultadoI)>=$count)

		{

			$resI=mysql_fetch_row($resultadoI);

			$logo=$resI[1];

			$id_empresa=$resI[0];

			?>

    

  <a href="index.php?ver=<?php echo"$resI[2]";?>&ver2=<?php echo"$resI[0]";?>" target="_top" >

    <img src='assets<?php echo"$resI[1]";?>' >

    <span></span>  </a>

    

  <?php

		$count++;	

		}

		

		?>

  </div>





<script type="text/javascript">



    $(document).ready(function() {



        $('#coin-slider').coinslider({ width: 456,height: 254, navigation: false, effect: 'straight',  delay: 3000 });



    });



</script>

</div>

</body>



</html>

