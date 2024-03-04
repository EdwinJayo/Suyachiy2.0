<?php
include("../config/conexion.php");

session_start(); //inicia una nueva sesion o reaunuda la existente.
$_SESSION['login'] = false;

$correo   = $_POST["correo"];           //LA PRIMERA ES LA VARIABLE, LA SEGUNDA DESPUES DEL POST, ES DONDE GUARDAMOS LOS DATOS
$password   = $_POST["contraseña"];         //DEL FORMULARIO

//evaluamos el correo ingresado
$consulta = "SELECT * FROM usuarios WHERE email = '$correo'";
$consulta = mysqli_query($conexion, $consulta); //ejecutamos la consulta
$consulta = mysqli_fetch_array($consulta);

if ($consulta) {
    if (password_verify($password, $consulta['contraseña'])) {

        if ($consulta['tipo_usuario_id'] == 1) {        //para comparar si es un usuario cliente
            
            $_SESSION['login']       = true;                //$_SESSION es una variable superglobal
            $_SESSION['id']          = $consulta['id_usuario'];
            $_SESSION['correo']      = $consulta['email'];
            $_SESSION['nombre']      = $consulta['nombre'];
            $_SESSION['apellidos']   = $consulta['apellido'];
            $_SESSION['fotoPerfil']  = $consulta['foto_perfil'];

            header('Location: ../../pages/clientes/index.php'); //Redireccionar a la pagina home de clientes
        }

        else{
            echo "la cuenta ingresada es de conductor, porfavor ingrese de cliente";
            echo "<br><a href='../../pages/public/loginCliente.php' >Intentalo de nuevo <a/></div>"; 
        }
    } 
    
    else {
        echo "Contraseña incorrecta";
        echo "<br><a href='../../pages/public/loginCliente.php' >Intentalo de nuevo <a/></div>";
    }
} else {  // si la consulta esta vacia entonces significa que no existe el nickname
    echo "El usuario no existe";
    echo "<br><a href='../../pages/public/loginCliente.php' >Intentalo de nuevoo <a/></div>";
}

//cerrando la conexion
mysqli_close($conexion);
