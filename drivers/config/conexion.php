<?php

include_once('db.php');

$host = HOST;
$user = USER;
$pass = PASS;
$db = DB;

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL:";
    die("connection failed: " . mysqli_connect_error());
}
else{
    echo "Conexion exitosa ";
}
?>