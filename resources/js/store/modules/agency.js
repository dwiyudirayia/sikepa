import $axios from './../../api';

const agency = {
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
        updateName(state, payload) {
            state.forms.name = payload;
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
            $axios.get('/admin/agency')
            .then(response => {
                commit('updateData', response);
                commit('clearPage');
            });
        },
        store({ commit }, data) {
            $axios.post('/admin/agency', data)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            });
        },
        destroy({ commit }, id) {
            $axios.delete('/admin/agency/'+id)
            .then(response => {
                commit('notification', response);
                commit('updateData', response)
            })
            .catch(error => {
                commit('notification', error);
            })
        },
        edit({ commit }, id) {
            $axios.get(`/admin/agency/${id}/edit`)
            .then(response => {
                commit('clearPage');
                commit('updateDataForm', response);
            })
            .catch(error => {

            });
        },
        update({ commit, state }) {
            $axios.put(`/admin/agency/${state.forms.id}`, state.forms)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            })

        },
        clearPage({commit})
        {
            commit('clearPage');
        }
    }
}

export default agency;
