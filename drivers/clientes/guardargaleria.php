<?php

include_once("../../drivers/config/conexion.php");
include_once("../../drivers/config/sesion.php");

$email=$_SESSION["correo"];
$directorio_destino = "../../img/clientes/$email/galeria/";
print_r($_FILES);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_FILES as $clave => $archivo) {
        $nombre_archivo = $archivo['name'];
        $ruta_destino = $directorio_destino . $nombre_archivo;
        if (move_uploaded_file($archivo["tmp_name"], $ruta_destino)) {
            header("Location:../../pages/clientes/viajes.php");
        } else {
            header("Location:../../pages/clientes/viajes.php");
        }
    }
}

?>