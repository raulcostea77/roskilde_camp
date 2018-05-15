
import Map from './map';
import B2B from './b2b';

require('./bootstrap');

window.Vue = require('vue');
window.Bus = new Vue();

Vue.component('groups', require('./components/Groups.vue'));
Vue.component('create-group', require('./components/CreateGroup.vue'));
Vue.component('group-chat', require('./components/GroupChat.vue'));



let mapPage = document.getElementById('map');
if (mapPage) {
    const map = new Map();
}

let b2bPage = document.getElementById('b2b');
if (b2bPage) {
    const b2b = new B2B();
}



// const app = new Vue({
//     el: '#app'
// });

// console.log(app);




    
    

