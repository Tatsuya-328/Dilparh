/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
//  import Vue from 'vue'
//  window.Vue = Vue;
window.Vue = require('vue').default;
require('./bootstrap');


// import Vue from 'vue';
// import { createApp } from 'vue/dist/vue.esm-bundler.js';
// window.createApp = createApp;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('sample-component', require('./components/SampleComponent.vue').default);
Vue.component('grammarquiz-component', require('./components/GrammarquizComponent.vue').default);

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('sample-component', require('./components/SampleComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
