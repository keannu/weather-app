require('./bootstrap');

import Vue from 'vue';
import store from './store/store.js';
import { BootstrapVue, IconsPlugin  } from 'bootstrap-vue';
import IndexComponent from './components/IndexComponent.vue';

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

new Vue({
    el: '#index',
    store,
    render: h => h(IndexComponent)
})