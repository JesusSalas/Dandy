<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/Local.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/lugarStyles.css" />

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

	<div id="client" >
		<div id="header_2" style="width:100%; margin-top:0; position:absolute; z-index:3;">
        	<img src="../../assets/imgs/<?php echo $header; ?>" />
        </div>
        <div id="logo_inter">
        	<?php foreach($empresa as $emp):?>
        	<img src="../../assets/logos/<?php echo $emp -> Logo; ?>" />
            <?php endforeach; ?>
        </div>
        <div class="clear"></div>
      	<div class="container">
        	
            <div class="top">
            
            <?php foreach($empresa as $emp):?>
        	<img src="../../assets/fotos/<?php echo $emp -> Foto; ?>" />
            <?php endforeach; ?>
          
             <p><?php foreach($empresa as $emp):?>
        				<?php echo $emp -> Informacion; ?>
                <?php endforeach; ?>
             </p>
            </div>
             
             <div class="referencia">
             	<?php foreach($empresa as $emp):?>
        			<?php echo $emp -> Direccion;?>
           		<?php endforeach; ?>
                 <?php foreach($empresa as $emp):?>
        			</br><?php echo $emp -> Referencia;?>
           		<?php endforeach; ?>
               
             </div>  
              
             <div class="clear" style="height:10px;"></div>  
               
             <div class="middle">
                 <div class="datos">
                 		<div class="subtitle">Datos de Contacto</div> </br>
                        <?php foreach($empresa as $emp):?>
                        Tel: <?php echo $emp -> Telefono;?></br>
                        E-mail: <?php echo $emp -> Contacto;?>
                        <?php if($emp -> Web != Null || $emp -> Web != "") { ?>
                        	Web: <?php echo $emp -> Web;?>
                         <?php } ?></br>
                        <?php endforeach; ?>
                        <div class="facebook">
                        	<?php foreach($empresa as $emp):?>
                            	<?php if($emp -> FaceBook != Null || $emp -> FaceBook != "") { ?>
                                
        						<a href="<?php echo $emp -> FaceBook;?>" target="_blank">
                                </br>
                                	<img style="width:30px; height:30px; border:none !important;" src="../../assets/imgs/fbBttn.png"/>
                                </a>
                                <?php } ?>
           					<?php endforeach; ?>
                        </div>
                        </br></br>
                        <div class="subtitle">Horario de Servicio</div>
                        
                        <?php foreach($empresa as $emp):?>
                        	<?php echo $emp -> Horario;?>
                        <?php endforeach; ?>
                 </div>
                 <div class="derecha">
                 		<div class="subtitle">Precios y Servicios</div>
                        <?php foreach($empresa as $emp):?>
        					<?php echo $emp -> Menu;?>
           				<?php endforeach; ?> </br>  </br> </br>
                        <div class="subtitle" style="float:left; width:30px; height:200px; background:url(../../assets/imgs/comoLlegar.png) no-repeat; margin-top:16px; padding-left:0px; padding-top:0px;"></div> </br>
                 	    <div class="mapa">
                 			<?php foreach($empresa as $emp):?>
        						<?php echo $emp -> Mapa;?>
           					<?php endforeach; ?>
                 		</div>
                 </div>
			</div>
            
            <div class="bottom">
            	<div class="subtitle">
                	Promociones
                </div>
                
                <div class="promocionesImg">
               		<img src="../../assets/imgs/distCard.png"/>
                </div>
                <div class="promocionesTxt">
               
                </div>
            </div>

        </div>
    </div>

</html>