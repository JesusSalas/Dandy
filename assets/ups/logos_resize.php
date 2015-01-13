<?php
session_start();
include "SimpleImage.php";
//echo 'count: '.$_SESSION['count'];
$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
$extension = end(explode(".", $_FILES["userfile"]["name"]));


//identifica si el llamado es desde una nueva empresa o del cambio de una empresa
if($_GET['es_nueva']=="true")
	$idEmpresa = $_SESSION['id_n_emp'];
else
	$idEmpresa = $_SESSION['id_c_emp'];

if( in_array($extension, $allowedExts) ){
	$uploadfile = '/'.$_GET['folder'].'/imagen'.$_GET['nombre'].'_'.$idEmpresa;
	
	if($_SESSION['count']=="" && $_GET['nombre']=="Menu"){
		$_SESSION['count']+=1;
		$uploadfile.='_'.$_SESSION['count'].'.'.$extension;
	} else if($_GET['nombre']=="Menu"){
		$_SESSION['count']++;
		$uploadfile.='_'.$_SESSION['count'].'.'.$extension;
	} else {
		$uploadfile.='.'.$extension;
	}
	
	$image = new SimpleImage();
	$image->load($_FILES["userfile"]["tmp_name"]); //es el request
	
	if(($image->getHeight() > intval($_GET['heigth']))==1){
	  $image->resizeToHeight($_GET['heigth']);
	}
	$image->save('..'.$uploadfile);
	
	echo $uploadfile;
	exit():
	

}



//------------LO ANTERIOR

/*
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo $uploadfile;
} else {
  // WARNING! DO NOT USE "FALSE" STRING AS A RESPONSE!
  // Otherwise onSubmit event will not be fired
  echo "error";
}
*/