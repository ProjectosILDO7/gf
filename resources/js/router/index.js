import { createRouter, createWebHistory } from "vue-router";
import routes from "./configRouter.js"
import store from '../store/index'
import { TOKEN_NAME } from "../configs/index.js";

const router = createRouter({
    history: createWebHistory(),
    routes,
  });

router.beforeEach(async (to, from, next)=>{
  const authorization = store.state.authorization
  if(to.name){
        return router.push({name:'home'})
  }
  next()

})  
  
export default router;