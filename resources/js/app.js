//Init Mixing
require('./bootstrap');

//Core Vue
import Vue from 'vue';
import Routes from './routes.js'
import App from './layouts/App.vue';
import store from './store/store';
import vuevalidate from 'vuelidate';
import VTooltip from 'v-tooltip';
import vSelect from 'vue-select';
import Permissions from './mixins/permission';
import * as VueGoogleMaps from 'vue2-google-maps'

//Partial Layout Admin
import NotificationValidation from './components/partialsAdmin/NotificationValidation';
import NotificationSuccess from './components/partialsAdmin/NotificationSuccess';
import NotificationError from './components/partialsAdmin/NotificationError';
import Breadcrumb from './components/partialsAdmin/Breadcrumb'

//Global Components
Vue.component('breadcrumb', Breadcrumb);
Vue.component('notification-validation', NotificationValidation);
Vue.component('notification-success', NotificationSuccess);
Vue.component('notification-error', NotificationError);
Vue.component('v-select', vSelect)

Vue.use(vuevalidate);
Vue.use(VTooltip);
Vue.mixin(Permissions)

VTooltip.options.defaultClass = 'tooltip';

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyB0CuuQ5YQNoIc91Ser9cbum8gYy0oOf4w',
        installComponents: true,
        libraries: 'places',
        region: 'ID',
        language: 'id',
    }
});

const app = new Vue({
    el: '#app',
    store,
    router: Routes,
    render: h => h(App),
    created() {
        if (this.$store.getters['isAuth']) {
            this.$store.dispatch('user/getUserLogin');
        }
    }
});

export default app;
