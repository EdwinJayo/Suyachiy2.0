<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Registrarse</title>
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

<body>
    <!-- Navbar Start -->
    <?php
    include "../../inc/public/header.php";
    ?>
    <!-- Navbar End -->

    <!-- Registrarse Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h3>Registrarse</h3>
                    </div>
                    <div class="form-floating mb-3 required">
                        <input type="text" class="form-control" id="floatingText" placeholder="Ejm: Diego Andre">
                        <label for="floatingText">Nombres</label>
                    </div>
                    <div class="form-floating mb-3 required">
                        <input type="text" class="form-control" id="floatingText" placeholder="Ejm: Chipana Perales">
                        <label for="floatingText">Apellidos</label>
                    </div>
                    <div class="form-floating mb-3 date required"id="date1" data-target-input="nearest">
                        <input type="text" class="form-control p-4 datetimepicker-input"
                            placeholder="Dia/Mes/Año" data-target="#date1" data-toggle="datetimepicker" />
                        <label for="floatingText">Fecha de Nacimiento</label>
                    </div>
                    <div class="form-floating mb-3 required">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-4 required">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña">
                        <label for="floatingPassword">Contraseña</label>
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Registrarse</button>
                    <p class="text-center mb-0">¿Ya tienes una cuenta? <a href="loginConductor.php">Iniciar Sesion</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Registrarse End -->

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