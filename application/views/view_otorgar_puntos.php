<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/admonStyles.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles.css" />

<title>Untitled Document</title>
<style>
	html{
		margin:0 0;
	}
	body{
		margin: 0 0;
    }
</style>
</head>
	
	<div class="headerWrapper">
    	<div class="logo"></div>
        <div class="title">Portal Administrativo</div>
        <?php foreach($empresa as $value):?>
        <?php if($value->idEmpresa == 1) { ?>
            <div class="menu">
                <ul class="menuFull">
                    <li><img src="<?php echo base_url();?>assets/imgs/menu_sep.png"/></li>
                    <li class="menuItem">
                        <a>Empresas</a>
                        <ul class="subMenu">
                            <li class="subMenuItem"><a href="">Lista de Empresas</a></li>
                            <li class="subMenuItem"><a href="">Nueva Empresa</a></li>
                        </ul>
                    </li>
                    <li><img src="<?php echo base_url();?>assets/imgs/menu_sep.png"/></li>
                    <li class="menuItem">
                        <a>Clientes</a>
                        <ul  class="subMenu">
                            <li class="subMenuItem"><a href="">Lista de Clientes</a></li>
                        </ul>
                    </li>
                    <li><img src="<?php echo base_url();?>assets/imgs/menu_sep.png"/></li>
                    <li class="menuItem">
                        <a>Promociones</a>
                        <ul  class="subMenu">
                            <li class="subMenuItem"><a href="">Lista de Promociones</a></li>                 
                        </ul>
                    </li>
                    <li><img src="<?php echo base_url();?>assets/imgs/menu_sep.png"/></li>
                    <li class="menuItem">
                        <a>Membresias</a>
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
                	<a>Empresas</a>
                	<ul class="subMenu">
                        <li class="subMenuItem"><a href="">Nueva Empresa</a></li>
                    </ul>
                </li>
                <li><img src="<?php echo base_url();?>assets/imgs/menu_sep.png"/></li>
                <li class="menuItem">
                	<a>Clientes</a>
                	<ul  class="subMenu">
                        <li class="subMenuItem"><?php echo anchor('puntos/index'. $value->idEmpresa, 'Otorgar Puntos'); ?></li>
                    </ul>
                </li>
                <li><img src="<?php echo base_url();?>assets/imgs/menu_sep.png"/></li>
                <li class="menuItem">
                	<a>Promociones</a>
                	<ul  class="subMenu">
                    	<li class="subMenuItem"><a href="">Lista de Promociones</a></li>
                        <li class="subMenuItem"><?php echo anchor('promociones/index/'. $value->idEmpresa,'Nueva Promoción'); ?></li>
                    </ul>
                </li>
            </ul>
        </div>
        <?php } ?>
        <?php endforeach; ?>   
    </div>
    
	<?php echo form_open('puntos/add/'.$empresa) ?>
        <div class="contentWrapper" style="width:1024px;">
           <div class="subTitle" style="font-size:30px; height:30px;">Otorgar Puntos</div>
           <div class="clear" style="height:20px;"></div>
           <div class="inserts" style="margin-left:auto; margin-right:auto;">
                    <label class="Lbl">Folio:</label>
                    <input type="text" class="smallTxt" id="Folio" name="Folio" style="width:300px;"/>
                    <button class="browseBttn" style="margin-left:10px; margin-top:3px; width:50px; float:left;">Buscar</button>
           </div>
           <div class="inserts" style="margin-left:auto; margin-right:auto;">
                    <label class="Lbl">Valida hasta:</label>
                    <!-- Aqui imprimir la fecha hasta la que será valida la tarjeta-->
                    <label class="Lbl" id="FechaVencimiento"></label>
           </div>
           <div class="inserts" style="margin-left:auto; margin-right:auto;">
                    <label class="Lbl">Nombre:</label>
                    <!-- Aqui imprimir el nombre del cliente-->
                    <label class="Lbl" id="Nombre"></label>
           </div>
           <div class="inserts" style="margin-left:auto; margin-right:auto;">
                    <label class="Lbl">Membresia:</label>
                     <!-- Aqui imprimir el tipo de membresia-->
                    <label class="Lbl" id="Membresia"></label>
           </div>
           <div class="inserts" style="margin-left:auto; margin-right:auto;">
                    <label class="Lbl">Puntos:</label>
                    <input type="text" class="smallTxt" id="Puntos" name="Puntos"/>
           </div>
        </div>
        
        <?php echo form_submit('otorgar', 'Otorgar', 'class="saveBttn" style="margin-left:330px;"');?>
        <?php echo form_submit('quitar', 'Quitar', 'class="saveBttn" style="margin-left:100px;"');?>
	<?php echo form_close();?>
</html>
