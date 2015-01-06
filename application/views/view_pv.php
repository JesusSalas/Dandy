<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
    <div id="client">
        <ul>
          <?php foreach($empresas as $emp): ?>
               <li>
                 <a href="<?php echo base_url() . 'index.php/index/selectOne?idEmpresa=' . $emp -> idEmpresa ?>" 
                 target="info" >
                 <img src="<?php echo base_url(). 'assets/logos/' . $emp->Logo;?>"/>
                 </a>
               </li>
          <?php endforeach; ?>
        </ul>
    </div>
</html>
