
import VueRouter from 'vue-router';
import Hello from './pages/Hello.vue'
import Home from './pages/Home.vue'
import Register from './pages/Register.vue'
import Login from './pages/Login.vue'
import Services from './pages/Services.vue'
import About from './pages/About_us.vue'
import Contact from './pages/Contact_us.vue'
import UserDetails from './pages/UserDetails'
import serviceDetails from './pages/serviceDetails'
import admin from './pages/Admin'
import serviceadmin from './pages/Admin/serviceadmin'
import Users from './pages/Admin/Users'
import CreateService from './pages/Admin/CreateService'
import UpdateService from './pages/Admin/UpdateService'
import Report from './pages/Admin/Report'
import UserReport from './pages/UserReport'

import routers from 'vue-router'; 
import axios from 'axios';
const originalPush = routers.prototype.push
routers.prototype.push = function push(location) {
  return originalPush.call(this, location).catch(err => err)
}


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
            /* beforeEnter:(to,from,next)=>{
                axios.get('/api/authenticated').then(()=>{
                    next()
                }).catch(()=>{
                    return next({name: 'log'})
                })
            } */
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
        {
            path: '/UserDetails/:id',
            name: 'UserDetails',
            component: UserDetails,
           
        },
        {
            path: '/serviceDetails/:id',
            name: 'serviceDetails',
            component: serviceDetails,
           
        },
        {
            path: '/admin',
            name: 'admin',
            component: admin,
           
        },
        {
            path: '/serviceadmin',
            name: 'serviceadmin',
            component: serviceadmin,
           
        },
        {
            path: '/Users',
            name: 'Users',
            component: Users,
           
        },
        {
            path: '/CreateService',
            name: 'CreateService',
            component: CreateService,
           
        },
        {
            path: '/UpdateService/:id',
            name: 'UpdateService',
            component: UpdateService,
           
        },
        {
            path: '/Report',
            name: 'Report',
            component: Report,
           
        },
        {
            path: '/UserReport/:id',
            name: 'UserReport',
            component: UserReport,
           
        },
        
    ]
    
    const router = new VueRouter({
      mode: 'history',
      routes: routes,
  });
  
  export default router;

