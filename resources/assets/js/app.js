
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue2Filters from 'vue2-filters'

window.Vue.use(Vue2Filters)

import VueEcho from 'vue-echo';

Vue.use(VueEcho, {
    broadcaster: 'pusher',
    key: 'f59e47e6baa10c0a0cf2',
    cluster: 'eu',
    encrypted: true
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
// Vue.component('attendances', require('./components/Attendances.vue'));
Vue.component('lessons', require('./components/Lessons.vue'));
Vue.component('personal-calendar', require('./components/PersonalCalendar.vue'));

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

const app = new Vue({
    el: '#app'
});
