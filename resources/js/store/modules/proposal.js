import Axios from "axios"

const proposal = {
    namespaced: true,
    state: {
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
        clearPage(state)
        {
            state.statusCode = null;
            state.showNotification = null;
        },
    },
    actions: {
        indexCategory({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('/admin/proposal/category')
                .then((response) => {
                    commit('updateData', response);
                    commit('clearPage');

                    resolve(response);
                })
            })
        },
        storeCategory({ commit }, data) {
            return new Promise((resolve, reject) => {
                Axios.post('/admin/proposal/category', data)
                .then(response => {
                    commit('notification', response);
                    commit('updateData', response);
                })
                .catch(error => {
                    commit('notification', error);
                });
            })
        },
        destroyCategory({ commit }, id) {
            return new Promise((resolve, reject) => {
                Axios.delete('/admin/proposal/category/'+id)
                .then(response => {
                    commit('notification', response);
                    commit('updateData', response);

                    resolve(resolve);
                })
                .catch(error => {
                    commit('notification', error);
                })
            })
        },
        updateCategory({commit}, forms) {
            return new Promise((resolve, reject) => {
                Axios.put(`/admin/proposal/category/${forms.id}`, forms)
                .then(response => {
                    commit('notification', response);
                    commit('updateData', response);

                    resolve(response);
                })
                .catch(error => {
                    reject(error);
                })
            })
        },
        clearPage({commit})
        {
            commit('clearPage');
        }
    }
}

export default proposal;
