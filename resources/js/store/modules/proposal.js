import $axios from './../../api';
import router from '@/routes.js';

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
                $axios.get('/admin/proposal/category')
                .then((response) => {
                    commit('updateData', response);
                    commit('clearPage');

                    resolve(response);
                })
            })
        },
        storeCategory({ commit }, data) {
            return new Promise((resolve, reject) => {
                $axios.post('/admin/proposal/category', data)
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
                $axios.delete('/admin/proposal/category/'+id)
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
                $axios.put(`/admin/proposal/category/${forms.id}`, forms)
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
        indexCooperationTarget({ commit }) {
            return new Promise((resolve, reject) => {
                $axios.get('/admin/proposal/cooperation/target')
                .then((response) => {
                    commit('updateData', response);
                    commit('clearPage');

                    resolve(response);
                })
            })
        },
        storeCooperationTarget({ commit }, data) {
            return new Promise((resolve, reject) => {
                $axios.post('/admin/proposal/cooperation/target', data)
                .then(response => {
                    commit('notification', response);
                    commit('updateData', response);
                })
                .catch(error => {
                    commit('notification', error);
                });
            })
        },
        destroyCooperationTarget({ commit }, id) {
            return new Promise((resolve, reject) => {
                $axios.delete('/admin/proposal/cooperation/target/'+id)
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
        updateCooperationTarget({commit}, forms) {
            return new Promise((resolve, reject) => {
                $axios.put(`/admin/proposal/cooperation/target/${forms.id}`, forms)
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
        indexTypeOfCooperation({ commit }) {
            return new Promise((resolve, reject) => {
                $axios.get('/admin/proposal/typeof/cooperation')
                .then((response) => {
                    commit('updateData', response);
                    commit('clearPage');

                    resolve(response);
                })
            })
        },
        storeTypeOfCooperation({ commit }, data) {
            return new Promise((resolve, reject) => {
                $axios.post('/admin/proposal/typeof/cooperation', data)
                .then(response => {
                    commit('notification', response);
                    commit('updateData', response);
                })
                .catch(error => {
                    commit('notification', error);
                });
            })
        },
        destroyTypeOfCooperation({ commit }, id) {
            return new Promise((resolve, reject) => {
                $axios.delete('/admin/proposal/typeof/cooperation/'+id)
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
        updateTypeOfCooperation({commit}, forms) {
            return new Promise((resolve, reject) => {
                $axios.put(`/admin/proposal/typeof/cooperation/${forms.id}`, forms)
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
        indexListTypeofCooperationListOne({ commit }, id) {
            return new Promise((resolve, reject) => {
                $axios.get(`/admin/proposal/typeof/cooperation/one/${id}/list`)
                .then(response => {
                    commit('updateData', response);
                    commit('clearPage');

                    resolve(response);
                })
            });
        },
        storeListTypeofCooperationListOne({ commit }, forms) {
            $axios.post('/admin/proposal/typeof/cooperation/one', forms)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            });
        },
        destroyListTypeofCooperationListOne({ commit }, id) {
            return new Promise((resolve, reject) => {
                $axios.delete(`/admin/proposal/typeof/cooperation/one/${id}`)
                .then(response => {
                    commit('updateData', response);
                    commit('notification', response);

                    resolve(response);
                })
            })
        },
        indexListTypeofCooperationListTwo({ commit }, id) {
            return new Promise((resolve, reject) => {
                $axios.get(`/admin/proposal/typeof/cooperation/two/${id}/list`)
                .then(response => {
                    commit('updateData', response);
                    commit('clearPage');

                    resolve(response);
                })
            });
        },
        storeListTypeofCooperationListTwo({ commit }, forms) {
            $axios.post('/admin/proposal/typeof/cooperation/two', forms)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            });
        },
        destroyListTypeofCooperationListTwo({ commit }, id) {
            return new Promise((resolve, reject) => {
                $axios.delete(`/admin/proposal/typeof/cooperation/two/${id}`)
                .then(response => {
                    commit('updateData', response);
                    commit('notification', response);

                    resolve(response);
                })
            })
        },
        indexSubtanceCooperation({ commit }) {
            return new Promise((resolve, reject) => {
                $axios.get('/admin/proposal/subtance/cooperation')
                .then((response) => {
                    commit('updateData', response);
                    commit('clearPage');

                    resolve(response);
                })
            })
        },
        storeSubtanceCooperation({ commit }, data) {
            return new Promise((resolve, reject) => {
                $axios.post('/admin/proposal/subtance/cooperation', data)
                .then(response => {
                    commit('notification', response);
                    commit('updateData', response);
                })
                .catch(error => {
                    commit('notification', error);
                });
            })
        },
        destroySubtanceCooperation({ commit }, id) {
            return new Promise((resolve, reject) => {
                $axios.delete('/admin/proposal/subtance/cooperation/'+id)
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
        updateSubtanceCooperation({commit}, forms) {
            return new Promise((resolve, reject) => {
                $axios.put(`/admin/proposal/subtance/cooperation/${forms.id}`, forms)
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
        indexProposal({ commit, rootState }) {
            return new Promise((resolve, reject) => {
                $axios.get(`/admin/submission/cooperation`)
                .then(response => {
                    commit('updateData', response);
                    commit('clearPage');

                    resolve(response);
                })
            })
        },
        storeProposal({ commit, rootState }, forms) {
            $axios.post(`/admin`)
        },
        clearPage({commit})
        {
            commit('clearPage');
        }
    }
}

export default proposal;
