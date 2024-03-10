<?php
include("../config/conexion.php");

session_start(); //inicia una nueva sesion o reaunuda la existente.

//declarando variables para recibir y guardar los datos enviados desde el formulario
$origen   = $_POST["origen"];             //LA PRIMERA ES LA VARIABLE, LA SEGUNDA DESPUES DEL POST, ES DONDE GUARDAMOS LOS DATOS
$destino  = $_POST["destino"];          //DEL FORMULARIO
$fecha    = $_POST["fecha"];
$hora     = $_POST["hora"];
$precio   = $_POST["precio"];
$plazas   = $_POST["plazas"];
$id       = $_SESSION['id'];

$consulta5 = "SELECT * FROM ubicaciones WHERE ubicacion = '$origen'";
$consulta5 = mysqli_query($conexion, $consulta5);
$consulta5 = mysqli_fetch_array($consulta5);

$idOrigen = $consulta5['id_ubicacion'];      //id origen

$consulta6 = "SELECT * FROM ubicaciones WHERE ubicacion = '$destino'";
$consulta6 = mysqli_query($conexion, $consulta6);
$consulta6 = mysqli_fetch_array($consulta6);

$idDestino = $consulta6['id_ubicacion'];      //id destino

$sql = "INSERT INTO viajes (conductor_id, origen_id, destino_id, precio, plazas_disponibles, fecha_salida, hora, estado)
    VALUES ('$id','$idOrigen','$idDestino','$precio','$plazas','$fecha','$hora',1)";

//ejecutamos y verificamos si se guardaron los datos
if (mysqli_query($conexion, $sql)) {

    echo "Estableciste con exito tu viaje";
    echo "<br> <a href='../../pages/conductores/estadoRuta.php'>Ir a mis Viajes</a></div>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}

//cerrando la conexion
mysqli_close($conexion);
