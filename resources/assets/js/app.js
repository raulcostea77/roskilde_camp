
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Bus = new Vue();

Vue.component('groups', require('./components/Groups.vue'));
Vue.component('create-group', require('./components/CreateGroup.vue'));
Vue.component('group-chat', require('./components/GroupChat.vue'));

const app = new Vue({
    el: '#app'
});

console.log(app);




    
    

