<?php
    include_once("../../drivers/config/sesion.php");
    include_once("../../drivers/config//conexion.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo 'Error: El método de envío debe ser POST.';
  exit;
}
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$id=$_SESSION['id'];

$consulta = "UPDATE usuarios SET nombre='$nombre',apellido='$apellido',email='$email' WHERE id_usuario=$id";
if (mysqli_query($conexion, $consulta)){
    $consulta = "SELECT nombre,apellido,email FROM usuarios WHERE email = '$email'";
    $consulta = mysqli_query($conexion, $consulta);
    $consulta = mysqli_fetch_array($consulta);
    $_SESSION['correo']      = $consulta['email'];
    $_SESSION['nombre']      = $consulta['nombre'];
    $_SESSION['apellidos']   = $consulta['apellido'];
    header('Location: ../../pages/conductores/perfil.php');
}
else{
    header('Location: ../../pages/conductores/perfil.php');
}

?>