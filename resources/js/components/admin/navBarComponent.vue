<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <div class="container">
                <div class="d-flex justify-content-between d-md-none d-block">
                    <a class="navbar-brand fs-4" href="#">Propy-x</a>
                    <button class="btn btn-sm px-1 py-0 open-btn">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>

                <button class="navbar-toggler btn-sm" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex justify-content-end ml-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                User
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- <ul class="nav justify-content-center bg-info shadow">
            <li class="nav-item">
                <a class="nav-link active text-light" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
            aria-controls="offcanvasExample">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#">
                    <i class="fa-solid fa-house"></i> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#" tabindex="-1" aria-disabled="true">
                    <i class="fa-solid fa-gears"></i> Serviços</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" href="#" role="button"
                    aria-expanded="false"><i class="fa-solid fa-user"></i> Utilizador</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">
                        <i class="fa-solid fa-user"></i> Perfil</a></li>
                    <li><a class="dropdown-item" href="#">
                        <i class="fa-solid fa-circle-dollar-to-slot"></i> Pagamentos<span class=""> <sup class="text-danger small">10+</sup></span></a></li>
                    <li><a class="dropdown-item" href="#">
                        <i class="fa-regular fa-envelope"></i> Notificações<span class=""> <sup class="text-danger small">30+</sup></span></a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Saír</a></li>
                </ul>
            </li>
        </ul> -->
        <router-view/>
    </div>
</template>
<script>

export default {

}
</script>