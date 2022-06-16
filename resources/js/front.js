window.Vue = require('vue');

import Vue from 'vue';
// importo router pe gestione delle rotte nedentro al #root
import router from  './routes.js';
import App from './components/App.vue';

const root = new Vue({
    el: '#root',
    // router: router, allora semplifico
    router,
    render: h=> h(App)
});