<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0037)http://dandy.mx/index.php/login/index -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="stylesheet" type="text/css" href="../assets/css/admonStyles.css">

<script src="imgs/jquery-1.6.1.js" type="text/javascript"></script>
<script src="imgs/fileuploader.js" type="text/javascript"></script>
<script src="imgs/upload_images.js" type="text/javascript"></script>

<title>Untitled Document</title>
</head>
<?
session_start();
//include "checar_sesion_admin.php";
include "coneccion.php";
$guardar= $_POST["guardar"];
if($guardar=="Guardar")  
{
	$Usuario= $_POST["Usuario"];
	$Password= $_POST["Password"];
	$Nombre= $_POST["Nombre"];
	$Telefono= $_POST["Telefono"];
	$Direccion= $_POST["Direccion"];
	$Referencia= $_POST["Referencia"];
	$Horario= $_POST["Horario"];
	$Contacto= $_POST["Contacto"];
	$Web= $_POST["Web"];
	$Facebook= $_POST["Facebook"];
	$Twitter= $_POST["Twitter"];
	$Mapa= $_POST["Mapa"];
	$option1= $_POST["option1"];
	$option2= $_POST["option2"];
	$option3= $_POST["option3"];
	$option4= $_POST["option4"];
	$option5= $_POST["option5"];
	$option6= $_POST["option6"];
	$PV= $_POST["PV"];
	$Informacion= $_POST["Informacion"];
	$Logo= $_POST["Logo"];
	$Foto= $_POST["Foto"];
	$Imagen1= $_POST["Imagen1"];
	$Imagen2= $_POST["Imagen2"];
	$Imagen3= $_POST["Imagen3"];
	$Imagen4= $_POST["Imagen4"];
	$Imagen5= $_POST["Imagen5"];
	
	$consulta  = "insert into empresas ";
	$resultado = mysql_query($consulta) or die("Error en operacion1: " . mysql_error());
	
	

 
	
	echo"<script>alert(\"Empresa guardada\");</script>";
	echo"<script>parent.location=\"adm_empresa.php\"; </script>";
	
}

$consulta= "select * from empresas";
$res = mysql_query($consulta);

foreach($res as $row){
	print_r($row);
	echo "<BR>";
}
?>
<body>
</body></html>