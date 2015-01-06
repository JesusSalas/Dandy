<?php
session_start();
include "SimpleImage.php";

$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
$extension = end(explode(".", $_FILES["userfile"]["name"]));

//identifica si el llamado es desde una nueva empresa o del cambio de una empresa
if($_GET['es_nueva']=="true"){
	$idEmpresa = $_SESSION['id_n_emp'];
	$count = $_SESSION['count_nueva'];
} else {
	$idEmpresa = $_SESSION['id_c_emp'];
	$count = $_SESSION['count'];
}
	
if( in_array($extension, $allowedExts) ){

	
	if($count=="" )	$count=1;
	else $count++;

	
	$uploadfileGrande = '/'.$_GET['folder'].'/grande_'.$idEmpresa;
	$uploadfileGrande.='_'.$count.'.'.$extension; // agregando consecutivo


	$uploadfile = '/'.$_GET['folder'].'/chica_'.$idEmpresa;
	$uploadfile.='_'.$count.'.'.$extension; // agregando consecutivo
	$image = new SimpleImage();
	$image->load($_FILES["userfile"]["tmp_name"]); //es el request
	
	if(($image->getHeight() > intval($_GET['heigth']))==1){
	  $image->resizeToHeight($_GET['heigth']);
	}
	move_uploaded_file($_FILES["userfile"]["tmp_name"], '..'.$uploadfileGrande);
	$image->save('..'.$uploadfile);
	
	if($_GET['es_nueva']=="true"){
		$_SESSION['count_nueva'] = $count;
	} else {
		$_SESSION['count'] = $count;
	}



	echo $idEmpresa.'_'.$count.'.'.$extension.'|'. $uploadfile;

}