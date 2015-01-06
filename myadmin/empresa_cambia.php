<?

session_start();

if($_SESSION['tipo_usuario'] == "admin" || $_SESSION['tipo_usuario'] == "super_admin")

	$permiso=$_SESSION['tipo_usuario'];

include "checar_sesion_admin.php";

include "coneccion.php";

$idEmpresa=$_SESSION['id_empresa'];



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

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



<link rel="stylesheet" type="text/css" href="../assets/css/admonStyles.css">

<link rel="stylesheet" type="text/css" href="../assets/css/lugarStyles.css">



<script src="imgs/jquery-1.6.1.js" type="text/javascript"></script>
<script src="imgs/fileuploader.js" type="text/javascript"></script>
<!--<script src="imgs/upload_images.js" type="text/javascript"></script>-->
<script src="../assets/jQuery/funciones.js" type="text/javascript"></script>
<script src="imgs/upload_images_empresa.js" type="text/javascript"></script>

<title>Untitled Document</title>

<!--[if gte IE 9]>

  <style type="text/css">

    .gradient {

       filter: none;

    }

  </style>

<![endif]-->

</head>

<?

//$guardar= $_POST["guardar"];

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

	$vigencia_diamante=$_POST['vigencia_diamante'];

	$vigencia_delux=$_POST['vigencia_delux'];

	

	

	$consulta  = " UPDATE  Empresas SET  

`Referencia` =  '$Referencia',

`Telefono` =  '$Telefono',

`Contacto` =  '$Contacto',

Direccion = '$Direccion',

`Horario` =  '$Horario',

`Web` =  '$Web',

`FaceBook` =  '$fb',

`Twitter` =  '$Twitter',

`Foto` =  '$Foto',

`Menu` =  '$Menu',

`Informacion` =  '$Informacion',

`PV` =  '$PV',

`Imagen1` =  '$Imagen1',

`Imagen2` =  '$Imagen2',

`Imagen3` =  '$Imagen3',

`Imagen4` =  '$Imagen4',

`Imagen5` =  '$Imagen5',



`Password` =  '$Password',

`Password_noAdmin` =  '$Password_mostrador',

promocion_normal = '$promocion_normal',

promocion_diamante = '$promocion_diamante',

vigencia_delux = '$vigencia_delux',

vigencia_diamante = '$vigencia_diamante'

WHERE idEmpresa = $idEmpresa";



	// echo $consulta;

	//echo "<BR>";

	$resultado = mysql_query($consulta) or die("Error en operacion update empresa: " . mysql_error());

	//$idEmpresa = mysql_insert_id();

	//echo $idEmpresa;

	

	



 	$mail="paolopastrana@gmail.com";

	mail($mail,"cambio de informacion","la empresa ".$empresa_info[1]." ha cambiado su información");

	echo"<script>alert(\"Empresa guardada\");</script>";

	

	echo"<script>window.location=\"empresa_cambia.php\" </script>";

	

}

?>

<body>

	<div class="headerWrapper">

    	<div class="logo"></div>

        <div class="title">Portal Administrativo</div>

                            <div class="menu">

                              <table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td><img src="imgs/menu_sep.png" alt="" /></td>

    <td><div align="center"><a href="adm_mi_empresa.php" class="contenido">Menú</a></div></td>

    <td><img src="imgs/menu_sep.png" alt="" /></td>

    <td><div align="center"><a href="servicio_clientes.php" class="contenido">Servicio al Cliente</a></div></td>

    <td><img src="imgs/menu_sep.png" alt="" /></td>

    <td><div align="center"><a href="empresa_cambia.php" class="contenido">Datos Empresa </a></div></td>

    <td><img src="imgs/menu_sep.png" alt="" /></td>

    <td><div align="center"><a href="logout.php" class="contenido">Salir</a></div></td>

    <td><img src="imgs/menu_sep.png" alt="" /></td>

  </tr>

</table>

                            </div>

                                    

    </div>

    

    <div class="clear"></div>

    

     <form action="" method="post" id="form1" accept-charset="utf-8">    <div class="contentWrapper">

    	<div class="leftContent">

        	<div class="subTitle" align="center" style="margin-left:40px;">Datos Empresa</div>

            <div class="clear"></div>

          <div style="background-color: rgba(0, 0, 0, 0.25);height:800px"><div class="inserts">

           	<label class="Lbl">Usuario:</label>

              <label class="smallTxtLbl" id="Usuario" ><? echo $empresa_info[21] ?></label>

          </div>

          <div class="inserts">

           	<label class="Lbl">Password:</label>

              <input name="Password" type="password" class="smallTxt" id="Password" value="<? echo $empresa_info[22] ?>">

          </div>

          <div class="inserts">

           	<label class="Lbl">Password mostrador:</label>

              <input name="Password_mostrador" type="password" class="smallTxt" id="Password_mostrador" value="<? echo $empresa_info[29] ?>">

          </div>

       	  <div class="inserts">

           	<label class="Lbl">Nombre:</label>

              <label class="smallTxtLbl" name="Nombre" id="Nombre" ><? echo $empresa_info[1] ?></label>

          </div>

          <div class="inserts">

           	<label class="Lbl">Teléfono:</label>

              <input name="Telefono" type="text" class="smallTxt" id="Telefono" value="<? echo $empresa_info[4] ?>">

          </div>

            <div class="inserts">

            	<label class="Lbl">Dirección:</label>

                <input type="text" class="smallTxt" id="Direccion" name="Direccion" value="<? echo $empresa_info[2]?>">

            </div>

            <div class="inserts">

            	<label class="Lbl">Referencia:</label>

                <input type="text" class="smallTxt" id="Referencia" name="Referencia"  value="<? echo $empresa_info[3]?>">

            </div>

            <div class="inserts">

            	<label class="Lbl">Horario:</label>

                <input type="text" class="smallTxt" id="Horario" name="Horario" value="<? echo $empresa_info[6]?>">

            </div>

            <div class="inserts">

            	<label class="Lbl">E-mail:</label>

                <input type="text" class="smallTxt" id="Contacto" name="Contacto" value="<? echo $empresa_info[5]?>">

            </div>

            <div class="inserts">

            	<label class="Lbl">Web:</label>

                <input type="text" class="smallTxt" id="WebImagen" name="Web"  value="<? echo $empresa_info[7]?>">

            </div>

            <div class="inserts">

            	<label class="Lbl">Facebook:</label>

                <input type="text" class="smallTxt" id="FacebookImagen" name="Facebook" value="<? echo $empresa_info[8]?>">

            </div>

            <div class="inserts">

            	<label class="Lbl">Twitter:</label>

                <input type="text" class="smallTxt" id="TwitterImagen" name="Twitter" value="<? echo $empresa_info[9]?>">

            </div>

            

            <div class="inserts">

            	<label class="Lbl">T&iacute;tulo secci&oacute;n men&uacute;:</label>

                <input type="text" class="smallTxt" id="nombre_menuImagen" name="nombre_menuImagen" value="<? echo $empresa_info[34]?>" />

            </div>

            <div class="inserts" style="margin-bottom:170px">

            	<label class="Lbl">Mapa:</label>

                <iframe width="400" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<? echo $empresa_info[11];?>&output=embed"></iframe><br />

                <!--<label class="bigTxt" id="Mapa" name="Mapa"><? echo $empresa_info[11]?></label>-->

            </div>

            </div>

        </div>

       <div class="rightContent">

        	<div class="clear"></div>

        	<div class="clear"></div>

        	<div class="clear"></div>

       	 <div class="clear"></div>

         <div style="background-color: rgba(0, 0, 0, 0.25);height: 539px;margin-left:15px;width: 466px;">

        	<div class="logoInsert" style=" margin-left: 105px;">

            	<label class="logoTitle gradient">

            	<div align="center">Logo</div>

            	</label>

                <? 

				$logo = str_replace(" ","%20",$empresa_info[14]);?>

            	<div align="center" class="logoImg" id="logoImg" style="border:none">

				<? if($empresa_info[14]!=""){?>

                <img id="logo" src="/assets<? echo $logo;?>">

				<? }?></div>

            </div>

            <div class="fotoFachada" >            

        	<label class="logoTitle gradient">

        	Foto Fachada

        	

        	</label>

            <div align="left" class="fachadaImg" id="fachadaImg" style="border:inherit;" >

           <? if($empresa_info[10]!=""){?>

            <img id="fachada" src="/assets<? echo str_replace(" ","%20",$empresa_info[10]);?>"

            	style="margin-top:10px;

                		-webkit-border-radius: 10px;

                        -moz-border-radius: 10px;

                        border-radius: 10px;

                        margin-left:5px-15px;

                        max-width: 300px;"/>

			<? }?>

            </div>

        </div>

       </div>

       </div>

       

      <div id="divTxtarea">

<div class="resena" style="

    margin-top: 0px;

background-color: rgba(0, 0, 0, 0.25);height: 139px;

">

        	<label class="Lbl">Reseña:</label>

            <textarea class="promoTxt" id="Informacion" name="Informacion" style="

    margin-top: 15px;

"><? echo $empresa_info[13]?></textarea>

       </div>

    <div class="resena" style="height:326px;background-color: rgba(0, 0, 0, 0.25);margin-top: 50px;">

    <div class="clear"></div>

    

        	<label class="sliderTitle gradient" style="width:auto;	margin-left: 17px">DELUX</label>

            <div class="resena">

            <div class="puntos">

        <label class="Lbl" style="width:200px">Puntos</label>

        <input class="smallTxt" name="puntos_normal" style="width:50px" type="number" id="puntos_normal_imagen" value="<? echo $empresa_info[26]?>"/>

        <label class="Lbl" style="width:10px;margin-top:0">%</label>

      </div>

        	<label class="Lbl" style="width:auto; float:none;">Beneficios</label><br />

      <textarea class="promoTxt" id="promocion_normal"  name="promocion_normal" ><? echo $empresa_info[24]?></textarea>

      </div>

    <div class="resena" >

    <div class="puntos">

&nbsp;

      </div>

        	<label class="Lbl" style="width:auto;float: none;">Vigencia</label><br />

            <textarea class="promoTxt" id="vigencia_deluximagen" name="vigencia_delux"><? echo $empresa_info[30]?></textarea>

       </div>

       </div>

       

       

       

       

       

       

       <div class="resena" style="height:326px;background-color: rgba(0, 0, 0, 0.25);margin-top: 50px;">

    <div class="clear"></div>

    

        	<label class="sliderTitle gradient" style="width:auto;	margin-left: 17px">DIAMOND</label>

            <div class="resena">

            <div class="puntos">

        <label class="Lbl" style="width:200px">Puntos</label>

        <input class="smallTxt" name="puntos_diamante" style="width:50px" type="number" id="puntos_diamante_imagen" value="<? echo $empresa_info[26]?>"/>

        <label class="Lbl" style="width:10px;margin-top:0">%</label>

      </div>

        	<label class="Lbl" style="width:auto; float:none;">Beneficios</label><br />

      <textarea class="promoTxt" id="promocion_diamante"  name="promocion_diamante" ><? echo $empresa_info[24]?></textarea>

      </div>

    <div class="resena" >

    <div class="puntos">

&nbsp;

      </div>

        	<br /><label class="Lbl" style="width:auto;float: none;">Vigencia</label><br />

            <textarea class="promoTxt" id="vigencia_diamanteimagen" name="vigencia_diamante" style="float: none;"><? echo $empresa_info[30]?></textarea>

       </div>

       </div>

       

       

        <div class="sliderPics" style="background-color: rgba(0, 0, 0, 0.25);margin-top: 50px;">

        <div style="width:100%; height:30px; margin-top:15px;margin-left: 17px">

          <label class="sliderTitle gradient">Galería de fotos:</label>

        </div>

        <div style=" margin-top:30px; margin-left:76px;" align="center">

          <div class="sliderItem"  style="width:auto;height:550;">

            <label class="sliderPicTitle">Imagen 1:</label>

            <div align="center" class="sliderImg" id="img1">

              <? if($empresa_info[16]!=""){?>

              <img  style="width:200px;" src="/assets<? echo str_replace(" ","%20",$empresa_info[16]);?>" alt="" id="img_1"/>

              <? }?>

            </div>

            <input type="button" class="browseBttn" style="margin-left:65px;" id="img1Upload" value="Browse" />

          </div>

          <div class="sliderItem"  style="width:auto">

            <label class="sliderPicTitle ">Imagen 2:</label>

            <div align="center" class="sliderImg" id="img2" >

              <? if($empresa_info[17]!=""){?>

              <img style="width:200px;"  src="/assets<? echo str_replace(" ","%20",$empresa_info[17]);?>" alt="" id="img_2"/>

              <? }?>

            </div>

            <input type="button" class="browseBttn" style="margin-left:65px;" id="img2Upload" value="Browse" />

          </div>

          <div class="sliderItem"  style="width:auto">

            <label class="sliderPicTitle ">Imagen 3:</label>

            <div align="center" class="sliderImg" id="img3">

              <? if($empresa_info[18]!=""){?>

              <img style="width:200px;"  src="/assets<? echo str_replace(" ","%20",$empresa_info[18]);?>" alt="" id="img_3"/>

              <? }?>

            </div>

            <input type="button" class="browseBttn" style="margin-left:65px;" id="img3Upload" value="Browse" />

          </div>

          <div class="sliderItem"  style="width:auto">

            <label class="sliderPicTitle ">Imagen 4:</label>

            <div align="center" class="sliderImg" id="img4">

              <? if($empresa_info[19]!=""){?>

              <img style="width:200px;"  src="/assets<? echo str_replace(" ","%20",$empresa_info[19]);?>" alt="" id="img_4"/>

              <? }?>

            </div>

            <input type="button" class="browseBttn" style="margin-left:65px;" id="img4Upload" value="Browse" />

          </div>

          <div class="sliderItem"  style="width:auto">

            <label class="sliderPicTitle ">Imagen 5:</label>

            <div align="center" class="sliderImg" id="img5">

              <? if($empresa_info[20]!=""){?>

              <img  style="width:200px;" src="/assets<? echo str_replace(" ","%20",$empresa_info[20]);?>" alt="" id="img_5" />

              <? }?>

            </div>

            <input type="button" class="browseBttn" style="margin-left:65px;" id="img5Upload" value="Browse" />

          </div>

          </div>

        </div>

        <div class="fotoInsert" >            

      <label class="sliderTitle gradient" >

      <div align="center">Foto Slider principal</div>

      </label>

      <div align="center" class="sliderImage" id="sliderImg" style="border:none">

           <? if($empresa_info[23]!=""){?>

            <img  id="slider_principal" src="/assets<? echo str_replace(" ","%20",$empresa_info[23]);?>" style="margin-top:10px;

                		-webkit-border-radius: 10px;

                        -moz-border-radius: 10px;

                        border-radius: 10px;

                        margin-left:5px;"/>

			<? }?>

            </div>

        </div>

        <input type="hidden" id="Logo" name="Logo" value="<? echo str_replace(" ","%20",$empresa_info[14]);?>">

        <input type="hidden" id="Foto" name="Foto" value="<? echo str_replace(" ","%20",$empresa_info[10]);?>">

        <input type="hidden" id="Imagen1" name="Imagen1" value="<? echo str_replace(" ","%20",$empresa_info[16]);?>">

        <input type="hidden" id="Imagen2" name="Imagen2" value="<? echo str_replace(" ","%20",$empresa_info[17]);?>">

        <input type="hidden" id="Imagen3" name="Imagen3" value="<? echo str_replace(" ","%20",$empresa_info[18]);?>">

        <input type="hidden" id="Imagen4" name="Imagen4" value="<? echo str_replace(" ","%20",$empresa_info[19]);?>">

        <input type="hidden" id="Imagen5" name="Imagen5" value="<? echo str_replace(" ","%20",$empresa_info[20]);?>">

        <input type="hidden" id="imagenSlider" name="imagenSlider" value="<? echo str_replace(" ","%20",$empresa_info[23]);?>">

        

       <input type="submit" name="guardar" value="Guardar" class="saveBttn" onClick="return validar()">    </div>

	</form>

</body></html>

