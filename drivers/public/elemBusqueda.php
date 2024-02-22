<?php
    include("../config/conexion.php");

    session_start();
    $fecha   = $_POST["fecha"];           //LA PRIMERA ES LA VARIABLE, LA SEGUNDA DESPUES DEL POST, ES DONDE GUARDAMOS LOS DATOS
    $origen  = $_POST["origen"];
    $destino  = $_POST["destino"];

    $_SESSION['origen']      = $origen;
    $_SESSION['destino']     = $destino;
    $_SESSION['fecha']       = $fecha;

    echo "$origen $destino $fecha";
?>