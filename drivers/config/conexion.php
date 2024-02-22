<?php
//declarando variables para la conexion
include_once('db.php');

$host = HOST;
$user = USER;
$pass = PASS;
$db = DB;

//creando la conexion
$conexion = new mysqli($host, $user, $pass, $db);

//verificando la conexion
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL <br>";
    die("connection failed: " . mysqli_connect_error());
}
else{
    //echo "Conexion exitosa ";
}
?>