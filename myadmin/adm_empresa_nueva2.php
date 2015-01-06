<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0037)http://dandy.mx/index.php/login/index -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="stylesheet" type="text/css" href="../assets/css/admonStyles.css">
<link rel="stylesheet" type="text/css" href="../assets/css/lugarStyles.css">

<script src="imgs/jquery-1.6.1.js" type="text/javascript"></script>
<script src="imgs/fileuploader.js" type="text/javascript"></script>
<script src="imgs/upload_images_nueva_empresa.js" type="text/javascript"></script>

<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	font-family: font_bureau__stainlessextlight;
	color: #FFFFFF;
	font-weight: bold;
	font-size:12px;
}
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	color: #333333;
	font-size: 14px;
}
-->
</style>
</head>
<?
session_start();
//include "checar_sesion_admin.php";
include "coneccion.php";
//$guardar= $_POST["guardar"];

$resultado = mysql_query("SELECT MAX(idEmpresa) FROM Empresas") or die("Error en obtener max idEmpresa " . mysql_error());
$idEmpresa = mysql_fetch_row($resultado);
$idEmpresa = $idEmpresa[0] + 1;
$_SESSION['id_n_emp'] = $idEmpresa; // este se utiliza en el logos_resize.php para concatenarselo al nombre de las imageness
$_SESSION['count_nueva'] = "";// este se utiliza en el menu_upload.php para concatenarselo al nombre de las imagenes de los menus

if($_POST["guardar"]=="Guardar")  
{
	$Usuario= $_POST["Usuario"];
	$Password= $_POST["Password"];
	$Password_mostrador= $_POST["Password_mostrador"];
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
	$alimentos= $_POST["option1"];
	$vida_nocturna= $_POST["option2"];
	$compras= $_POST["option3"];
	$entretenimiento= $_POST["option4"];
	$actividades= $_POST["option5"];
	$servicios= $_POST["option6"];
	$PV= $_POST["PV"];
	$Informacion= $_POST["Informacion"];
	$Logo= str_replace(" ","%20",$_POST["Logo"]);
	$Foto= str_replace(" ","%20",$_POST["Foto"]);
	$Imagen1= str_replace(" ","%20",$_POST["Imagen1"]);
	$Imagen2= str_replace(" ","%20",$_POST["Imagen2"]);
	$Imagen3= str_replace(" ","%20",$_POST["Imagen3"]);
	$Imagen4= str_replace(" ","%20",$_POST["Imagen4"]);
	$Imagen5= str_replace(" ","%20",$_POST["Imagen5"]);
	$Imagen5= str_replace(" ","%20",$_POST["Imagen5"]);
	$sliderPrincipal = str_replace(" ","%20",$_POST["imagenSlider"]);
	$categorias = $_POST['categorias'];
	$promocion_normal= $_POST["promocion_normal"];
	$promocion_diamante= $_POST["promocion_diamante"];
	$puntos_normal= $_POST["puntos_normal"];
	$puntos_diamante= $_POST["puntos_diamante"];
	$descripcion= $_POST["descripcion"];
	$Menu = $_POST['nombre_menuImagen'];
	$vigencia_delux = $_POST['vigencia_delux'];
	$vigencia_diamante = $_POST['vigencia_diamante'];
	$logo_mediano = $_POST['LogoMediano'];
	$menuImagenes= $_POST["menuImagen"];
	
	$consulta  = "INSERT INTO Empresas ( `Nombre`, `Direccion`, `Referencia`, `Telefono`, `Contacto`, `Horario`, `Web`, `FaceBook`, `Twitter`, `Foto`, `Mapa`, `nombre_menu`, `Informacion`, `Logo`, `PV`, `Imagen1`, `Imagen2`, `Imagen3`, `Imagen4`, `Imagen5`, slider_principal, `Usuario`, `Password`,promocion_normal,promocion_diamante,descripcion,porciento_puntos_normal,porciento_puntos_diamante,password_noAdmin,
	vigencia_delux,
	vigencia_diamante,
	logoMediano)
 VALUES ('$Nombre','$Direccion', '$Referencia', '$Telefono', '$Contacto', '$Horario', '$Web', '$FaceBook', '$Twitter', '$Foto', '$Mapa', '$Menu','$Informacion','$Logo','$PV','$Imagen1','$Imagen2','$Imagen3','$Imagen4','$Imagen5','$sliderPrincipal','$Usuario','$Password','$promocion_normal','$promocion_diamante','$descripcion','$puntos_normal','$puntos_diamante','$Password_mostrador',
 	'$vigencia_delux',
 	'$vigencia_diamante',
 	'$logo_mediano')";
		echo $consulta."<br>";
	
	$resultado = mysql_query($consulta) or die("Error en operacion1: " . mysql_error()."<br>$consulta");
	$idEmpresa = mysql_insert_id();
	
	for($i=0 ; $i< count($categorias) ; $i++){
		$consulta = "insert into Empresa_Categoria(idEmpresa, idCategoria) values (".$idEmpresa.",".$categorias[$i].")";
		//echo $consulta."<br>";
		$resultado = mysql_query($consulta) or die ("Error en operacion categoriase empresa: ".mysql_error());
	
	}
	
	for($i=0 ; $i< count($menuImagenes) ; $i++)
	{
		$consulta = "insert into imagenes_menu(id_empresa, nombre) values (".$idEmpresa.",'".$menuImagenes[$i]."')";
		echo $consulta."<br>";
		$resultado = mysql_query($consulta) or die ("Error en operacion insert imagenes_menu: ".mysql_error());
	}
	echo"<script>alert(\"Empresa guardada\");</script>";
	echo"<script>parent.location=\"adm_empresas.php\"; </script>";
	
}
function uploadImage($imgName){
	
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
    
     <form action="" method="post" accept-charset="utf-8">    <div class="contentWrapper">
    	<div class="leftContent">
        	<div class="subTitle">Nueva Empresa</div>
            <div class="clear"></div>
            <div class="inserts">
            	<label class="Lbl">Usuario:</label>
                <input type="text" class="smallTxt" id="Usuario" name="Usuario">
            </div>
            <div class="inserts">
            	<label class="Lbl">Password:</label>
                <input type="password" class="smallTxt" id="Password" name="Password">
            </div>
          <div class="inserts">
           	<label class="Lbl">Password mostrador:</label>
              <input name="Password_mostrador" type="password" class="smallTxt" id="Password_mostrador" value="<? echo $empresa_info[29] ?>">
          </div>
        	<div class="inserts">
            	<label class="Lbl">Nombre:</label>
                <input type="text" class="smallTxt" id="Nombre" name="Nombre">
            </div>
            <div class="inserts">
            	<label class="Lbl">Teléfono:</label>
                <input type="text" class="smallTxt" id="Telefono" name="Telefono">
            </div>
            <div class="inserts">
            	<label class="Lbl">Direccion:</label>
                <input type="text" class="smallTxt" id="Direccion" name="Direccion">
            </div>
            <div class="inserts">
            	<label class="Lbl">Referencia:</label>
                <input type="text" class="smallTxt" id="Referencia" name="Referencia">
            </div>
            <div class="inserts">
            	<label class="Lbl">Horario:</label>
                <input type="text" class="smallTxt" id="Horario" name="Horario">
            </div>
            <div class="inserts">
            	<label class="Lbl">E-mail:</label>
                <input type="text" class="smallTxt" id="Contacto" name="Contacto">
            </div>
            <div class="inserts">
            	<label class="Lbl">Web:</label>
                <input type="text" class="smallTxt" id="Web" name="Web">
            </div>
            <div class="inserts">
            	<label class="Lbl">Facebook:</label>
                <input type="text" class="smallTxt" id="Facebook" name="Facebook">
            </div>
            <div class="inserts">
            	<label class="Lbl">Twitter:</label>
                <input type="text" class="smallTxt" id="Twitter" name="Twitter">
            </div>
            <div class="inserts">

            	<label class="Lbl">Título sección menú:</label>

                <input type="text" class="smallTxt" id="nombre_menuImagen" name="nombre_menuImagen" value="Menú">

            </div>
<div class="inserts" style="height:90px">
            	<label class="Lbl">Mapa:</label>
                <textarea class="bigTxt" id="Mapa" name="Mapa"></textarea>
            </div>
            <div class="inserts" style="margin-top:20px;">
            	<label class="Lbl">Descripcion breve:</label>
                <textarea class="bigTxt" style="color:#000;height:40px" maxlength="150" id="descripcion" name="descripcion"><? echo $empresa_info[28]?></textarea>
            </div>
        </div>
    	<div class="rightContent">
    	  <div class="clear"></div>
    	  <div class="clear"></div>
    	  <div class="clear"></div>
    	  <div class="insertCheckBox">
    	    <label class="Lbl">Categoría:</label>
    	    <div class="checkBox">
    	      <?

    $consulta="SELECT Categorias.idCategoria, Categorias.Nombre FROM Categorias";

	$resultado = mysql_query($consulta) or die("Error en consulta de categorias: " . mysql_error());

	

	$count=1;
	while(@mysql_num_rows($resultado)>=$count)
	{

		$cat=mysql_fetch_row($resultado);

		

			?>
    	      <input type="checkbox" name="categorias[]" value="<? echo $cat[0]?>" id="categorias[]" />
    	      <label  style="font-family: font_bureau__stainlessextlight;"> <? echo $cat[1]?></label>
    	      <br />
    	      <?

		if($count%3==0){

			?>
  	      </div>
    	    <div class="checkBox">
    	      <?

		}

		$count++;

	}

    ?>
  	      </div>
  	    </div>
    	  <div class="insertCheckBox" style="margin-top:10px;margin-bottom:20px;width:200px;height:100px">
    	    <label class="Lbl">Punto de Venta:</label>
    	    <div class="checkBox" style="margin-top:10px;width:100px">
    	      <input type="radio" name="PV" value="1" <? if($empresa_info[15]==1) echo "checked=\"checked\"";?> />
    	      Si
    	      <input type="radio" name="PV" value="0" style="margin-left:10px;" <? if($empresa_info[15]==0) echo "checked=\"checked\"";?> />
    	      No </div>
  	    </div>
    	  <div class="clear"></div>
    	  <div class="logoInsert">
    	    <label style="margin-left:70px" class="logoTitle">Logo chico:</label>
    	    <div align="center" class="logoImg" id="logoImg" ></div>
    	    <label class="Lbl" style="font-size:9px;margin-left:50px">128x128</label>
    	    <input type="button" id="logoUpload" class="browseBttn" value="Browse" />
    	    <div class="clear"></div>
    	    <div class="clear"></div>
    	    <div class="clear"></div>
    	    <label class="logoTitle" style="margin-left:60px">Logo mediano:</label>
    	    <? 

				$logoMediano = str_replace(" ","%20",$empresa_info[32]);?>
    	    <div align="center" class="logoImgMediano" id="logoImgMediano"></div>
    	    <label class="Lbl" style="font-size:9px">227x208</label>
    	    <input type="button" id="logoMedianoUpload" class="browseBttn" value="Browse" />
  	    </div>
  	  </div>
    	<div class="resena" style="margin-top: 50px;">
   	    <label class="Lbl">Reseña:</label>
            <textarea class="resenaTxt" id="Informacion" name="Informacion"></textarea>
        </div>
   	   <div class="resena" >
    	  <label class="Lbl">Beneficios DELUXE:</label>
   	     <textarea class="promoTxt" id="promocion_normal"  name="promocion_normal"><? echo $empresa_info[24]?></textarea>
    	  <div class="puntos">
    	    <label class="Lbl" style="width:200px">Puntos</label>
    	    <input name="puntos_normal"  class="smallTxt" style="width:50px" type="number" id="puntos_normal_imagen2"  value="<? echo $empresa_info[26]?>"/>
    	    <label class="Lbl" style="width:10px;margin-top:0">%</label>
  	    </div>
  	  </div>
   	   <div class="resena">
    	  <label class="Lbl">Vigencia DELUXE:</label>
   	     <textarea class="promoTxt" id="vigencia_deluximagen" style="height:50px" name="vigencia_delux"><? echo $empresa_info[30]?></textarea>
    	  <div class="puntos"></div>
  	  </div>
   	   <div class="resena">
    	  <label class="Lbl">Beneficios DIAMOND:</label>
   	     <textarea class="promoTxt" id="promocion_diamante" name="promocion_diamante"><? echo $empresa_info[25]?></textarea>
    	  <div class="puntos">
    	    <label class="Lbl" style="width:200px">Puntos</label>
    	    <input name="puntos_diamante"  class="smallTxt" style="width:50px" type="number" id="puntos_normal_imagen" value="<? echo $empresa_info[27]?>"/>
    	    <label class="Lbl" style="width:10px;margin-top:0">%</label>
  	    </div>
  	  </div>
    	<div class="resena">
    	  <label class="Lbl">Vigencia DIAMOND:</label>
    	  <textarea class="promoTxt" id="vigencia_diamanteimagen" style="height:50px" name="vigencia_diamante"><? echo $empresa_info[31]?></textarea>
    	  <div class="puntos"></div>
  	  </div>
   	   <div class="fotoInsert" align="center">            
   <label class="fachadaTitle" style="margin-left:0px">Foto Fachada:</label>
            <div class="fachadaImg" id="fachadaImg"></div>
            <input type="button" class="browseBttn" style="margin-left:490px;" id="fotoUpload" value="Browse">
        </div>
        
        <div class="sliderPics"><div style="width:100%; height:30px; margin-top: 50px;" align="center">
          <label class="fachadaTitle"  style="margin-left:auto; margin-right:auto">Galeria de Fotos:</label></div>
        	<div class="sliderItem">
            	<label class="sliderPicTitle">Imagen 1:</label>
                <div class="sliderImg" id="img1"></div>
            	<input type="button" class="browseBttn" style="margin-left:65px;" id="img1Upload" value="Browse">
            </div>
            <div class="sliderItem">
                <label class="sliderPicTitle">Imagen 2:</label>
                <div class="sliderImg" id="img2"></div>
                <input type="button" class="browseBttn" style="margin-left:65px;" id="img2Upload" value="Browse">
            </div>
            <div class="sliderItem">
                <label class="sliderPicTitle">Imagen 3:</label>
                <div class="sliderImg" id="img3"></div>
                <input type="button" class="browseBttn" style="margin-left:65px;" id="img3Upload" value="Browse">
            </div>
            <div class="sliderItem">
            	<label class="sliderPicTitle">Imagen 4:</label>
                <div class="sliderImg" id="img4"></div>
                <input type="button" class="browseBttn" style="margin-left:65px;" id="img4Upload" value="Browse">
            </div>
            <div class="sliderItem">            	
            	<label class="sliderPicTitle">Imagen 5:</label>
                <div class="sliderImg" id="img5"></div>
                <input type="button" class="browseBttn" style="margin-left:65px;" id="img5Upload" value="Browse">
            </div>
</div>
         <div class="fotoInsert" align="center">            
        	<label class="fachadaTitle" style="margin-left:auto; margin-right:auto">Foto slider principal:</label>
            <div align="center" class="sliderImage" id="sliderImg">
           <? if($empresa_info[23]!=""){?>
            <img id="slider_principal" src="/assets<? echo str_replace(" ","%20",$empresa_info[23]);?>"/>
			<? }?>
            </div>
            <input type="button" class="browseBttn" style="margin-left:0px;" id="sliderUpload" value="Browse">
        </div>
         <div class="fotoInsert" align="center">
           <label class="fachadaTitle" style="margin-left:auto; margin-right:auto">Fotos para los men&uacute;s:</label>
           <div class="fotoInsert" id="menuImages" align="center" style="border:1px solid #FFF;height:auto; min-height:300px">
           </div>
           <div id="divForErase"></div>
           <iframe id="iframeForErase" name="iframeForErase" src="" width="0" style="border:none" height="0"></iframe>
           <input type="button" class="browseBttn" style="margin-left:0px;" id="menuUpload" value="Browse" />
         </div>
		<input type="hidden" id="Logo" name="Logo">
        <input type="hidden" id="LogoMediano" name="LogoMediano">
        <input type="hidden" id="Foto" name="Foto">
        <input type="hidden" id="Imagen1" name="Imagen1">
        <input type="hidden" id="Imagen2" name="Imagen2">
        <input type="hidden" id="Imagen3" name="Imagen3">
        <input type="hidden" id="Imagen4" name="Imagen4">
        <input type="hidden" id="Imagen5" name="Imagen5">
        <input type="hidden" id="imagenSlider" name="imagenSlider" value=""> 
        
        <input type="submit" name="guardar" value="Guardar" class="saveBttn" style="margin-top: 100px;">    </div>
	</form>

</body></html>