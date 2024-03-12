<?php
include_once("../../drivers/config/sesion.php");
include_once("../../drivers/config//conexion.php");
$email= $_SESSION['correo'];
$calificacion= $_GET['calificacion'];
$com= $_GET['com'];
$ic= $_GET['c'];
$ip= $_SESSION['id'];
$v= $_GET['v'];
$cc= $_GET['cc'];
if ($calificacion>5){
    $calificacion=5;
}
if ($calificacion<0){ 
    $calificacion= 0; 
}

$consulta="SELECT * from reservas where id_reserva=$v";
$datos=mysqli_query($conexion,$consulta);
    if ($fila = mysqli_fetch_array($datos) and $cc!=0){
        $consulta = "UPDATE calificaciones_conductores SET calificacion_conductor=$calificacion,comentario_conductor='$com' WHERE id_calificacion_conductor=$cc";
        if (mysqli_query($conexion, $consulta)){
            header('Location: reservas.php');
        }
        else{
            header('Location: reservas.php');
        }
    }
    else{
        $consulta = "INSERT INTO calificaciones_conductores (conductor_id,pasajero_id,calificacion_conductor,comentario_conductor) VALUES ($ic,$ip,$calificacion,'$com')";
        if (mysqli_query($conexion, $consulta)){
            header('Location: reservas.php');
        }
        else{
            header('Location: reservas.php');
        }
    }
    
?>