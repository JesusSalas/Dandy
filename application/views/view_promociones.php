<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/admonStyles.css">

<script src="<?php echo base_url(); ?>assets/jQuery/jquery-1.6.1.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/jQuery/fileuploader.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/jQuery/upload_promos.js" type="text/javascript"></script>

<title>Untitled Document</title>
</head>
<body>

	<div class="headerWrapper">
    	<div class="logo"></div>
        <div class="title">Portal Administrativo</div>
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
                        <li class="subMenuItem"><a href="">Otorgar Puntos</a></li>
                    </ul>
                </li>
                <li><img src="<?php echo base_url();?>assets/imgs/menu_sep.png"/></li>
                <li class="menuItem">
                	<a href="">Promociones</a>
                	<ul  class="subMenu">
                    	<li class="subMenuItem"><a href="">Lista de Promociones</a></li>
                        <li class="subMenuItem"><a href="">Nueva Promoción</a></li>
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
    </div>
    
    <div class="clear"></div>
    
     <?php echo form_open('promociones/add/'.$empresa) ?>
    <div class="contentWrapper">
    	<div class="leftContent">
        	<div class="subTitle">Nueva Promoci&oacute;n</div>
            <div class="clear"></div>
            <div class="inserts">
            	<label class="Lbl">Slogan:</label>
                <input type="text" class="smallTxt" id="Slogan" name="Slogan"/>
            </div>
            <div class="inserts">
            	<label class="Lbl">Descripci&oacute;n:</label>
                <input type="text" class="smallTxt" id="Descripcion" name="Descripcion"/>
            </div>
        	<div class="inserts">
            	<label class="Lbl">Puntos a Otrogar:</label>
                <input type="text" class="smallTxt" id="Puntos" name="Puntos"/>
            </div>
            <div class="inserts">
            	<label class="Lbl">Fecha Vencimiento:</label>
                <input type="text" class="smallTxt" id="Fecha" name="Fecha"/>
            </div>
        </div>
        <div class="rightContent">
        	<div class="clear"></div>
        	<div class="clear"></div>
            <div class="fotoInsert" style="margin-left:-250px; margin-top:-10px;">            
                <label class="fachadaTitle">Imagen:</label>
                <div class="fachadaImg" id="fachadaImg"></div>
                <input type="button" class="browseBttn" style="margin-left:490px;" id="imgUploadPro" value="Browse" 
                name="imgUploadPro"/>
        	</div>
            <input type="hidden" id="promoname" name="promoname" />
        </div>        
        <?php echo form_submit('guardar', 'Guardar', 'class="saveBttn"');?>
    </div>
	<?php echo form_close();?>
</body>
</html>
