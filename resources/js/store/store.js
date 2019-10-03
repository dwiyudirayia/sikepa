import 'es6-promise/auto';

import Vue from 'vue';
import Vuex from 'vuex'
import Article from './modules/article';
import Faq from './modules/faq';
import Auth from './modules/auth'
import User from './modules/user';

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        article: Article,
        faq: Faq,
        auth: Auth,
        user: User
    },
    state: {
        token: localStorage.getItem('token'),
        errors: null,
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
    },
})


export default store;
