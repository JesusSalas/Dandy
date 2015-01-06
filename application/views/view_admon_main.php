<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/admonStyles.css">

<script src="<?php echo base_url(); ?>assets/jQuery/jquery-1.6.1.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/jQuery/fileuploader.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/jQuery/upload_images.js" type="text/javascript"></script>

<title>Untitled Document</title>
</head>
<body>

	<div class="headerWrapper">
    	<div class="logo"></div>
        <div class="title">Portal Administrativo</div>
        <?php foreach($empresa as $value):?>
        <?php if($value->idEmpresa == 1) { ?>
            <div class="menu">
                <ul class="menuFull">
                    <li><img src="<?php echo base_url();?>assets/imgs/menu_sep.png"/></li>
                    <li class="menuItem">
                        <a href="">Empresas</a>
                        <ul class="subMenu">
                            <li class="subMenuItem"><a href="">Lista de Empresas</a></li>
                            <li class="subMenuItem"><a href="">Nueva Empresa</a></li>
                        </ul>
                    </li>
                    <li><img src="<?php echo base_url();?>assets/imgs/menu_sep.png"/></li>
                    <li class="menuItem">
                        <a href="">Clientes</a>
                        <ul  class="subMenu">
                            <li class="subMenuItem"><a href="">Lista de Clientes</a></li>
                        </ul>
                    </li>
                    <li><img src="<?php echo base_url();?>assets/imgs/menu_sep.png"/></li>
                    <li class="menuItem">
                        <a href="">Promociones</a>
                        <ul  class="subMenu">
                            <li class="subMenuItem"><a href="">Lista de Promociones</a></li>                 
                        </ul>
                    </li>
                    <li><img src="<?php echo base_url();?>assets/imgs/menu_sep.png"/></li>
                    <li class="menuItem">
                        <a href="">Membresias</a>
                        <ul  class="subMenu">
                            <li class="subMenuItem"><a href="">Lista de Membresias</a></li>
                            <li class="subMenuItem"><a href="">Nueva Membresia</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        <?php } else { ?>
        <div class="menu">
        	<ul class="menuFull" style="margin-left:150px;">
                <li><img src="<?php echo base_url();?>assets/imgs/menu_sep.png"/></li>
            	<li class="menuItem">
                	<a href="">Empresas</a>
                	<ul class="subMenu">
                        <li class="subMenuItem"><a href="">Nueva Empresa</a></li>
                    </ul>
                </li>
                <li><img src="<?php echo base_url();?>assets/imgs/menu_sep.png"/></li>
                <li class="menuItem">
                	<a href="">Clientes</a>
                	<ul  class="subMenu">
                        <?php foreach($empresa as $value):?>
                        <li class="subMenuItem"><?php echo anchor('puntos/index/'. $value->idEmpresa , 'Otorgar Puntos'); ?></li>
                        <?php endforeach; ?> 
                    </ul>
                </li>
                <li><img src="<?php echo base_url();?>assets/imgs/menu_sep.png"/></li>
                <li class="menuItem">
                	<a href="">Promociones</a>
                	<ul  class="subMenu">
                    	<li class="subMenuItem"><a href="">Lista de Promociones</a></li>
                        <?php foreach($empresa as $value):?>
                        <li class="subMenuItem"><?php echo anchor('promociones/index/'. $value->idEmpresa,'Nueva Promoción'); ?></li>
						<?php endforeach; ?>                    
                    </ul>
                </li>
            </ul>
        </div>
        <?php } ?>
        <?php endforeach; ?>                    
    </div>
    
    <div class="clear"></div>
    
     <?php echo form_open('index/add/') ?>
    <div class="contentWrapper">
    	<div class="leftContent">
        	<div class="subTitle">Nueva Empresa</div>
            <div class="clear"></div>
            <div class="inserts">
            	<label class="Lbl">Usuario:</label>
                <input type="text" class="smallTxt" id="Usuario" name="Usuario"/>
            </div>
            <div class="inserts">
            	<label class="Lbl">Password:</label>
                <input type="password" class="smallTxt" id="Password" name="Password"/>
            </div>
        	<div class="inserts">
            	<label class="Lbl">Nombre:</label>
                <input type="text" class="smallTxt" id="Nombre" name="Nombre"/>
            </div>
            <div class="inserts">
            	<label class="Lbl">Teléfono:</label>
                <input type="text" class="smallTxt" id="Telefono" name="Telefono"/>
            </div>
            <div class="inserts">
            	<label class="Lbl">Direccion:</label>
                <input type="text" class="smallTxt" id="Direccion" name="Direccion"/>
            </div>
            <div class="inserts">
            	<label class="Lbl">Referencia:</label>
                <input type="text" class="smallTxt" id="Referencia" name="Referencia"/>
            </div>
            <div class="inserts">
            	<label class="Lbl">Horario:</label>
                <input type="text" class="smallTxt" id="Horario" name="Horario"/>
            </div>
            <div class="inserts">
            	<label class="Lbl">E-mail:</label>
                <input type="text" class="smallTxt" id="Contacto" name="Contacto"/>
            </div>
            <div class="inserts">
            	<label class="Lbl">Web:</label>
                <input type="text" class="smallTxt" id="Web" name="Web"/>
            </div>
            <div class="inserts">
            	<label class="Lbl">Facebook:</label>
                <input type="text" class="smallTxt" id="Facebook" name="Facebook"/>
            </div>
            <div class="inserts">
            	<label class="Lbl">Twitter:</label>
                <input type="text" class="smallTxt" id="Twitter" name="Twitter"/>
            </div>
            <div class="inserts">
            	<label class="Lbl">Mapa:</label>
                <textArea class="bigTxt" id="Mapa" name="Mapa"></textArea>
            </div>
        </div>
        <div class="rightContent">
        	<div class="clear"></div>
        	<div class="clear"></div>
        	<div class="clear"></div>
            <div class="insertCheckBox">
            	<label class="Lbl">Categoría:</label>
                <div class="checkBox">
                <input type="checkbox" name="option1" value="1">Alimentos<br>
				<input type="checkbox" name="option2" value="1">Vida Nocturna<br>
				<input type="checkbox" name="option3" value="1">Compras
                </div>
                <div class="checkBox">
                <input type="checkbox" name="option4" value="1">Entretenimiento<br>
				<input type="checkbox" name="option5" value="1">Actividades<br>
				<input type="checkbox" name="option6" value="1">Servicios
                </div>
            </div>
            <div class="insertCheckBox">
            	<label class="Lbl">Punto de Venta:</label>
                <div class="checkBox" style="margin-top:10px; width:300px;">
                <input type="radio" name="PV" value="1">Si
				<input type="radio" name="PV" value="0" style="margin-left:175px;">No
                </div>
            </div>
            <div class="clear"></div>
        	<div class="logoInsert">
            	<label class="logoTitle">Logo:</label>
            	<div class="logoImg" id="logoImg"></div>
                <input type="button" id="logoUpload" class="browseBttn" value="Browse"/>
            </div>
        </div>
        <div class="resena">
        	<label class="Lbl">Reseña:</label>
            <textArea class="resenaTxt" id="Informacion" name="Informacion"></textArea>
        </div>
        <div class="fotoInsert">            
        	<label class="fachadaTitle">Foto Fachada:</label>
            <div class="fachadaImg" id="fachadaImg"></div>
            <input type="button" class="browseBttn" style="margin-left:490px;" id="fotoUpload" value="Browse"/>
        </div>
        <label class="sliderTitle">Imágenes Slider:</label>
        <div class="sliderPics">
        	<div class="sliderItem">
            	<label class="sliderPicTitle">Imagen 1:</label>
                <div class="sliderImg" id="img1"></div>
            	<input type="button" class="browseBttn" style="margin-left:65px;" id="img1Upload" value="Browse"/>
            </div>
            <div class="sliderItem">
                <label class="sliderPicTitle">Imagen 2:</label>
                <div class="sliderImg" id="img2"></div>
                <input type="button" class="browseBttn" style="margin-left:65px;" id="img2Upload" value="Browse"/>
            </div>
            <div class="sliderItem">
                <label class="sliderPicTitle">Imagen 3:</label>
                <div class="sliderImg" id="img3"></div>
                <input type="button" class="browseBttn" style="margin-left:65px;" id="img3Upload" value="Browse"/>
            </div>
            <div class="sliderItem">
            	<label class="sliderPicTitle">Imagen 4:</label>
                <div class="sliderImg" id="img4"></div>
                <input type="button" class="browseBttn" style="margin-left:65px;" id="img4Upload" value="Browse"/>
            </div>
            <div class="sliderItem">            	
            	<label class="sliderPicTitle">Imagen 5:</label>
                <div class="sliderImg" id="img5"></div>
                <input type="button" class="browseBttn" style="margin-left:65px;" id="img5Upload" value="Browse"/>
            </div>
        </div>
        <input type="hidden" id="Logo" name="Logo" />
        <input type="hidden" id="Foto" name="Foto" />
        <input type="hidden" id="Imagen1" name="Imagen1" />
        <input type="hidden" id="Imagen2" name="Imagen2" />
        <input type="hidden" id="Imagen3" name="Imagen3" />
        <input type="hidden" id="Imagen4" name="Imagen4" />
        <input type="hidden" id="Imagen5" name="Imagen5" />
        
        <?php echo form_submit('guardar', 'Guardar', 'class="saveBttn"');?>
    </div>
	<?php echo form_close();?>
</body>
</html>
