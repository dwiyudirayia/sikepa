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
import * as VueGoogleMaps from 'vue2-google-maps';
import '@/filters';

//Partial Layout Admin
import NotificationValidation from './components/partialsAdmin/NotificationValidation';
import NotificationSuccess from './components/partialsAdmin/NotificationSuccess';
import NotificationError from './components/partialsAdmin/NotificationError';
import Breadcrumb from './components/partialsAdmin/Breadcrumb';
import Select2 from './components/partialsAdmin/Select2';
import Select2Edit from './components/partialsAdmin/Select2Edit';
import Select2Multiple from './components/partialsAdmin/Select2Multiple';

//Vuex
import { mapActions, mapGetters, mapState } from 'vuex';
//Pusher
import Echo from 'laravel-echo';
import Pusher from 'pusher-js'

//Global Components
Vue.component('breadcrumb', Breadcrumb);
Vue.component('notification-validation', NotificationValidation);
Vue.component('notification-success', NotificationSuccess);
Vue.component('notification-error', NotificationError);
Vue.component('select2', Select2);
Vue.component('select2-edit', Select2Edit);
Vue.component('select2-multiple', Select2Multiple);
Vue.component('v-select', vSelect);
Vue.component('pagination', require('laravel-vue-pagination'));

Vue.use(vuevalidate);
Vue.use(VTooltip);
Vue.mixin(Permissions)

VTooltip.options.defaultClass = 'tooltip';
Vue.config.devtools = false;
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
    computed: {
        ...mapGetters(['isAuth']),
        ...mapState(['token']), //GET TOKEN
        ...mapState('user', {
            user_authenticated: state => state.authenticated //MENGAMBIL STATE USER YANG SEDANG LOGIN
        })
    },
    methods: {
        ...mapActions('user', ['getUserLogin']),
        ...mapActions('notification', ['getNotifications']), //DEFINISIKAN FUNGSI UNTUK MENGAMBIL NOTIFIKASI DARI TABLE NOTIFICATIONS
        initialLister() {
            if(this.isAuth) {
                window.Echo = new Echo({
                    broadcaster: 'pusher',
                    key: process.env.MIX_PUSHER_APP_KEY, //VALUENYA DI AMBIL DARI FILE .ENV
                    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
                    encrypted: false,
                    auth: {
                        headers: {
                            Authorization: 'Bearer ' + this.token
                        }
                    }
                });

                if(typeof this.user_authenticated != 'undefined') {
                    //KEMUDIAN KITA MENGAKSES CHANNEL BROADCAST SECARA PRIVATE
                    window.Echo.private(`App.User.${this.user_authenticated.id}`)
                    .notification(() => {
                        console.log(1);
                        //APABILA DITEMUKAN, MAKA KITA MENJALANKAN KEDUA FUNGSI INI
                        //UNTUK MENGAMBIL DATA TERBARU
                        this.getNotifications()
                    })
                }
            }
        }
    },
    watch: {
        //KITA WATCH KETIKA VALUE TOKEN BERUBAH, MAKA
        token() {
            this.initialLister() //KITA JALANKAN FUNGSI UNTUK MENGINISIASI LAGI
        },
        //KETIKA VALUE USER YANG SEDANG LOGIN BERUBAH
        user_authenticated() {
            this.initialLister() //KITA JALANKAN LAGI
        }
    },
    created() {
        if (this.$store.getters['isAuth']) {
            this.getUserLogin();
            this.initialLister();
            this.getNotifications();
        }
    }
});

export default app;
