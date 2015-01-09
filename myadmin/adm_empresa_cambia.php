<?php







session_start();







$permiso="super_admin";







include "checar_sesion_admin.php";







include "coneccion.php";







$idEmpresa = $_GET['id']; // esta variable es de uso local







$_SESSION['id_c_emp'] = $idEmpresa; // este se utiliza en el logos_resize.php para concatenarselo al nombre de las imagenes







$_SESSION['count']="";// este se utiliza en el logos_resize.php para concatenarselo al nombre de las imagenes de los menus















$consulta  = "select * from Empresas where idEmpresa = $idEmpresa";















$resultado = mysql_query($consulta) or die("Error en operacion3: " . mysql_error());







$count=1;







if(@mysql_num_rows($resultado)>=1)







{







	$empresa_info=mysql_fetch_row($resultado);







}







?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">







<!-- saved from url=(0037)http://dandy.mx/index.php/login/index -->







<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">















<link rel="stylesheet" type="text/css" href="../assets/css/admonStyles.css">

<link rel="stylesheet" type="text/css" href="../assets/css/lugarStyles.css">















<script src="..imgs/jquery-1.6.1.js" type="text/javascript"></script>







<script src="..imgs/fileuploader.js" type="text/javascript"></script>







<script src="..imgs/upload_images.js" type="text/javascript"></script>







<!--<script src="..../assets/jQuery/funciones.js" type="text/javascript"></script>-->







<script>







function deletImg(nombre,idEmp){







	if(confirm('Una vez que borres ya no se podrá deshacer.\nDeseas Continuar?')){







		var path =  'http://dandy.mx/myadmin/deletImg.php?nombre=' + nombre + '&idEmpresa=' + idEmp;







	//	alert(path);







		document.getElementById('iframeForErase').src = path;







		var element = document.getElementById(nombre).parentNode;







		element.removeChild(document.getElementById(nombre));







	}







}







</script>















<title>Untitled Document</title>







<style type="text/css">







<!--















-->







</style></head>







<?php







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







	$fb= $_POST["Facebook"];







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







	$LogoMediano= str_replace(" ","%20",$_POST["LogoMediano"]);







	$Foto= str_replace(" ","%20",$_POST["Foto"]);







	$Imagen1= str_replace(" ","%20",$_POST["Imagen1"]);







	$Imagen2= str_replace(" ","%20",$_POST["Imagen2"]);







	$Imagen3= str_replace(" ","%20",$_POST["Imagen3"]);







	$Imagen4= str_replace(" ","%20",$_POST["Imagen4"]);







	$Imagen5= str_replace(" ","%20",$_POST["Imagen5"]);







	$Imagen5= str_replace(" ","%20",$_POST["Imagen5"]);







	$imagenSlider = str_replace(" ","%20",$_POST["imagenSlider"]);







	$categorias = $_POST['categorias'];	







	$promocion_normal= $_POST["promocion_normal"];







	$promocion_diamante= $_POST["promocion_diamante"];







	$puntos_normal= $_POST["puntos_normal"];







	$puntos_diamante= $_POST["puntos_diamante"];







	$descripcion= $_POST["descripcion"];







	$menuImagenes= $_POST["menuImagen"];







	$vigencia_diamante=$_POST['vigencia_diamante'];







	$vigencia_delux=$_POST['vigencia_delux'];







	$nombre_menu = $_POST['nombre_menuImagen'];







	$consulta  = " UPDATE  Empresas SET  `Nombre` =  '$Nombre',



	



	nombre_menu = '$nombre_menu',







`Referencia` =  '$Referencia',







`Telefono` =  '$Telefono',







`Contacto` =  '$Contacto',







Direccion = '$Direccion',







`Horario` =  '$Horario',







`Web` =  '$Web',







`FaceBook` =  '$fb',







`Twitter` =  '$Twitter',







`Foto` =  '$Foto',







`Mapa` =  '$Mapa',







`Menu` =  '$Menu',







`Informacion` =  '$Informacion',







`Logo` =  '$Logo',







`logoMediano` =  '$LogoMediano',







`PV` =  '$PV',







`Imagen1` =  '$Imagen1',







`Imagen2` =  '$Imagen2',







`Imagen3` =  '$Imagen3',







`Imagen4` =  '$Imagen4',







`Imagen5` =  '$Imagen5',







`Usuario` =  '$Usuario',







`Password` =  '$Password',







`Password_noAdmin` =  '$Password_mostrador',







slider_principal = '$imagenSlider',







promocion_normal = '$promocion_normal',







promocion_diamante = '$promocion_diamante',







porciento_puntos_normal = '$puntos_normal',







porciento_puntos_diamante = '$puntos_diamante',







vigencia_delux = '$vigencia_delux',







vigencia_diamante = '$vigencia_diamante',







descripcion = '$descripcion'







WHERE idEmpresa = $idEmpresa";















	 //echo $consulta;







	//echo "<BR>";







	$resultado = mysql_query($consulta) or die("Error en operacion update empresa: " . mysql_error());







	//$idEmpresa = mysql_insert_id();







	//echo $idEmpresa;







	$consulta = "DELETE FROM Empresa_Categoria WHERE idEmpresa=".$idEmpresa;







	//echo $consulta."DELETE CATEGORIA<br>";







	$resultado = mysql_query($consulta) or die ("Error en operacion update categorias empresa: ".mysql_error());







	







	for($i=0 ; $i< count($categorias) ; $i++)







	{















		$consulta = "insert into Empresa_Categoria(idEmpresa, idCategoria) 







		values (".$idEmpresa.",".$categorias[$i].")";







		//echo $consulta."INSERT CATEGORIA<br>";







		$resultado = mysql_query($consulta) or die ("Error en operacion insert categorias empresa: ".mysql_error());







	







	}







	







	$consulta = "DELETE FROM imagenes_menu WHERE id_empresa=".$idEmpresa;



	echo $consulta;







	$resultado = mysql_query($consulta) or die ("Error en operacion dlt imagenes_menu: ".mysql_error());







	for($i=0 ; $i< count($menuImagenes) ; $i++)







	{















		$consulta = "insert into imagenes_menu(id_empresa, nombre) 







		values (".$idEmpresa.",'".$menuImagenes[$i]."')";







		$resultado = mysql_query($consulta) or die ("Error en operacion insert imagenes_menu: ".mysql_error());







	







	}







	















 







	







	echo"<script>window.location=\"adm_empresa_cambia.php?id=".$idEmpresa."\" </script>";







	







	







}







?>







<body>















	<div class="headerWrapper">







    	<div class="logo"></div>







      <div class="title">Portal Administrativo</div>







        <div class="menu">







          <?php include "menu_2.html";?>







        </div>







	</div>







    







    <div class="clear"></div>







    







     <form action="" method="post" id="cambEmp" accept-charset="utf-8">







       <div class="contentWrapper">







  <div class="leftContent">







        	<div class="subTitle">Cambia Empresa</div>







            <div class="clear"></div>







          <div class="inserts">







           	<label class="Lbl">Usuario:</label>







              <input name="Usuario" type="text" class="smallTxt" id="Usuario" value="<?php echo $empresa_info[21] ?>">







          </div>







          <div class="inserts">







           	<label class="Lbl">Password:</label>







              <input name="Password" type="password" class="smallTxt" id="Password" value="<?php echo $empresa_info[22] ?>">







          </div>







          <div class="inserts">







           	<label class="Lbl">Password mostrador:</label>







              <input name="Password_mostrador" type="password" class="smallTxt" id="Password_mostrador" value="<?php echo $empresa_info[29] ?>">







          </div>







       	  <div class="inserts">







           	<label class="Lbl">Nombre:</label>







              <input name="Nombre" type="text" class="smallTxt" id="Nombre" value="<?php echo $empresa_info[1] ?>">







          </div>







          <div class="inserts">







           	<label class="Lbl">Teléfono:</label>







              <input name="Telefono" type="text" class="smallTxt" id="Telefono" value="<?php echo $empresa_info[4] ?>">







          </div>







            <div class="inserts">







            	<label class="Lbl">Dirección:</label>







                <input type="text" class="smallTxt" id="Direccion" name="Direccion" value="<?php echo $empresa_info[2]?>">







            </div>







            <div class="inserts">







            	<label class="Lbl">Referencia:</label>







                <input type="text" class="smallTxt" id="Referencia" name="Referencia"  value="<?php echo $empresa_info[3]?>">







            </div>







            <div class="inserts">







            	<label class="Lbl">Horario:</label>







                <input type="text" class="smallTxt" id="Horario" name="Horario" value="<?php echo $empresa_info[6]?>">







            </div>







            <div class="inserts">







            	<label class="Lbl">E-mail:</label>







                <input type="text" class="smallTxt" id="ContactoImagen" name="Contacto" value="<?php echo $empresa_info[5]?>">







            </div>







            <div class="inserts">







            	<label class="Lbl">Web:</label>







                <input type="text" class="smallTxt" id="WebImagen" name="Web"  value="<?php echo $empresa_info[7]?>">







            </div>







            <div class="inserts">







            	<label class="Lbl">Facebook:</label>







                <input type="text" class="smallTxt" id="FacebookImagen" name="Facebook" value="<?php echo $empresa_info[8]?>">







            </div>



            







            <div class="inserts">







            	<label class="Lbl">Twitter:</label>







                <input type="text" class="smallTxt" id="TwitterImagen" name="Twitter" value="<?php echo $empresa_info[9]?>">







            </div>



            



            



            <div class="inserts">







            	<label class="Lbl">T&iacute;tulo secci&oacute;n men&uacute;:</label>







                <input type="text" class="smallTxt" id="nombre_menuImagen" name="nombre_menuImagen" value="<?php echo $empresa_info[34]?>">







            </div>







            <div class="inserts" style="height:90px">







            	<label class="Lbl">Mapa:</label>







                <textarea class="bigTxt" id="Mapa" name="Mapa"><?php echo $empresa_info[11]?></textarea>







            </div>







            <div class="inserts" style="margin-top:20px;">







            	<label class="Lbl">Descripción breve:</label>







                <textarea class="bigTxt" style="color:#000;height:40px" maxlength="150" id="descripcion" name="descripcion"><?php echo $empresa_info[28]?></textarea>







            </div>







        </div>







       <div class="rightContent">







        	<div class="clear"></div>







        	<div class="clear"></div>







        	<div class="clear"></div>







            <div class="insertCheckBox">







            	<label class="Lbl">Categoría:</label>







                <div class="checkBox">







	<?php







    $consulta="SELECT Categorias.idCategoria, Categorias.Nombre FROM Categorias";







	$resultado = mysql_query($consulta) or die("Error en consulta de categorias: " . mysql_error());







	







	







    $consulta2 = "SELECT Categorias.idCategoria FROM Empresa_Categoria







INNER JOIN Categorias ON Categorias.idCategoria = Empresa_Categoria.idCategoria







 where Empresa_Categoria.idEmpresa=$idEmpresa";







	$resultado2 = mysql_query($consulta2) or die("Error en consulta de categorias: " . mysql_error());







	







	$categorias = array();







	







	for($i=1 ; @mysql_num_rows($resultado2)>=$i ; $i++){







		$res=mysql_fetch_row($resultado2);







		//echo "$res[0] <br>";







		array_push($categorias,$res[0]);







	}







	







	$count=1;







	







	while(@mysql_num_rows($resultado)>=$count)







	{







		$cat=mysql_fetch_row($resultado);







		for($i=0 ; count($categorias)>$i ; $i++)







		{







			if($categorias[$i]==$cat[0]){







				$checked="checked";







				break;







			}







			else $checked = "";







		}







		







			?>







        <input type="checkbox" name="categorias[]" value="<?php echo $cat[0]?>" id="categorias[]" <?php echo $checked;?>>



<label  style="font-family: font_bureau__stainlessextlight;">



        	<?php echo $cat[1]?></label><br>







        <?php







		if($count%3==0){







			?></div><div class="checkBox"><?php







		}







		$count++;







	}







    ?>







<!--                <input type="checkbox" name="categorias[]" value="1" id="categorias[]">Alimentos<br>







				<input type="checkbox" name="categorias[]" value="2">Vida Nocturna<br>







				<input type="checkbox" name="categorias[]" value="3">Compras







                </div>







                <div class="checkBox">







                <input type="checkbox" name="categorias[]" value="4">Entretenimiento<br>







				<input type="checkbox" name="categorias[]" value="5">Actividades<br>







				<input type="checkbox" name="categorias[]" value="6">Servicios-->







                </div>







            </div>







            <div class="insertCheckBox" style="margin-top:10px;margin-bottom:20px;width:200px;height:100px">







            	<label class="Lbl">Punto de Venta:</label>







                <div class="checkBox" style="margin-top:10px;width:100px">







                <input type="radio" name="PV" value="1" <?php if($empresa_info[15]==1) echo "checked=\"checked\"";?>>Si







				<input type="radio" name="PV" value="0" style="margin-left:10px;" <?php if($empresa_info[15]==0) echo "checked=\"checked\"";?>>No







                </div>







            </div>







            <div class="clear"></div>







        	<div class="logoInsert">







            	<label style="margin-left:70px" class="logoTitle">Logo chico:</label>







                <?php 







				$logo = str_replace(" ","%20",$empresa_info[14]);?>







            	<div align="center" class="logoImg" id="logoImg" >







				<?php if($empresa_info[14]!=""){?>







                <img id="logo" src="../assets<?php echo $logo;?>"  width="128" height="128">







				<?php }?></div>







                <label class="Lbl" style="font-size:9px;margin-left:50px">128x128</label>







                <input type="button" id="logoUpload" class="browseBttn" value="Browse">







                <div class="clear"></div>







                <div class="clear"></div>







                <div class="clear"></div>







            	<label class="logoTitle" style="margin-left:60px">Logo mediano:</label>







                <?php 







				$logoMediano = str_replace(" ","%20",$empresa_info[32]);?>







            	<div align="center" class="logoImgMediano" id="logoImgMediano">







				<?php if($empresa_info[32]!=""){?>







                <img id="logoMediano" src="../assets<?php echo $logoMediano;?>" width="227" height="208">







				<?php }?></div>







                <label class="Lbl" style="font-size:9px">227x208</label>







                <input type="button" id="logoMedianoUpload" class="browseBttn" value="Browse">







            </div>







       </div>







        







<div class="resena" style="margin-top:50px">







        	<label class="Lbl">Reseña:</label>







            <textarea class="promoTxt" id="Informacion" name="Informacion"><?php echo $empresa_info[13]?></textarea>







        </div>







    <div class="resena" >







        	<label class="Lbl">Beneficios DELUXE:</label>







            <textarea class="promoTxt" id="promocion_normal"  name="promocion_normal"><?php echo $empresa_info[24]?></textarea>







      <div class="puntos">







        <label class="Lbl" style="width:200px">Puntos</label>







        <input name="puntos_normal"  class="smallTxt" style="width:50px" type="number" id="puntos_normal_imagen"  value="<?php echo $empresa_info[26]?>"/>







        <label class="Lbl" style="width:10px;margin-top:0">%</label>







        </div>







        </div>







    <div class="resena">







        	<label class="Lbl">Vigencia DELUXE:</label>







            <textarea class="promoTxt" id="vigencia_deluximagen" style="height:50px" name="vigencia_delux"><?php echo $empresa_info[30]?></textarea>







      <div class="puntos">







        </div>







        </div>







<div class="resena">







        	<label class="Lbl">Beneficios DIAMOND:</label>







            <textarea class="promoTxt" id="promocion_diamante" name="promocion_diamante"><?php echo $empresa_info[25]?></textarea>







      <div class="puntos">







        <label class="Lbl" style="width:200px">Puntos</label>







        <input name="puntos_diamante"  class="smallTxt" style="width:50px" type="number" id="puntos_normal_imagen" value="<?php echo $empresa_info[27]?>"/>







        <label class="Lbl" style="width:10px;margin-top:0">%</label>







        </div>







        </div>







    <div class="resena">







        	<label class="Lbl">Vigencia DIAMOND:</label>







            <textarea class="promoTxt" id="vigencia_diamanteimagen" style="height:50px" name="vigencia_diamante"><?php echo $empresa_info[31]?></textarea>







      <div class="puntos">







        </div>







        <div class="fotoInsert">            







        	<label class="fachadaTitle">Foto Fachada:</label>







            <div align="center" class="fachadaImg" id="fachadaImg">







           <?php if($empresa_info[10]!=""){?>







            <img id="fachada" src="../assets<?php echo str_replace(" ","%20",$empresa_info[10]);?>"/>







			<?php }?>







            </div>







            <input type="button" class="browseBttn" style="margin-left:490px;" id="fotoUpload" value="Browse">







        </div>







        <div class="sliderPics" style="height:550">



        <div style="width:100%; height:30px" align="center">

          <label class="fachadaTitle"  style="margin-left:auto; margin-right:auto">Galería de Fotos:</label>

        </div>







        	<div class="sliderItem"  style="width:auto;">







            	<label class="sliderPicTitle">Imágen 1:</label>







                <div align="center" class="sliderImg" id="img1">                







           <?php if($empresa_info[16]!=""){?> 







           <img id="img_1" style="width:200px" src="../assets<?php echo str_replace(" ","%20",$empresa_info[16]);?>"/>	







		   <?php }?>







                </div>







            	<input type="button" class="browseBttn" style="margin-left:65px;" id="img1Upload" value="Browse">







            </div>







            <div class="sliderItem"  style="width:auto">







                <label class="sliderPicTitle">Imágen 2:</label>







                <div align="center" class="sliderImg" id="img2" >







                  <?php if($empresa_info[17]!=""){?>







                  <img style="width:200px;"  src="../assets<?php echo str_replace(" ","%20",$empresa_info[17]);?>" alt="" id="img_2"/>







                  <?php }?></div>







                <input type="button" class="browseBttn" style="margin-left:65px;" id="img2Upload" value="Browse">







            </div>







            <div class="sliderItem"  style="width:auto">







                <label class="sliderPicTitle">Imágen 3:</label>







                <div align="center" class="sliderImg" id="img3">







                  <?php if($empresa_info[18]!=""){?>







                  <img style="width:200px"  src="../assets<?php echo str_replace(" ","%20",$empresa_info[18]);?>" alt="" id="img_3"/>







                  <?php }?>







              </div>







                <input type="button" class="browseBttn" style="margin-left:65px;" id="img3Upload" value="Browse">







            </div>







            <div class="sliderItem"  style="width:auto">







            	<label class="sliderPicTitle">Imágen 4:</label>







                <div align="center" class="sliderImg" id="img4">







                  <?php if($empresa_info[19]!=""){?>







                  <img style="width:200px"  src="../assets<?php echo str_replace(" ","%20",$empresa_info[19]);?>" alt="" id="img_4"/>







                  <?php }?>







              </div>







                <input type="button" class="browseBttn" style="margin-left:65px;" id="img4Upload" value="Browse">







            </div>







            <div class="sliderItem"  style="width:auto">            	







            	<label class="sliderPicTitle">Imágen 5:</label>







                <div align="center" class="sliderImg" id="img5">







                  <?php if($empresa_info[20]!=""){?>







                  <img style="width:200px"  src="../assets<?php echo str_replace(" ","%20",$empresa_info[20]);?>" alt="" id="img_5" />







                  <?php }?>







              </div>







                <input type="button" class="browseBttn" style="margin-left:65px;" id="img5Upload" value="Browse">







            </div>







        </div>







         <div class="fotoInsert" align="center">            







        	<label class="fachadaTitle" style="margin-left:auto; margin-right:auto">Foto slider principal:</label>







            <div align="center" class="sliderImage" id="sliderImg">







           <?php if($empresa_info[23]!=""){?>







            <img id="imgSlider"  src="../assets<?php echo str_replace(" ","%20",$empresa_info[23]);?>"/>







			<?php }?>







            </div>







            <input type="button" class="browseBttn" style="margin-left:490px;" id="sliderUpload" value="Browse">







        </div>







    <div class="clear"></div>







	<div class="fotoInsert" align="center"> 



<label class="fachadaTitle" style="margin-left:auto; margin-right:auto">Fotos para los men&uacute;s:</label>







			<div class="fotoInsert" id="menuImages" align="center" style="border:1px solid #FFF;">







			







			<?php		







			$consulta  = "select id_empresa, nombre from imagenes_menu where id_empresa = $idEmpresa";







		







			$resultado = mysql_query($consulta) or die("Error en operacion3: " . mysql_error());







			$count=1;







			while(@mysql_num_rows($resultado)>=$count)







			{







				$res_img=mysql_fetch_row($resultado);







				?>







				<div id="<?php echo $res_img[1];?>" style="float:left">







					<div align="left" style="width:200px;border-color:#FFF;">







						<a onclick="deletImg('<?php echo $res_img[1];?>','<?php echo $res_img[0]?>');"><img name="" src="..../assets/imgs/delete.gif" alt="" /></a>







					</div>







					<div>







						<img id="menuImg" name="menuImg" src="..../assets/fotos/chica_<?php echo $res_img[1];?>" style="width:200px;border-color:#FFF;" boder="1">







						<input id="menuImagen[]" name="menuImagen[]" type="hidden" value="<?php echo $res_img[1];?>">







					</div>







				</div>







				<?php







				$_SESSION['count']=$count;







				$count++;







			}







			?>



</div>







			<div id="divForErase"></div>







			<iframe id="iframeForErase" name="iframeForErase" src=".." width="0" style="border:none" height="0"></iframe>







			<input type="button" class="browseBttn" style="margin-left:490px;" id="menuUpload" value="Browse">







	</div>







    <div class="clear"></div>







    <div class="clear">







        <input type="submit" name="guardar" value="Guardar" class="saveBttn" onclick="return validar()" style="margin-top:100px; margin-bottom:100px"> 



	</div>  







		 <input type="hidden" id="Logo" name="Logo" value="<?php echo str_replace(" ","%20",$empresa_info[14]);?>">







        <input type="hidden" id="LogoMediano" name="LogoMediano" value="<?php echo str_replace(" ","%20",$empresa_info[32]);?>">







        <input type="hidden" id="Foto" name="Foto" value="<?php echo str_replace(" ","%20",$empresa_info[10]);?>">







        <input type="hidden" id="Imagen1" name="Imagen1" value="<?php echo str_replace(" ","%20",$empresa_info[16]);?>">







        <input type="hidden" id="Imagen2" name="Imagen2" value="<?php echo str_replace(" ","%20",$empresa_info[17]);?>">







        <input type="hidden" id="Imagen3" name="Imagen3" value="<?php echo str_replace(" ","%20",$empresa_info[18]);?>">







        <input type="hidden" id="Imagen4" name="Imagen4" value="<?php echo str_replace(" ","%20",$empresa_info[19]);?>">







        <input type="hidden" id="Imagen5" name="Imagen5" value="<?php echo str_replace(" ","%20",$empresa_info[20]);?>">







        <input type="hidden" id="imagenSlider" name="imagenSlider" value="<?php echo str_replace(" ","%20",$empresa_info[23]);?>"> 







	</form>















</body></html>