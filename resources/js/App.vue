<template>
    <div>
        <preloading/>
        <carregar/>
        <notifications position="center right" width="30%" />
        <router-view/>
    </div>
</template>

<script>
import carregar from '../js/components/preloading/preloading-carregando.vue'
import preloading from '../js/components/preloading/preloading-simples.vue'

export default{

    components:{
        carregar,
        preloading
    }

}
</script>