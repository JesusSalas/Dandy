<?php

session_start();

$_SESSION['usuario']==""; 

session_destroy();

echo "<script>parent.scrollTo(0,0)</script>";

echo"<script>parent.location='/';</script>";



?>