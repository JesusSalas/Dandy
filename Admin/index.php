<?php


redirect("../index.php/welcome/adminBase");

	



function redirect( $url) 
	{
		echo "<script language=\"JavaScript\"> window.location='$url'; </script>";
	}
	

?>