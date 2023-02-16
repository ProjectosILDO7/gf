import Home from "../home/index.vue"

const routes = [
    {
        path:'/',
        name:"home",
        component: Home,
        children:[
            {
                path:'',
                name:'home.login',
                component:()=>import('../home/pages/LoginComponent.vue')
            },

            {
                path:'/register',
                name:'home.register',
                component:()=>import('../home/pages/RegisterComponent.vue')
            },

            {
                path:'/reset',
                name:'home.reset',
                component:()=>import('../home/pages/ResetComponent.vue')
            },

            {
                path:'/api/resetPassword/:token',
                name:'auth.resetPassword',
                component:()=>import('../home/pages/resetPassword.vue'),
                props:true
            },

            {
                path:'/services',
                name:'home.service',
                component:()=>import('../home/pages/ServicesComponent.vue')
            },
            {
                path:'/contacto',
                name:'home.contacto',
                component:()=>import('../home/pages/ContactoComponent.vue')
            },
            {
                path:'/sobre',
                name:'home.sobre',
                component:()=>import('../home/pages/SobreComponent.vue')
            }
        ]
    },

    // Routas admin precisa estar autenticado
    {
        path:'/admin',
        name:'admin.home',
        component:()=>import('../components/admin/home.vue'),
        children:[
            {
                path:'',
                name:'admin.dashboard',
                component:()=>import('../components/admin/dashboardComponent.vue')
            }
        ]
    }
]

export default routes