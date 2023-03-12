import { createApp } from 'vue';

import App from '../js/App.vue';
import router from './router'
import store from '../js/store'
import Notifications from '@kyvg/vue3-notification'

import carregar from '../js/components/preloading/preloading-carregando.vue' 
import preloading from '../js/components/preloading/preloading-simples.vue' 

import 'animate.css';

const app = createApp(App)
      app.use(store)
      app.use(carregar)
      app.use(preloading)
      app.use(router)
      app.use(Notifications)
      app.mount('#app');
      

// store.dispatch('chacklogin')
//       .then(()=>router.push({name:'admin.home'}))
 