<?php

session_start();

$redirect=$_GET['redirect'];

if($_SESSION['usuario']=="" ){

	if($redirect!="")

		header("Location: f_usuarios.php?redirect=$redirect");

	else

		include "f_usuarios.php";

	exit();

}

else

	echo"<script>window.location='menu.php';</script>";

?>