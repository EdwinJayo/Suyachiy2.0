<?php

session_start();            // inicia una nueva sesion o reanuda la existente
$login = $_SESSION['login'];

if (!$login){
    header('Location: ../../pages/public/index.php');
}

else{
    $correo = $_SESSION['correo'];      // no es estrictamente necesario, pero nos facilita el codigo mas adelante
}
?>