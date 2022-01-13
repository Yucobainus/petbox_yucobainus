import VueRouter from "vue-router";
import Home from './components/Home'
import Catalog from './components/Catalog';
import Contact from './components/PageContact';
import Admin from './components/Admin/Admin';

export default new VueRouter({
    routes: [
        {
            path: '/',
            component: Home
        },
        {
            path: '/catalog',
            component: Catalog
        },
        {
            path: '/contact',
            component: Contact
        },
        {
            path: '/admin',
            component: Admin
        }      
    ]
})