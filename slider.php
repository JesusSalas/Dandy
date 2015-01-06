<?
include "coneccion.php";
$id= $_GET["id"];
if($id=="")
$consultaI  = "select  idEmpresa, slider_principal from Empresas where slider_principal<>'' order by idEmpresa  limit 0,1" ;	
else
$consultaI  = "select  idEmpresa, slider_principal from Empresas  where idEmpresa>$id and  slider_principal<>''order by idEmpresa  limit 0,1" ;
	$resultadoI = mysql_query($consultaI) or die("La consulta fall&oacute;P1:$consulta " . mysql_error());
	
	if(@mysql_num_rows($resultadoI)>0)
	{
		$resI=mysql_fetch_row($resultadoI);
		$logo=$resI[1];
		$id_empresa=$resI[0];
		
	}else
	{
		$consultaI  = "select  idEmpresa, slider_principal from Empresas where slider_principal<>''  order by idEmpresa  limit 0,1" ;	
		$resultadoI = mysql_query($consultaI) or die("La consulta fall&oacute;P1:$consulta " . mysql_error());
		
		if(@mysql_num_rows($resultadoI)>0)
		{
			$resI=mysql_fetch_row($resultadoI);
			$logo=$resI[1];
			$id_empresa=$resI[0];
			
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
</script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
}
-->
</style></head>
<script type="text/JavaScript">
<!--

setTimeout("location.href = 'slider.php?id=<?echo"$id_empresa";?>';",4500);
-->
</script>
<body></div>

<div id="mydiv" align="center" style="display:none;"><img src="assets<? echo"$logo";?>" width="436" height="254" />
</div>
<script>
$("#mydiv").fadeIn(2000);
$("#mydiv").fadeOut(2500);
</script>
</body>

</html>
