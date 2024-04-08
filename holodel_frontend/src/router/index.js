import { createRouter, createWebHistory } from 'vue-router'
import RegisterView from '../views/RegisterView.vue';
import LoginView from '../views/LoginView.vue';
import AboutView from '../views/AboutView.vue';
import HomeView from '../views/HomeView.vue';
import App from '../views/App.vue';
import Admin from '../views/Admin.vue';
import NotFoundView from '../views/NotFoundView.vue';
import store from '../store';
import Bookdelivery from '../views/Bookdelivery.vue';

const userCheck= { requiresAuth:true}
const guestCheck = {requiresGuest:true}

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
   
    {
      path: '/',
      name: 'home',
      component: HomeView,
      meta:guestCheck,

    },
    {
      path: '/bookdelivery',
      name: 'bookdelivery',
      component: Bookdelivery,
      meta:guestCheck,

    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: AboutView,
      meta:guestCheck
    },

    {
      path: '/register',
      name: 'register',
      component: RegisterView,
      meta:guestCheck,
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView,
      meta:guestCheck,
    },
    
    
    {
      path: '/app',
      name: 'app',
      component:App,
      meta: userCheck,// user check is a constant for requiresAuth {}
      children:[
          {
          path:'/admin',
          name:'app.admin',
          component:Admin
        },
       /* {
          path:'/payment',
          name:'app.payment',
          component:PaymentView
        }*/
        
      ],

    },
    {
      path:'/:pathMatch(.*)',
      name: 'notfound',
      component: NotFoundView
    }
    
  ]
})

router.beforeEach((to,from,next)=>{
  if (to.meta.requiresAuth && !store.state.user.token){
    next({name:'home'})
  }else if(to.meta.requiresGuest && store.state.user.token){
    next({name:'app.admin'})
  }else{
    next();
  }// else or else if(to.meta.requiresAuth && store.state.user.token)

})
  


export default router
