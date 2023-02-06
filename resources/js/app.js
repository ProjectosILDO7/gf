import { createApp } from 'vue';
import App from '../js/App.vue';
import router from './router'
import store from '../js/store'

const app = createApp(App)
      app.use(store)
      app.use(router)
      app.mount('#app');
 