import { createApp } from 'vue';

import App from '../js/App.vue';
import router from './router'
import store from '../js/store'
import Notifications from '@kyvg/vue3-notification'

import carregar from '../js/components/preloading/preloading-carregando.vue' 
import btn_loading from '../js/components/preloading/btn-preloading-black.vue' 
import preloading from '../js/components/preloading/preloading-simples.vue' 

import VueNumberFormat from 'vue-number-format'
import VueSidebarMenu from 'vue-sidebar-menu'
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'

import 'animate.css';

const app = createApp(App)
      app.use(store)
      app.use(VueSidebarMenu)
      app.use(carregar)
      app.use(preloading)
      app.use(btn_loading)
      app.use(router)
      app.use(Notifications)
      app.use(VueNumberFormat, {prefix:'', isInteger: true})
      app.mount('#app');
      

// store.dispatch('chacklogin')
//       .then(()=>router.push({name:'admin.home'}))
 