<template>
    <div class="main-container d-flex">
        <div class="sidebar bg-success" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <h1 class="fs-4">
                    <span class="bg-success rounded border border-white px-2 py-2">
                        <i class="fa-solid fa-circle-dollar-to-slot fa-lg text-white"></i>
                    </span>
                    <span class="text-white">
                         Propy-x
                    </span>
                </h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i
                        class="fa-solid fa-bars"></i></button>
            </div>

            <ul class="list-unstyled px-2">
                <li class="active"><a href="#" class="text-decoration-none d-block"><i
                            class="fa-solid fa-house ml-2"></i> Painel de controle</a> </li>
                <li><a href="#" class="text-decoration-none d-block"><i class="fa-solid fa-user ml-2"></i> Perfil</a>
                </li>
                <li><a href="#" class="text-decoration-none d-block"><i class="fa-solid fa-list ml-2"></i> Serviços</a>
                </li>
            </ul>
            <hr class="h-color max-2">
            <ul class="list-unstyled px-2">
                <li>
                    <a href="#" class="text-decoration-none d-block d-flex justify-content-between mt-2">
                        <span><i class="fa-solid fa-envelope-open-text ml-2"></i> Mensagens</span>
                        <span class="bg-dark rounded-pill text-white py-0 px-2 small">02+</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-decoration-none d-block d-flex justify-content-between mt-2">
                        <span><i class="fa-solid fa-bell ml-2"></i> Notificações</span>
                        <span class="bg-dark rounded-pill text-white py-0 px-2 small">20+</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-decoration-none d-block mt-2">
                        <i class="fa-solid fa-chart-line ml-2"></i> Relatório
                    </a>
                </li>
            </ul>
        </div>

        <div class="content">
            <navbar-component/>
            <rodape-component/>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue'
import NavbarComponent from './navBarComponent.vue'
import RodapeComponent from '@/home/partials/RodapeComponent.vue'

export default {

    components:{
        NavbarComponent,
        RodapeComponent
    },

    setup() {

    },


    mounted() {
        $(document).ready(function () {
            $(".sidebar ul li").on('click', function () {
                $(".sidebar ul li.active").removeClass('active');
                $(this).addClass('active')
            })
        })

        $(document).ready(function(){
            $('.open-btn').on('click', function(){
                $('.sidebar').addClass('active')
            })
        })

        $(document).ready(function(){
            $('.close-btn').on('click', function(){
                $('.sidebar').removeClass('active')
            })
        })
    }

}

</script>


<style scoped>
body {
    background: #eee
}

#side_nav {
    background: #000;
    min-width: 250px;
    max-width: 250px;
    transition:all 0.3s
}

.content {
    min-height: 100vh;
    width: 100%;
}

hr .h-color {
    background: #fff;
}

.sidebar li.active {
    background: #fff;
    border-radius: 8px;
}

.sidebar li.active a,
.sidebar li.active a:hover {
    color: #000;
}

.sidebar li a {
    color: #fff
}

@media(max-width: 767px){
    #side_nav{
        margin-left:-250px;
        position:fixed;
        min-height:100vh;
        z-index:1;
    }

    #side_nav.active{
        margin-left:0;
    }

}
</style>