/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('admin-lte');

window.Vue = require('vue');
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;

import ActivityGraph from './components/ActivityGraph/ActivityGraph.vue'
Vue.component('activity-graph', ActivityGraph)

import swal from 'sweetalert2'
window.swal = swal;

const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

window.toast = swal;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '7px'
})

import VueRouter from 'vue-router'
Vue.use(VueRouter)

//vue good table
import VueGoodTablePlugin from 'vue-good-table';
// import the styles
import 'vue-good-table/dist/vue-good-table.css'

Vue.use(VueGoodTablePlugin);

let routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/artigos', component: require('./components/Artigos.vue').default },
    { path: '/pedidos', component: require('./components/Pedidos.vue').default },
    { path: '/pedidos_arquivados', component: require('./components/Pedidos_arquivados.vue').default },
    { path: '/categorias', component: require('./components/Categorias.vue').default },
    { path: '/utilizadores', component: require('./components/Utilizadores.vue').default },
    { path: '/vendas', component: require('./components/Vendas.vue').default },
    { path: '/pagina_inicial', component: require('./components/PaginaInicial.vue').default },
    { path: '/blog', component: require('./components/Blog.vue').default },
]

const router = new VueRouter({
    //mode: 'history',
    routes // short for `routes: routes`
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});

/*function mensagem_sucesso() {
    swal.fire({
        position: "center",
        icon: "success",
        title: "Operação concluida",
        showConfirmButton: false,
        timer: 1500,
        size: "small",
    });
};

window.mensagem_sucesso = mensagem_sucesso();*/