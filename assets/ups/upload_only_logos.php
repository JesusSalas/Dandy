<?php
session_start();
$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
$extension = end(explode(".", $_FILES["userfile"]["name"]));

//identifica si el llamado es desde una nueva empresa o del cambio de una empresa
if($_GET['es_nueva']=="true")
	$idEmpresa = $_SESSION['id_n_emp'];
else
	$idEmpresa = $_SESSION['id_c_emp'];
	
if (in_array($extension, $allowedExts))
  {
  $uploadfile = '/'.$_GET['folder'].'/imagen'.$_GET['nombre'].'_'.$idEmpresa.'.'.$extension;
      move_uploaded_file($_FILES["userfile"]["tmp_name"], '..'.$uploadfile);
      echo $uploadfile;
  }
else
  {
  echo "Invalid file";
  }

?>