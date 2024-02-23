<?php
    include("../config/conexion.php");

    session_start();
          
    $_SESSION['origen']      = $_POST["origen"];    //LA PRIMERA ES LA VARIABLE, LA SEGUNDA DESPUES DEL POST, ES DONDE GUARDAMOS LOS DATOS
    $_SESSION['destino']     = $_POST["destino"];
    $_SESSION['fecha']       = $_POST["fecha"];  
    header('Location: ../../pages/public/busqueda.php');
    //echo $_SESSION['origen'] ;
?>