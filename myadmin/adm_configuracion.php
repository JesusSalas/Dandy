<?
session_start();
$permiso="super_admin";
include "checar_sesion_admin.php";
include "coneccion.php";

$consulta  = "SELECT nombre,numero_consecutivo FROM cambiar_imagen_principal";
$resultado = mysql_query($consulta) or die("Error en operacion3: " . mysql_error());
$count=1;
if(@mysql_num_rows($resultado)>=1)
{
	$res=mysql_fetch_row($resultado);
	$nombre = $res[0];
	$counter = $res[1];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0037)http://dandy.mx/index.php/login/index -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel="stylesheet" type="text/css" href="../assets/css/admonStyles.css">
<link rel="stylesheet" type="text/css" href="../assets/css/lugarStyles.css">

<script src="imgs/jquery-1.6.1.js" type="text/javascript"></script>
<script src="imgs/fileuploader.js" type="text/javascript"></script>
<script>

$(document).ready(init);
function init(){
	new AjaxUpload('logoUpload', {
		action: '../../assets/ups/upload_only_logos.php?folder=imgs&nombre=imagenIndex_<? $counter++; echo $counter;?>',
		name: 'userfile',
		onSubmit: function(file, extension) {
			if (!(extension && /^(jpg|png|jpeg|gif)$/i.test(extension))){
				// extension is not allowed
				alert('Error: invalid file extension');
				// cancel upload
				return false;
			}
		},
		onComplete: function(file, response) {		
			var elemImg = document.getElementById('logo');
			elemImg.setAttribute("id", 'logo');
			elemImg.setAttribute("src", 'http://Dandy.mx/assets' + response);
			$('#Logo').val('' + response);
			$('#cargo').val('si');
		}
	});
}
</script>

<title>Untitled Document</title>
<style type="text/css">
<!--

-->
</style></head>
<?
if($_POST["guardar"]=="Guardar"&&$_POST['cargo']=="si")
{
	$consulta  = " UPDATE  cambiar_imagen_principal SET  `nombre` =  'assets/".$_POST['Logo']."',
`numero_consecutivo` = numero_consecutivo+1";

	 echo $consulta;
	$resultado = mysql_query($consulta) or die("Error en operacion update empresa: " . mysql_error());
echo "<br>unlink(../$nombre);";
unlink('../'.$nombre);
	
/*/echo"<script>window.location=\"adm_configuracion2.php\" </script>";*/
	
	
}else if($_POST['cargo']=="Guardar"){
	$ctr = explode('_',$nombre);
	print_r($ctr);
//	$ctr = $ctr[1];
//	$c = $ctr[1]+1;
//	unlink('../'.$ctr[0]."_".$c."_".);
}
?>
<body>

	<div class="headerWrapper">
    	<div class="logo"></div>
      <div class="title">Portal Administrativo</div>
        <div class="menu">
          <? include "menu_2.html";?>
        </div>
	</div>
    
    <div class="clear"></div>
    
     <form action="" method="post" id="cambEmp" accept-charset="utf-8">
       <div class="contentWrapper">
  <div class="leftContent">
        	<div class="subTitle" style="margin-bottom:10px">Administración de Página</div>
            <div class="clear"></div>
            <div class="clear"></div>
            <div class="clear"></div>
 
   	  <div class="logoInsert">
  <label class="logoTitle" style="margin-left:inherit">Imagen Principal:</label>
                <input type="button" style="margin:inherit" id="logoUpload" class="browseBttn" value="Browse">
          <input type="submit" name="guardar" value="Guardar" style="float:right" class="saveBttnSmall" />
          <img id="logo" src="../<? echo $nombre;?>" border="5px">
        </div>
       </div>
        <input type="hidden" id="Logo" name="Logo" value="<? echo $nombre;?>">
        <input type="hidden" id="counter" name="counter" value="<? echo $counter;?>">
        <input type="hidden" id="cargo" name="cargo" value="">
        <div class="clear"></div>
    <div class="clear"></div> </div>
	</form>

</body></html>