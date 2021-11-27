
import VueRouter from 'vue-router';
import Hello from './pages/Hello.vue'
import Home from './pages/Home.vue'
import Register from './pages/Register.vue'
import Login from './pages/Login.vue'
import Services from './pages/Services.vue'
import About from './pages/About_us.vue'
import Contact from './pages/Contact_us.vue'




   const routes= [
        {
            path: '/',
            name: 'homes',
            component: Home
        },
        {
            path: '/hello',
            name: 'hello',
            component: Hello,
        },
        {
            path: '/reg',
            name: 'reg',
            component: Register,
        },
        {
            path: '/log',
            name: 'log',
            component: Login,
        },
        {
            path: '/service',
            name: 'service',
            component: Services,
        },
        {
            path: '/about',
            name: 'about',
            component: About,
        },
        {
            path: '/contact',
            name: 'contact',
            component: Contact,
        },
        
    ]
    const router = new VueRouter({
      mode: 'history',
      routes: routes,
  });
  
  export default router;

