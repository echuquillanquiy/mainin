require('./bootstrap');

window.Vue = require('vue');

Vue.component('puesto-component', require('./components/PuestoComponent.vue').default);
Vue.component('cliente-component', require('./components/ClienteComponent.vue').default);
Vue.component('categoria-component', require('./components/CategoriaComponent.vue').default);
Vue.component('area-component', require('./components/AreaComponent.vue').default);
Vue.component('monto-component', require('./components/MontoComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


