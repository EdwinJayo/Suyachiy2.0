<?php

session_start();
$login = $_SESSION['login'];

if (!$login){
    header('Location: ../../pages/public/index.php');
}

else{
    $correo = $_SESSION['correo'];
}
?>