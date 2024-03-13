<?php

include("../../drivers/config/conexion.php");
include("../../drivers/config/sesion.php");

$idviaje=$_GET['idviaje'];
$idpasajero=$_SESSION['id'];
$consulta="INSERT INTO  reservas (pasajero_id,viaje_id,fecha_reserva,estado_reserva) values ($idpasajero,$idviaje,NOW(),'Pendiente')";
$consulta=mysqli_query($conexion,$consulta);
header("Location: ../../pages/clientes/reservas.php");
?>