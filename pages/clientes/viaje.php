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
    <link href="../../css/bootstrap/bootstrap.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">

    <!--Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .bg-image:hover{
            background-color: #f0f0f0;
            transform: scale(1.05);
            opacity: 0.9;
        }
        .agregar-imagen {
            width:150px;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .agregar-imagen:hover {
            background-color:#1190CB;
            color:white;
            opacity:0.7;
        }
        .bi-plus-circle{
            font-size:5rem;
            vertical-align:center;
        }
    </style>
</head>
<body>
<?php
    include_once("../../inc/clientes/header.php");
?> 
<br><br>
    <div class="container-fluid">
        <div class="row align-items-center">
            <?php
                $email=$_SESSION["correo"];
                $dir="../../img/clientes/$email/galeria";
                $imagenes = glob($dir . "/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
                foreach ($imagenes as $imagen) {
                    $nombre=pathinfo($imagen, PATHINFO_FILENAME);
            ?>
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <div class="bg-image hover-overlay ripple">
                    <img class="w-100 shadow-1-strong rounded mb-4" src="<?php echo $imagen; ?>" alt="Descripción de la imagen" data-bs-toggle="modal" data-bs-target="#<?php echo $nombre; ?>">
                    <a data-mdb-ripple-init href="#!">
                    <div class="mask" style="background-color: rgba(57, 192, 237, 0.2);"></div>
                    </a>
                </div>
            </div>
            <div class="modal fade " id="<?php echo $nombre;?>" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel"><?php echo $nombre;?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="<?php echo $imagen; ?>" class="img-fluid rounded mx-auto d-block" alt="formato incompatible">
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <div class="row">
                    <form action="../../drivers/clientes/guardargaleria.php" method="post" enctype="multipart/form-data">
                        <div class="col-12">
                            <label for="imagen" id="label-imagen">
                                <div class="bg-image agregar-imagen rounded" >
                                    <i class="bi bi-plus-circle"></i>
                                </div>
                            </label>
                            <input type="file" id="imagen" hidden name="imagen"></input>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary guardar" hidden>
                                <div class="bg-image agregar-imagen rounded">
                                    <i class="bi bi-floppy" style="font-size:3rem;"></i>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once("../../inc/clientes/footer.php"); 
?> 
<script>
    $("#imagen").change(function () {
        if ($(this).val() != "") {
            $(".guardar").removeAttr("hidden");
            $("#label-imagen").attr("hidden","hidden")
        } else {
            $(".guardar").attr("hidden", "hidden");
        }
    });
</script>
</body>
</html>