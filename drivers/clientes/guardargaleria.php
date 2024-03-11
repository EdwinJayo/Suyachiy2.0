<?php

include_once("../../drivers/config/sesion.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo 'Error: El método de envío debe ser POST.';
  exit;
}


foreach ($_FILES as $campo => $archivo) {
    echo "hola";
    echo "Campo: $campo<br>";
    foreach ($archivo as $key => $value) {
        echo "$key: $value<br>";
    }
    echo "<br>";
}
/*
$filename = $tmp_name . '.' . pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);

$upload_dir = "../../img/clientes/$email/galeria";
move_uploaded_file($tmp_name, $upload_dir . $filename);
*/


?>