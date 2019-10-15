import $axios from './../../api';

const testimoni = {
    namespaced: true,
    state : {
        data: [],
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
        },
    },
    mutations: {
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
        updateDataRelation(state, payload)
        {
            state.data = payload.data.categories;
        },
        clearPage(state)
        {
            state.statusCode = null;
            state.showNotification = null;
        },
    },
    actions: {
        index({ commit }, id) {
            return new Promise((resolve, reject) => {
                $axios.get(`/admin/testimoni`)
                .then(response => {
                    commit('updateData', response);
                    commit('clearPage');

                    resolve(response);
                });
            });
        },
        storeTestimoni({ commit }, forms) {
            $axios.post('/admin/testimoni', forms)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            });
        },
        destroyTestimoni({ commit }, id) {
            $axios.delete(`/admin/testimoni/${id}`)
            .then(response => {
                commit('notification', response);
                commit('updateData', response)
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
};

export default testimoni;
