import Axios from "axios"

const listBreadcrumb = [
    {
        link: [
            {
                id: 1,
                label: 'FAQ',
                path: '/faq'
            }
        ]
    },
    {
        link: [
            {
                id: 1,
                label: 'FAQ',
                path: '/faq'
            },
            {
                id: 2,
                label: 'Tambah FAQ',
                path: '/faq/create'
            }
        ]
    },
    {
        link: [
            {
                id: 1,
                label: 'FAQ',
                path: '/faq'
            },
        ]
    }
];

const faq = {
    namespaced: true,
    state: {
        data: [],
        breadcrumbTitle: 'FAQ',
        breadcrumb: listBreadcrumb,
        message: null,
        statusCode: null,
        showNotification: null,
    },
    getters: {
        breadcrumbTitle(state) {
            return state.breadcrumbTitle;
        },
        breadcrumbIndex(state) {
            return state.breadcrumb[0];
        },
        breadcrumbCreate(state) {
            return state.breadcrumb[1];
        },
        breadcrumbEdit(state) {
            return state.breadcrumb[2];
        },
        getMessage(state)
        {
            return state.message;
        },
        getStatusCode(state)
        {
            return state.statusCode;
        },
        getShowNotification(state) {
            return state.showNotification;
        },
        getData(state) {
            return state.data;
        }
    },
    mutations: {

        updateQuestion(state, payload) {
            state.data.question = payload;
        },
        updateAnswere(state, payload) {
            state.data.answere = payload;
        },
        updateId(state, payload) {
            state.data.answere = payload;
        },
        message(state, payload)
        {
            state.message = payload.data.messages;
        },
        statusCode(state, payload)
        {
            state.statusCode = payload.data.status;
        },
        showNotification(state)
        {
            state.showNotification = true;
        },
        updateData(state, payload)
        {
            state.data = payload.data.data;
        },
        clearPage(state)
        {
            state.message = null;
            state.statusCode = null;
            state.showNotification = null;
        }
    },
    actions: {
        store({ commit },data) {
            Axios.post('/admin/faq', data)
            .then(response => {
                commit('message', response);
                commit('statusCode', response);
                commit('showNotification');
                data.answere = '';
                data.question = '';
            })
            .catch(error => {
                commit('message', error);
                commit('statusCode', error);
                commit('showNotification');
                data.answere = '';
                data.question = '';
            });
        },
        index({ commit }) {
            Axios.get('/admin/faq')
            .then(response => {
                commit('updateData', response);
                commit('clearPage');
            });
        },
        destroy({ commit }, id) {
            Axios.delete('/admin/faq/'+id)
            .then(response => {
                commit('message', response);
                commit('statusCode', response);
                commit('showNotification');
                commit('updateData', response)
            })
            .catch(error => {
                commit('message', error);
                commit('statusCode', error);
                commit('showNotification');
            })
        },
        edit({ commit }, id) {
            Axios.get(`/admin/faq/${id}/edit`)
            .then(response => {
                commit('updateData', response)
            })
            .catch(error => {

            });
        },
        update({ commit, state }) {
            Axios.put(`/admin/faq/${state.data.id}`, state.data)
            .then(response => {
                commit('message', response);
                commit('statusCode', response);
                commit('showNotification');
            })
        },
        clearPage({commit})
        {
            commit('clearPage');
        }
    }
}

export default faq;
