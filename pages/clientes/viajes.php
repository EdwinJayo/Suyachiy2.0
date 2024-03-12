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

        .btn123 {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn123:hover {
            background-color: #f0f0f0;
            transform: scale(1.05);
            opacity: 0.9;
        }
    </style>
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
</head>
<body oncontextmenu='return false' class='snippet-body'>
<?php
    include_once("../../inc/clientes/header.php");
    $id=$_SESSION['id'];
    $consulta="SELECT 
    v.fecha_salida as fs, 
    u.ubicacion as ub,u.foto as f 
    FROM reservas as r INNER JOIN viajes as v 
    ON r.viaje_id=v.id_viaje 
    INNER JOIN ubicaciones as u 
    ON v.destino_id=u.id_ubicacion 
    WHERE r.pasajero_id=$id";
    $consulta=mysqli_query($conexion,$consulta);
    ?> 
    <section class="bg-light py-4 my-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-3 text-primary">Recuerda los lugares que visitaste</h2>
                </div>
                <?php
                    while($row=mysqli_fetch_array($consulta)){
                ?>
                <div class="col-md-6 col-lg-4">
                    <a href="viaje.php">
                        <div class="card my-3 btn123">
                        <img src="../../<?php echo $row['f']; ?>" class="card-img-top" alt="ciudad sin foto">
                            <div class="card-body">
                                <h3 class="card-title text-primary"><?php echo $row["ub"]; ?></h3>
                                <p class="card-text">
                                    <?php echo $row["fs"]; ?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>
    <?php
        include_once("../../inc/clientes/footer.php"); 
    ?> 
</body>
</html>