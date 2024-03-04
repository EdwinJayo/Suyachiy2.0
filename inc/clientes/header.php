<div class="position-relative p-0 px-sm-1" style="z-index: 9;">
        <nav class="navbar navbar-expand-sm bg-light navbar-light shadow-sm py-3 py-md-0 pl-3 pl-sm -5">
            <div>
                <a href="index.php"><img class="col" src="../../img/logo.png" style="height: 60px;"></a>

            </div>

            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="reservas.php" class="nav-item nav-link">Mis Reservaciones</a>
                    <a href="nosotros.php" class="nav-item nav-link">Nosotros</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Soporte</a>
                        <div class="dropdown-menu border-0 rounded-0 m-0">
                            <a href="contacto.php" class="dropdown-item">Contacto</a>
                            <a href="preguntas.php" class="dropdown-item">Preguntas Frecuentes</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../../img/default.jpg" alt="" style="width: 28px; height: 28px;">
                            <span>
                                <?php
                                    echo $_SESSION['nombre'];
                                ?>
                                <?php
                                    echo $_SESSION['apellidos'];
                                ?>
                            </span> </a>
                        <div class="dropdown-menu border-0 rounded-0 m-0">
                            <a href="administracion.php" class="dropdown-item">Administrar cuenta</a>
                            <a href="historial.php" class="dropdown-item">Historial de Reservaciones</a>
                            <a href="salir.php" class="dropdown-item">Salir</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
