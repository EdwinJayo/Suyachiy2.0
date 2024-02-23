<?php
    include("../config/conexion.php");

    session_start();
    $_SESSION = array();
    session_destroy();  //Finalmente, destruir la sesion
    header('Location: ../../pages/public/loginCliente.php');
    //echo $_SESSION['origen'] ;
?>