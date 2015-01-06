<?php

$uploaddir = '../promos/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

//echo $uploadfile;

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo $uploadfile;
} else {
  // WARNING! DO NOT USE "FALSE" STRING AS A RESPONSE!
  // Otherwise onSubmit event will not be fired
  echo "error";
}

