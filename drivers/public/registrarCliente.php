<?php
include("../config/conexion.php");

session_start(); //inicia una nueva sesion o reaunuda la existente.
$_SESSION['login'] = false;

//declarando variables para recibir y guardar los datos enviados desde el formulario
$nombre     = $_POST["nombre"];             //LA PRIMERA ES LA VARIABLE, LA SEGUNDA DESPUES DEL POST, ES DONDE GUARDAMOS LOS DATOS
$apellidos  = $_POST["apellidos"];          //DEL FORMULARIO
$correo    = $_POST["correo"];
$password   = $_POST["contraseña"];

$passwordHash = password_hash($password, PASSWORD_BCRYPT); //BCRYPT es el algoritmo de encriptacion, devuelve una cadena de 60 caracteres
$fotoPerfil   = "img/clientes/$correo/perfil.jpg"; // ingresamos el nombre de la foto de perfil por defecto

//evaluamos si el nickname ingresado ya existe
$consultaId = "SELECT email FROM usuarios WHERE email='$correo' ";

$consultaId = mysqli_query($conexion, $consultaId);//devuelve un objeto con el resultado, false su hay error, true si se ejecuta
$consultaId = mysqli_fetch_array($consultaId);  //devuelve un array o NULL

if(!$consultaId){ //si la consulta esta vacia entonces significa que no existe el nickname, y creamos el nnuevo usuario

    $sql = "INSERT INTO usuarios (nombre, apellido, email, contraseña, tipo_usuario_id, foto_perfil, ubicacion_id)
    VALUES ('$nombre','$apellidos','$correo','$passwordHash',1,'$fotoPerfil',1)";
    
    //ejecutamos y verificamos si se guardaron los datos
    if (mysqli_query($conexion, $sql)){
        mkdir("../../img/clientes/$correo");//creamos una carpeta en imagenes para el cliente
        mkdir("../../img/clientes/$correo/galeria");
        copy("../../img/default.jpg", "../../img/clientes/$correo/perfil.jpg"); //copiamos nuestra foto por default

        $_SESSION['login']       = true;                //$_SESSION es una variable superglobal
        $_SESSION['correo']      = $correo;
        $_SESSION['nombre']      = $nombre;
        $_SESSION['apellidos']   = $apellidos;
        $_SESSION['fotoPerfil']  = $fotoPerfil;
        header('Location: ../../pages/clientes/index.php');
    }
    
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
}

else{
    echo "El Correo ya existe.";
    echo "<a href='../../pages/public/registroCliente.php' > Intentalo de nuevo. </a></div>";
}

//cerrando la conexion
mysqli_close($conexion);

?>