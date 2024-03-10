<?php
include("../../drivers/config//conexion.php");
include_once("../../drivers/config/sesion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Nosotros - Suyachiy</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link rel="stylesheet" href="../../css/public.css">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../css/bootstrap/bootstrap.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">

    <!--Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- Navbar Start -->
    <?php
    include "../../inc/conductores/header.php";
    ?>
    <!-- Navbar End -->

    <!-- Nosotros Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="../../img/nosotros.jpeg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Sobre Nosotros</h6>
                        <h1 class="mb-3">Ofrecemos reservaciones de pasajes de vehiculos terrestres a losmejores precios</h1>
                        <p>Reserva tu viaje con nosotros y disfruta de la mejor experiencia. Encontraras pasajes para buses, 
                            autos y minibans a destinos interprovinciales, con los mejores precios y la mejor atención. 
                            Puedes reservar online por nuestro sitio web. ¡Reserva tu viaje YAA!</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid" src="../../img/about-1.jpg" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="../../img/about-2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br>
    <!-- Nosotros End -->

    <!-- Feature Start -->
    <div class="container-fluid pb-5">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Precios razonables</h5>
                            <p class="m-0">Los precio se reducen a un 15% en feriados nacionales</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Los mejores servicios</h5>
                            <p class="m-0">Ofrecemos mejores servicios con conductores excelentes</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-globe text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Cobertura nacional</h5>
                            <p class="m-0">Viajes a todas las provincias del Perú</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Testimonio</h6>
                <h1>Que dicen nuestros clientes</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="text-center pb-4">
                    <img class="img-fluid mx-auto" src="../../img/persona1.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text bg-white p-4 mt-n5">
                        <p class="mt-5">He estado realizando reservaciones de pasajes de este sitio web durante años 
                            y siempre he estado satisfecho con la empresa "Suyachiy".
                        </p>
                        <h5 class="text-truncate">Juanito</h5>
                        <span>huamanga</span>
                    </div>
                </div>
                <div class="text-center">
                    <img class="img-fluid mx-auto" src="../../img/persona2.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text bg-white p-4 mt-n5">
                        <p class="mt-5">El servicio al cliente de esta empresa es excelente. 
                            Siempre están dispuestos a ayudar y responder a mis preguntas.
                        </p>
                        <h5 class="text-truncate">Gabrielita</h5>
                        <span>Huanta</span>
                    </div>
                </div>
                <div class="text-center">
                    <img class="img-fluid mx-auto" src="../../img/persona3.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text bg-white p-4 mt-n5">
                        <p class="mt-5">Esta empresa ofrece una variedad de servicios a precios competitivos
                        </p>
                        <h5 class="text-truncate">Pedrito</h5>
                        <span>Huancayo</span>
                    </div>
                </div>
                <div class="text-center">
                    <img class="img-fluid mx-auto" src="../../img/persona4.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text bg-white p-4 mt-n5">
                        <p class="mt-5">"Estoy muy impresionado con el compromiso de esta empresa con la innovación y la mejora continua.
                        </p>
                        <h5 class="text-truncate">Gabriel</h5>
                        <span>Lima</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Footer Start -->
    <?php
    include "../../inc/public/footer.php";
    ?>
    <!-- Footer End -->
</body>

</html>