import Vue from 'vue'
import VueResource from 'vue-resource'

Vue.use(VueResource);

Vue.http.options.root = '/api';
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');

import App from './App.vue';

Pusher.logToConsole = true;
window.pusher = new Pusher('4bd1ab0e5f52be74b195', {cluster: 'ap1', encrypted: true});

new Vue(App).$mount('body');