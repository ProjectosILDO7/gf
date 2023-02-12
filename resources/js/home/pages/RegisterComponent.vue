<template>
    <div class="card col-xs-12 col-sm-12 col-md-4 col-lg-4 m-auto mt-4 shadow">
  
        <div class="card-header text-center">
            <span class="">
                <b>Propy-x: Criar uma conta</b>
            </span>
        </div>
        <br>
        <div class="card-body">
            <form action="" method="post">

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-at"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Nome" aria-label="Nome"
                        aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-at"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="E-mail" aria-label="E-mail"
                        aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-user-lock"></i>
                    </span>
                    <input type="password" class="form-control" placeholder="Senha" aria-label="Senha"
                        aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-user-lock"></i>
                    </span>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Repetir senha" aria-label="Repetir senha"
                        aria-describedby="addon-wrapping">
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-info text-light" type="button">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Criar conta
                    </button>
                </div>
                <br>
                <hr>
                <div class="form-group text-md-center text-align-sm">
                    <ul>
                        <li><router-link class="text-secondary" :to="{name:'home.reset'}">
                            Esqueci minha senha
                        </router-link></li>
                        <li>
                            <router-link class="text-secondary" :to="{ name:'home.login' }">
                                Ja tenho uma conta
                            </router-link>
                        </li>
                    </ul>
                </div>

            </form>
        </div>
    </div>
</template>

<script>

</script>

<style scoped>
ul li{
    list-style: none;
}

ul li a{
    list-style: none;
    text-decoration: none;
}

ul li a:hover{
    list-style: none;
    text-decoration: none;
    color:blue !important
}
    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
    .text-align-sm{
        text-align: center !important;
    }
}


</style>
