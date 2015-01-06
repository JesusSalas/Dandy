<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles.css" />

<!-- Script -->
<script src="<?php echo base_url()?>assets/jQuery/jquery-1.2.6.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/jQuery/actions.js" type="text/javascript"></script>

<title>Dandy</title>
</head>

<body>
	<div id="dBg">
    	<div id="mainBg">
        	<div id="logo"></div>
            <div id="header">
            	<div id="menuTop">
                	<ul id="menuTopList">
                    	<li><?php echo anchor('welcome' , 'HOME', 
							array('target' => 'info', 'style' => 'padding-left:120px')); ?></li>
                        <li><?php echo anchor('patrocinadores/index' , 'REGISTRATE', 
							array('target' => 'info', 'style' => 'padding-left:75px')); ?></li>
                		<li><?php echo anchor('patrocinadores/pv' , 'PUNTOS DE VENTA', 
							array('target' => 'info')); ?></li>
                		<li><?php echo anchor('welcome/about' , 'ACERCA DE', 
							array('target' => 'info', 'style' => 'padding-left:92px')); ?></li>
                        <li><?php echo anchor('welcome/contact' , 'CONTACTO', 
							array('target' => 'info', 'style' => 'padding-left:100px')); ?></li>
                    </ul>
                </div>
                <div id="vid">
                	<img src="<?php echo base_url();?>assets/imgs/vidBG.png" 
                    style="margin-left:24px; height:274px; width:456px; margin-top:4px"/>
                </div>
            </div>
            <div id="main">
            	<div id="menuCenter">
                	<ul id="menuCenterList">
                    	<?php foreach($categorias as $cat): ?>
                    		<li><?php echo anchor('index/select?idCategoria='. $cat->idCategoria , $cat->Nombre, 
							array('target' => 'info')); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div id="center">
                  <div id="clientContainer">
                    <iframe src="<?php echo base_url()?>index.php/welcome" 
                    name="info" scrolling="no" width="823px" height="657px" 
                    style="background-image:url(<?php echo base_url()?>assets/imgs/bg1.png)" >
                    </iframe>
                  </div>
                </div>
            </div>
            <div id="footer">© Copyright Dandy Co. 2012</div>
        </div>
    </div>
</body>
</html>
