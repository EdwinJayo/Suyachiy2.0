<?php
include("../../drivers/config//conexion.php");
include_once("../../drivers/config/sesion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Preguntas Frecuentes</title>
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

    <!-- PreguntasFrecuentes Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Preguntas Frecuentes</h6>
                <h1>Resuelve sus dudas o sus problemas</h1>
            </div>
            <div class="row justify-content-center" style="text-align: center;">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="accordion" >
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed btn btn-primary py-3 px-4" style="width: 100%;" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                                            aria-controls="panelsStayOpen-collapseOne">
                                            ¿Cómo puedo realizar una reserva de pasajes a través de la aplicación?
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                        Puede realizar una reserva de pasajes seleccionando la ruta deseada, la fecha y hora del viaje, 
                                        y el tipo de vehículo que prefiera. Luego, simplemente siga los pasos para completar el proceso de 
                                        reserva y realizar el pago.
                                        </div><br>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed btn btn-primary py-3 px-4" style="width: 100%;" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo"
                                            aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                            ¿Es seguro ingresar mis datos de pago en la aplicación?
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                        Por supuesto que sí, nuestra aplicación utiliza medidas de seguridad avanzadas para proteger 
                                        la información de pago de nuestros clientes. Utilizamos encriptación SSL para garantizar que 
                                        sus datos estén protegidos en todo momento.
                                        </div><br>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed btn btn-primary py-3 px-4" style="width: 100%;" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree"
                                            aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                            ¿Puedo cancelar o modificar una reserva existente a través de la aplicación?
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                        Sí, puede cancelar o modificar su reserva existente a través de la aplicación, 
                                        siempre y cuando lo haga dentro del plazo establecido por nuestra política de cancelación. 
                                        Consulte los detalles de cancelación y modificación en la sección correspondiente de la aplicación o
                                        contactenos via telefono o Email para poder ayudarlo.
                                        </div><br>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed btn btn-primary py-3 px-4" style="width: 100%;" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour"
                                            aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                                            ¿Cómo puedo recibir mi boleto después de realizar una reserva?
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                        Después de realizar una reserva exitosa, recibirá su boleto electrónico en la dirección de correo electrónico 
                                        proporcionada durante el proceso de reserva. También puede confirmar su boleto a través de la sección 
                                        de "Mis reservas" en la aplicación.
                                        </div><br>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed btn btn-primary py-3 px-4" style="width: 100%;" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive"
                                            aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                                            ¿Qué debo hacer si tengo algún problema durante el proceso de reserva?
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                        Si encuentra algún problema durante el proceso de reserva, no dude en ponerse en contacto con nuestro equipo 
                                        de soporte o atención al cliente. Estamos disponibles para ayudarlo las 24 horas del día, 
                                        los 7 días de la semana, y haremos todo lo posible para resolver cualquier problema que pueda surgir.
                                        </div><br>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed btn btn-primary py-3 px-4" style="width: 100%;" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix"
                                            aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
                                            ¿Puedo obtener un reembolso si no puedo viajar en la fecha programada?
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                        Los reembolsos están sujetos a nuestra política de cancelación. Si cancela su reserva dentro del plazo especificado 
                                        por nuestra política, puede ser elegible para un reembolso según las condiciones establecidas. 
                                        Le recomendamos revisar nuestra política de cancelación para obtener más detalles.
                                        </div><br>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed btn btn-primary py-3 px-4" style="width: 100%;" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven"
                                            aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven">
                                            ¿Ofrecen opciones de asientos reservados o asignados?
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                        Sí, en algunos casos ofrecemos la opción de seleccionar asientos específicos durante el proceso 
                                        de reserva, sujeto a disponibilidad y políticas de la empresa de transporte y disponibilidad
                                        del conductor.
                                        </div><br>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed btn btn-primary py-3 px-4" style="width: 100%;" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEight"
                                            aria-expanded="false" aria-controls="panelsStayOpen-collapseEight">
                                            ¿Qué debo hacer si necesito hacer cambios en mi reserva después de haberla confirmado?
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                        Si necesita hacer cambios en su reserva después de confirmarla, 
                                        como cambiar de ruta o la hora, le recomendamos que se comunique con nuestro servicio de soporte y 
                                        atención al cliente lo antes posible. Dependiendo de la disponibilidad y nuestras políticas 
                                        de modificación, haremos todo lo posible para ayudarlo con su solicitud.
                                        </div><br>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed btn btn-primary py-3 px-4" style="width: 100%;" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseNine"
                                            aria-expanded="false" aria-controls="panelsStayOpen-collapseNine">
                                            ¿Cómo puedo asegurarme de que mi reserva se ha realizado correctamente?
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseNine" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                        Después de completar el proceso de reserva, recibirá una confirmación por correo electrónico que incluirá 
                                        todos los detalles de su reserva, como la ruta, la fecha y la hora del viaje, 
                                        así como la información del pasajero. Si tiene alguna inquietud sobre la validez de su reserva, 
                                        puede verificarla en la sección de "Mis reservas" dentro de la aplicación.
                                        </div><br>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed btn btn-primary py-3 px-4" style="width: 100%;" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTen"
                                            aria-expanded="false" aria-controls="panelsStayOpen-collapseTen">
                                            ¿Qué opciones de pago están disponibles en la aplicación?
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseTen" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                        Por ahora ofrecemos solo 2 opciones de pago, que es pago por el aplicativo YAPE y paypal, proximamente 
                                        se estara implementando otras formas de pago, como tarjetas de débito, transferencias bancarias 
                                        u otros métodos de pago en línea. Durante el proceso de reserva, 
                                        podrá seleccionar la opción de pago que sea más conveniente para usted..
                                        </div><br>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed btn btn-primary py-3 px-4" style="width: 100%;" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEleven"
                                            aria-expanded="false" aria-controls="panelsStayOpen-collapseEleven">
                                            ¿Qué sucede si pierdo mi boleto electrónico?
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseEleven" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                        Si pierde su boleto electrónico, no se preocupe. Puede volver a acceder a su boleto a través 
                                        de la sección de "Mis reservas" en la aplicación. Además, siempre puede comunicarse con 
                                        nuestro equipo de atención al cliente para solicitar asistencia adicional en la recuperación 
                                        de su boleto.
                                        </div><br>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed btn btn-primary py-3 px-4" style="width: 100%;" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwelve"
                                            aria-expanded="false" aria-controls="panelsStayOpen-collapseTwelve">
                                            ¿La aplicación ofrece algún tipo de programa de descuentos para clientes habituales?
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseTwelve" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                        Sí, en algunos casos ofrecemos programas de descuentos para clientes habituales. Contamos con descuentos 
                                        por fines de semana, feriados, festivales, etc con un descuento de 10% a 15% dependiendo de cada caso.
                                        Puede verificar si hay programas disponibles en la aplicación o suscribirse a 
                                        nuestro boletín informativo para recibir actualizaciones sobre promociones y ofertas especiales.
                                        </div><br>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- PreguntasFrecuentes End -->

    <!-- Footer Start -->
    <?php
    include "../../inc/public/footer.php";
    ?>
    <!-- Footer End -->
</body>
</html>