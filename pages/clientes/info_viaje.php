<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Reservar</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="../../css/cliente.css">
    <link href="../../css/style.css" rel="stylesheet">

    <!--Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
<?php
        include_once('../../inc/clientes/header.php');
    ?>

    <br><br><br><br>

    <!-- Contenidos Start-->
    <div class="container-fluid booking mt-5 pb-4">
        <div class="container pb-5">
            <div class="bg-light shadow row" style="padding: 0px; border-radius: 10px;">
                <div class="col-xs-12 col-sm-5">
                    <div class="fotoCiudad">
                        <img src="../../img/ciudad.jpg" class="rounded ">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 flecha">
                    <div class="fotoAuto">
                        <img src="../../img/miban.jpg" class="rounded ">
                    </div><br>
                    <i class="bi bi-arrow-right-square-fill"></i>
                </div>
                <div class="col-xs-12 col-sm-5">
                    <div class="fotoCiudad">
                        <img src="../../img/ciudad.jpg" class="rounded">
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-4 my-4">
                    <div style="font-family: 'Courier New', Courier, monospace;">
                        <h6>conductor: Chipana</h6>
                        <h6>origen/destino</h6>
                        <h6>fecha/hora salida</h6>
                        <h6>duración de viaje</h6>
                        <h6>lugar de salida</h6>
                        <h6>modelo de vehículo</h6>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4" style="font-size: 2rem;font-family: 'Courier New', Courier, monospace;">
                    <div style="text-align: center;">
                        <div>
                            <span>S/.</span>
                        </div>
                        <p>100.00</p>
                    </div>
                    <div class="calificacion" style="text-align: center;">
                        <div class="rating">
                            <i class="bi bi-star-fill star"></i>
                            <i class="bi bi-star-fill star"></i>
                            <i class="bi bi-star-fill star"></i>
                            <i class="bi bi-star-fill star"></i>
                            <i class="bi bi-star-fill star1"></i>
                        </div>  
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <a href=""><br><h6>Paga con:</h6><img src="../../img/yape.jpg" alt="" class="fotoyape"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Contenidos End-->

    <?php
        include_once('../../inc/clientes/footer.php');
    ?>
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>
    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../../lib/easing/easing.min.js"></script>
    <script src="../../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../../js/jqBootstrapValidation.min.js"></script>
    <script src="../../js/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../../js/main.js"></script>
</body>
</html>