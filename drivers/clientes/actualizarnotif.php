<?php
include_once("../../drivers/config/sesion.php");
include_once("../../drivers/config//conexion.php");

$id=$_SESSION['id'];
$s1 = isset($_POST['s1']) ? 1 : 0;
$s2 = isset($_POST['s2']) ? 1 : 0;
$v1 = isset($_POST['v1']) ? 1 : 0;
$v2 = isset($_POST['v2']) ? 1 : 0;
$p1 = isset($_POST['p1']) ? 1 : 0;
$p2 = isset($_POST['p2']) ? 1 : 0;
$p3 = isset($_POST['p3']) ? 1 : 0;
$p4 = isset($_POST['p4']) ? 1 : 0;
$pl1 = isset($_POST['pl1']) ? 1 : 0;
$pl2 = isset($_POST['pl2']) ? 1 : 0;

$consulta="UPDATE notificaciones SET 
inicio_sesion=$s1, 
error_3=$s2,
confirmacion_viaje=$v1,
confirmacion_pago=$v2,
tendencia=$p1,
oferta=$p2,
novedades=$p3,
eventos=$p4,
actualizacion=$pl1,
noticias=$pl2 WHERE usuario_id=$id
";
if (mysqli_query($conexion, $consulta)) {
    header("Location:../../pages/clientes/administracion.php#notification");

}
else {
    $_SESSION['error']="no se pudo actualizar las preferencias de notificaciones";
    header("Location:../../pages/clientes/administracion.php#notification");
}
?>