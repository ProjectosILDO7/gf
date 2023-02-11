import { createApp } from 'vue';
import App from '../js/App.vue';
import router from './router'
import store from '../js/store'
import Notifications from '@kyvg/vue3-notification'

const app = createApp(App)
      app.use(store)
      app.use(router)
      app.use(Notifications)
      app.mount('#app');
 