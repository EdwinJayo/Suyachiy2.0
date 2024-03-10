<?php

include_once("../../drivers/config/sesion.php");
include_once("../../drivers/config//conexion.php");


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo 'Error: El método de envío debe ser POST.';
    exit;
}

$email = $_SESSION['correo'];
$id=$_SESSION['id'];

$consulta = "DELETE FROM usuarios WHERE id_usuario=$id AND email='$email'";

if (mysqli_query($conexion, $consulta)){
    session_abort();
    header("Location: /suyachiy2.0");
}
else {
    reload();
}

?>