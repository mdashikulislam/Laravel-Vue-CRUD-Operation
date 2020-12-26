//Additional File
require('./bootstrap')
window.Vue = require('vue');

//V-Form
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);


//Custom Component Register
Vue.component('create', require('./components/Create').default);
Vue.component('index',require('./components/Index').default);
Vue.component('edit',require('./components/Edit').default);

//Vue Object
const  app = new Vue({
    el:'#app',
});
