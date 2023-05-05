import './bootstrap';

import Vue from 'vue';
import router from './router';
import store from './store/store.js';
import Index from './components/IndexComponent.vue';

new Vue({
    el: '#index',
    router,
    store,
    render: h => h(Index)
})