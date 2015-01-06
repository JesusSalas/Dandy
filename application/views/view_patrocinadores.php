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
		background:transparent;
		margin: 0 0;
    }
</style>
</head>
	<div id="header_2" style="width:100%; margin-top:-200px; position:absolute; z-index:3;">
        	<img src="../../assets/imgs/registroBg.png" />
    </div>
	 <?php echo form_open('clientes/add/') ?>
        <div class="contentWrapper" style="width:507px; margin-top:200px;">
           <div class="subTitle" style="font-size:30px; height:30px;">Información Personal</div>
           <div class="clear" style="height:20px;"></div>
           <div class="inserts">
                    <label class="Lbl">Folio:</label>
                    <input type="text" class="smallTxt" id="Folio" name="Folio"/>
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
                    <label class="Lbl">E-mail:</label>
                    <input type="text" class="smallTxt" id="Correo" name="Correo"/>
           </div>
        </div>
        
        <?php echo form_submit('registrar', 'Registrar', 'class="saveBttn" style="margin-left:300px;" target="info"');?>
    <?php echo form_close();?>
</html>
