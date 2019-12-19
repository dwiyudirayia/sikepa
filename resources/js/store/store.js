import 'es6-promise/auto';

import Vue from 'vue';
import Vuex from 'vuex'

//Module
import Article from './modules/article';
import Faq from './modules/faq';
import Auth from './modules/auth'
import User from './modules/user';
import Page from './modules/page';
import Agency from './modules/Agency';
import Proposal from './modules/proposal';
import Banner from './modules/banner';
import Admin from './modules/admin';
import Testimoni from './modules/testimoni';
import satker from './modules/satker';
import accessright from './modules/accessright';
import Notification from './modules/notification';

//End Module

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        article: Article,
        faq: Faq,
        auth: Auth,
        user: User,
        page: Page,
        agency: Agency,
        proposal: Proposal,
        banner: Banner,
        admin: Admin,
        testimoni: Testimoni,
        satker: satker,
        accessright: accessright,
        notification: Notification
    },
    state: {
        token: localStorage.getItem('token'),
        errors: [],
        paramsOne: null,
        paramsTwo: null,
    },
    getters: {
        isAuth(state) {
            return state.token != "null" && state.token != null
        }
    },
    mutations: {
        setAuth(state, payload) {
            state.token = payload;
        },
        setError(state, payload) {
            state.errors = payload
        },
        paramsOne(state, payload) {
            state.paramsOne = payload;
        },
        paramsTwo(state, payload) {
            state.paramsTwo = payload;
        },
    },
})


export default store;
