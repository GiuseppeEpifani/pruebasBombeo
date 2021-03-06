/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('register-test', require('./components/RegisterTest.vue').default);
Vue.component('view-test', require('./components/ViewTest.vue').default);

import Toasted from 'vue-toasted';
Vue.use(Toasted, {
    iconPack : 'fontawesome'
});

const app = new Vue({
    el: '#app',
});
