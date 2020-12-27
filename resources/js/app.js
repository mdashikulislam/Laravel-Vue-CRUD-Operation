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

//Import axios
const axios = require('axios');

//Sweet Alert 2
import Swal from 'sweetalert2'
window.Swal = Swal;

//Vue ProgressBar
import VueProgressBar  from 'vue-progressbar';
const option = {
    color: 'rgb(255, 0, 0)',
    failedColor: 'red',
    height: '3px',
}
Vue.use(VueProgressBar,option);


//Vue Object
const  app = new Vue({
    el:'#app',
});
