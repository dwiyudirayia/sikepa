import Axios from "axios"

const faq = {
    namespaced: true,
    state: {
        data: [],
        forms: [],
        message: null,
        statusCode: null,
        showNotification: null,
    },
    getters: {
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
            state.forms.question = payload;
        },
        updateAnswere(state, payload) {
            state.forms.answere = payload;
        },
        updateId(state, payload) {
            state.forms.id = payload;
        },
        notification(state, payload)
        {
            state.message = payload.data.messages;
            state.statusCode = payload.data.status;
            state.showNotification = true;
        },
        updateData(state, payload)
        {
            state.data = payload.data.data;
        },
        updateDataForm(state, payload)
        {
            state.forms = payload.data.data;
        },
        clearPage(state)
        {
            state.message = null;
            state.statusCode = null;
            state.showNotification = null;
        }
    },
    actions: {
        index({ commit }) {
            Axios.get('/admin/faq')
            .then(response => {
                commit('updateData', response);
                commit('clearPage');
            });
        },
        store({ commit }, data) {
            Axios.post('/admin/faq', data)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            });
        },
        destroy({ commit }, id) {
            Axios.delete('/admin/faq/'+id)
            .then(response => {
                commit('notification', response);
                commit('updateData', response)
            })
            .catch(error => {
                commit('notification', error);
            })
        },
        edit({ commit }, id) {
            Axios.get(`/admin/faq/${id}/edit`)
            .then(response => {
                commit('clearPage');
                commit('updateDataForm', response);
            })
            .catch(error => {

            });
        },
        update({ commit, state }) {
            Axios.put(`/admin/faq/${state.forms.id}`, state.forms)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })

        },
        clearPage({commit})
        {
            commit('clearPage');
        }
    }
}

export default faq;
