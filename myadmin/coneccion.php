<?
	$enlace = mysql_connect('localhost', 'dandy160_app', 'mydandy160');
	if (!$enlace) { 
    die('Could not connect: ' . mysql_error()); 
	} 

	mysql_select_db("dandy160_Dandy") or die("No pudo seleccionarse la BD.");
?>
