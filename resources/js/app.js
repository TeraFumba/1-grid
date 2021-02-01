/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

import Vue from 'vue';

import VueSweetAlert from 'vue-sweetalert';
Vue.use(VueSweetAlert);


Vue.component('new_post', require('./components/new_post.vue').default);
Vue.component('allPosts', require('./components/allPosts.vue').default);
Vue.component('editPost', require('./components/editPost.vue').default);

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
