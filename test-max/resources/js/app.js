/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import VueSimpleAlert from "vue-simple-alert";
import axios from 'axios'
import VueAxios from 'vue-axios'
 


Vue.use(VueRouter);
Vue.use(VueSimpleAlert);
Vue.use(VueAxios, axios);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


const MyTableComponent = require('./components/TableComponent.vue').default
const MenuComponent = require('./components/MenuComponent.vue').default
const HomeComponent = require('./components/HomeComponent.vue').default




Vue.component('my-table-component', MyTableComponent );
Vue.component('menu-component', MenuComponent );
Vue.component('home-component', HomeComponent );

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const router = new VueRouter({
    routes: [
        {path: '/', redirect: '/Home', component: HomeComponent},
        { path: '/Home', component: HomeComponent },
        { path: '/Arhive', component: MyTableComponent }
    ]
})
 

const app = new Vue({
    el: '#app',
    router: router,
});
