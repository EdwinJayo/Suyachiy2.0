<?php
    include_once("../../drivers/config/sesion.php");
    include_once("../../drivers/config//conexion.php");
?>  

<!doctype html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Álbum</title>
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
    <link href="../../css/bootstrap/bootstrap.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">

    <!--Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .card-img-top {
            max-height: 250px;
            overflow: hidden;
        }

        .card-title a:link {
            font-size: 30px;
            background-color: transparent;
            color: #000000;
            text-decoration: none;
        }

        .card-title a:hover {
            color: red;
            background-color: transparent;
            text-decoration: underline;
        }
    </style>
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
</head>
<body oncontextmenu='return false' class='snippet-body'>
<?php
    include_once("../../inc/clientes/header.php");
    ?> 
    <section class="bg-light py-4 my-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-3 text-primary">Recuerda los lugares que visitaste</h2>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card my-3">
                        <img src="https://images.pexels.com/photos/325185/pexels-photo-325185.jpeg" class="card-image-top" alt="thumbnail">
                        <div class="card-body">
                            <h3 class="card-title"><a href="#" class="text-secondary">What is HTML</a></h3>
                            <p class="card-text">HTML stands for Hyper Text Markup Language, It helps to learn web development and designing. </p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card my-3">
                        <img src="https://images.pexels.com/photos/3848158/pexels-photo-3848158.jpeg" class="card-image-top" alt="thumbnail">
                        <div class="card-body">
                            <h3 class="card-title"><a href="#" class="text-secondary">Why We Use HTML</a></h3>
                            <p class="card-text">We use HTML to make website and that website helps to gain very much knowledge.Pellentesque dictum consequat tincidunt. Sed tincidunt tortor nec vulputate gravida.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card my-3">
                        <img src="https://images.pexels.com/photos/2343170/pexels-photo-2343170.jpeg" class="card-image-top" alt="thumbnail">
                        <div class="card-body">
                            <h3 class="card-title"><a href="#" class="text-secondary">Where do people came from?</a></h3>
                            <p class="card-text">Pellentesque dictum consequat tincidunt. Sed tincidunt tortor nec vulputate gravida. Nam sapien nisi, malesuada at sapien suscipit,</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card my-3">
                        <img src="https://images.pexels.com/photos/1519088/pexels-photo-1519088.jpeg" class="card-image-top" alt="thumbnail">
                        <div class="card-body">
                            <h3 class="card-title"><a href="#" class="text-secondary">What is Lorem Ipsum?</a></h3>
                            <p class="card-text">Pellentesque dictum consequat tincidunt. Sed tincidunt tortor nec vulputate gravida. Nam sapien nisi, malesuada at sapien suscipit.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        include_once("../../inc/clientes/footer.php"); 
    ?> 
</body>
</html>