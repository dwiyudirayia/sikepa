//Init Mixing
require('./bootstrap');

//Core Vue
import Vue from 'vue';
import Routes from './routes.js'
import App from './layouts/App.vue';
import store from './store/store';
import vuevalidate from 'vuelidate';
import VTooltip from 'v-tooltip';

//Partial Layout Admin
import SideMenu from './components/partialsAdmin/SideMenu'
import NotificationValidation from './components/partialsAdmin/NotificationValidation';
import NotificationSuccess from './components/partialsAdmin/NotificationSuccess';
import NotificationError from './components/partialsAdmin/NotificationError';
import Breadcrumb from './components/partialsAdmin/Breadcrumb'

//Global Components
Vue.component('sidemenu', SideMenu);
Vue.component('breadcrumb', Breadcrumb);
Vue.component('notification-validation', NotificationValidation);
Vue.component('notification-success', NotificationSuccess);
Vue.component('notification-error', NotificationError);

Vue.use(vuevalidate);
Vue.use(VTooltip);
VTooltip.options.defaultClass = 'tooltip';

const app = new Vue({
    el: '#app',
    store,
    router: Routes,
    render: h => h(App)
});

export default app;
