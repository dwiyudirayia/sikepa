import 'es6-promise/auto';

import Vue from 'vue';
import Vuex from 'vuex'
import Article from './modules/article';
import Faq from './modules/faq';

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        article: Article,
        faq: Faq
    }
})


export default store;
