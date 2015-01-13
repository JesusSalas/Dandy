<?php

	$enlace = mysql_connect('localhost', 'dandy160_app', 'mydandy160');
	mysql_set_charset('UTF8',$enlace);

	if (!$enlace) { 

    die('Could not connect: ' . mysql_error()); 

	} 



	mysql_select_db("dandy160_dandy") or die("No pudo seleccionarse la BD.");

?>

