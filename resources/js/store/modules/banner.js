import Axios from "axios";

const banner = {
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
        indexBannerCategory({ commit }) {
            return new Promise((resolve,reject) => {
                Axios.get('/admin/banner/category')
                .then(response => {
                    commit('updateData', response);
                    commit('clearPage');

                    resolve(response)
                });
            });
        },
        storeBannerCategory({ commit }, data) {
            Axios.post('/admin/banner/category', data)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            });
        },
        destroyBannerCategory({ commit }, id) {
            Axios.delete('/admin/banner/category/'+id)
            .then(response => {
                commit('notification', response);
                commit('updateData', response)
            })
            .catch(error => {
                commit('notification', error);
            })
        },
        updateBannerCategory({ commit }, forms) {
            Axios.put(`/admin/banner/category/${forms.id}`, forms)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
        },
        listCategoryBanner({ commit }, id) {
            return new Promise((resolve, reject) => {
                Axios.get(`/admin/banner/list/${id}/category`)
                .then(response => {
                    commit('updateData', response);
                    commit('clearPage');

                    resolve(response);
                });
            });
        },
        storeBanner({ commit }, forms) {
            Axios.post('/admin/banner', forms)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            });
        },
        destroyBanner({ commit }, id) {
            Axios.delete(`/admin/banner/${id}`)
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

export default banner;
