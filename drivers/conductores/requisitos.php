<?php

include_once("../../drivers/config/conexion.php");
include_once("../../drivers/config/sesion.php");

$email=$_SESSION["correo"];
$directorio_destino = "../../img/conductores/$email/requisitos/";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_FILES as $clave => $archivo) {
        $nombre_campo = $clave;
        $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
        $ruta_destino = $directorio_destino . $nombre_campo . "." . $extension;
        if (move_uploaded_file($archivo["tmp_name"], $ruta_destino)) {
            header("Location:../../pages/conductores/perfil.php");
        } else {
            header("Location:../../pages/conductores/perfil.php");
        }
    }
}

?>