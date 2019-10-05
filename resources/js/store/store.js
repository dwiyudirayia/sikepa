import 'es6-promise/auto';

import Vue from 'vue';
import Vuex from 'vuex'

//Module
import Article from './modules/article';
import Faq from './modules/faq';
import Auth from './modules/auth'
import User from './modules/user';
import Page from './modules/page';
//End Module

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        article: Article,
        faq: Faq,
        auth: Auth,
        user: User,
        page: Page
    },
    state: {
        token: localStorage.getItem('token'),
        errors: [],
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
