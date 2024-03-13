<?php

include_once("../../drivers/config/sesion.php");
include_once("../../drivers/config//conexion.php");


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo 'Error: El método de envío debe ser POST.';
    exit;
}

$email = $_SESSION['correo'];
$id=$_SESSION['id'];
$pass0 = $_POST['pass0'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

if ($pass1 == $pass2) {
    $consulta_pass="SELECT contraseña from usuarios WHERE email='$email'";
    $consulta_pass = mysqli_query($conexion, $consulta_pass);
    $consulta_pass = mysqli_fetch_array($consulta_pass);
    if (password_verify($pass0, $consulta_pass['contraseña'])) {
        $pass1 = password_hash($pass1, PASSWORD_BCRYPT);
        $consulta = "UPDATE usuarios SET contraseña='$pass1' WHERE id_usuario=$id and email='$email'";
        if (mysqli_query($conexion, $consulta)){
            header("Location: ../../pages/conductores/perfil.php");
            exit;
        }
    }
}
$_SESSION['error']="no se pudo cambiar la contraseña";
header("Location: ../../pages/conductores/perfil.php");

?>