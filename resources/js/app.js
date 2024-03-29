
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');



window.Vue = require('vue');
import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)
import 'bootstrap-vue/dist/bootstrap-vue.css'

import Chartkick from 'vue-chartkick'
import Chart from 'chart.js'
Vue.use(Chartkick.use(Chart))

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


//view
Vue.component('case-view', require('./components/deal/View.vue').default);
Vue.component('business-dev', require('./components/business-developper/View.vue').default);
Vue.component('contact-view', require('./components/contact/View.vue').default);
Vue.component('data-view', require('./components/data/View.vue').default);
Vue.component('view-param-action', require('./components/param-action/View.vue').default);
Vue.component('view-param-contact', require('./components/param-contact/View.vue').default);
Vue.component('view-param-todo', require('./components/param-todo/View.vue').default);
Vue.component('view-action', require('./components/action/View.vue').default);
//create
Vue.component('create-business-developper', require('./components/business-developper/Create.vue').default);
Vue.component('create-deal', require('./components/deal/Create.vue').default);
Vue.component('create-contact', require('./components/contact/Create.vue').default);
Vue.component('create-param-action', require('./components/param-action/Create.vue').default);
Vue.component('create-param-contact', require('./components/param-contact/Create.vue').default);
Vue.component('create-param-todo', require('./components/param-todo/Create.vue').default);
Vue.component('create-action', require('./components/action/Create.vue').default);
//edit
Vue.component('edit-business-developper', require('./components/business-developper/Edit.vue').default);
Vue.component('edit-contact', require('./components/contact/Edit.vue').default);
Vue.component('edit-deal', require('./components/deal/Edit.vue').default);
//menu
Vue.component('menu-vertical', require('./components/menu/Menu.vue').default);




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});