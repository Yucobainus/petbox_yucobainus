/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import router from './router'

Vue.component('vue-banner', require('./components/Banner.vue').default);
Vue.component('vue-calculator', require('./components/Calculator.vue').default);
Vue.component('vue-header', require('./components/Header.vue').default);
Vue.component('vue-footer', require('./components/Footer.vue').default);
Vue.component('vue-clients', require('./components/Clients.vue').default);
Vue.component('vue-banner', require('./components/Banner.vue').default);
Vue.component('vue-modal', require('./components/Modal.vue').default);
Vue.component('vue-last-works', require('./components/LastWorks.vue').default);
Vue.component('vue-contact', require('./components/Contact.vue').default);

Vue.component('vue-orders', require('./components/Admin/Orders.vue').default);
Vue.component('vue-completed-form', require('./components/Admin/CompletedForm.vue').default);
Vue.component('vue-c-list', require('./components/Admin/ListCompleted.vue').default);
Vue.component('vue-appeals', require('./components/Admin/Appeals.vue').default);
Vue.component('vue-admin-slider', require('./components/Admin/Slider.vue').default);
Vue.component('vue-change-form', require('./components/Admin/EditWork.vue').default);
Vue.use(VueRouter)

import App from './components/App'
import Vue from 'vue';
import VueRouter from 'vue-router';
const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});
