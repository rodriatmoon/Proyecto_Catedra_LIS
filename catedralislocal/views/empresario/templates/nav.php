<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
    <div class="container px-5">
        <a class="navbar-brand fw-bold" href="<?php echo constant("URL")?>Empresario/principal">Bussines Plan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu

        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
            <li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo constant("URL")?>Empresario/categorias"><i class="bi bi-folder-plus"></i> Gestionar categorias</a></li>
                <li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo constant("URL")?>Empresario/eventos"><i class="bi bi-calendar-check"></i> Gestionar eventos</a></li>
            </ul>
            
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i>
                   <?php echo $this->usuario;?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="<?php echo constant("URL")?>Empresario/cerrarSesion"><i class="bi bi-door-open-fill"></i>Cerrar sesion</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>

        </div>
    </div>
</nav>