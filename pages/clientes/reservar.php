<?php
include("../../drivers/config/conexion.php");
include("../../drivers/config/sesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>PAGO</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link rel="stylesheet" href="../../css/cliente.css">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">

    <!--Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body{
    background:#eee;
}
.gradient-brand-color {
    background-image: -webkit-linear-gradient(0deg, #376be6 0%, #6470ef 100%);
    background-image: -ms-linear-gradient(0deg, #376be6 0%, #6470ef 100%);
    color: #fff;
}
.contact-info__wrapper {
    overflow: hidden;
    border-radius: .625rem .625rem 0 0
}

@media (min-width: 1024px) {
    .contact-info__wrapper {
        border-radius: 0 .625rem .625rem 0;
        padding: 5rem !important
    }
}
.contact-info__list span.position-absolute {
    left: 0
}
.z-index-101 {
    z-index: 101;
}
.list-style--none {
    list-style: none;
}
.contact__wrapper {
    background-color: #fff;
    border-radius: 0 0 .625rem .625rem
}

@media (min-width: 1024px) {
    .contact__wrapper {
        border-radius: .625rem 0 .625rem .625rem
    }
}
@media (min-width: 1024px) {
    .contact-form__wrapper {
        padding: 5rem !important
    }
}
.shadow-lg, .shadow-lg--on-hover:hover {
    box-shadow: 0 1rem 3rem rgba(132,138,163,0.1) !important;
}
    </style>

</head>
<body>
    <?php
    include "../../inc/clientes/header.php";
    $id_viaje=$_GET['id'];
    ?>
<br><br><br>
<div class="container">
    <div class="contact__wrapper shadow-lg mt-n9">
        <div class="row no-gutters">
            <div class="col-lg-5 contact-info__wrapper gradient-brand-color p-5 order-lg-2">
    
                <ul class="contact-info__list list-style--none position-relative z-index-101">
                    <li class="mb-4 pl-4">
                        <span class="position-absolute"><i class="fas fa-envelope"></i></span> support@bootdey.com
                    </li>
                    <li class="mb-4 pl-4">
                        <a type="button" class="btn btn-danger rounded" href="../../drivers/clientes/pagar.php?idviaje=<?php echo $id_viaje?>">PAGAR</a>
                    </li>
                </ul>
    
                
            </div>
    
            <div class="col-lg-7 contact-form__wrapper p-5 order-lg-1">
            <h3 class="color--white mb-5">Escanea el código QR</h3>
            <div>
                <?php
                    
                    $consulta="SELECT usuarios.email from usuarios inner join viajes on usuarios.id_usuario=viajes.conductor_id where viajes.id_viaje=$id_viaje";
                    $consulta=mysqli_query($conexion,$consulta);
                    $consulta=mysqli_fetch_array($consulta);
                    $email=$consulta["email"];
                    $dir="../../img/conductores/$email/billetera";
                    $imagenes = glob($dir . "/*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);
                    foreach ($imagenes as $imagen) {
                        $nombre=pathinfo($imagen, PATHINFO_FILENAME);
                ?>
                <img src="<?php echo $imagen; ?>" alt="no hay método de pago" height="300px" width="300px">
                <?php
                }
            ?>
            </div>
            </div>
    
        </div>
    </div>
</div>
<br><br><br>
    <?php
    include "../../inc/clientes/footer.php";
    ?>
</body>
</html>