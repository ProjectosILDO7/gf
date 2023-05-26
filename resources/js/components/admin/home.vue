<template>
    <div>
        <side-bar-component :rota="rota"/>
    </div>
</template>

<script>
import navBarComponent from './navBarComponent.vue';
import sideBarComponent from './sideBarComponent.vue';
//import RodapeComponent from '../../home/partials/RodapeComponent.vue';

    export default{
        name:'home-componente',
        data(){
            return{
                rota:false
            }
        },
        created(){
            //this.refresh();
            this.routas();
        },

        methods:{
            routas() {
            if (this.$router.currentRoute._value.name == 'admin.dashboard') {
               console.log(this.$router.currentRoute._value.name)
               this.rota = true
            } else{
               this.rota = false
            }
        }
        },

        components:{
            navBarComponent,
            sideBarComponent,
            //RodapeComponent
        }

    }
</script>