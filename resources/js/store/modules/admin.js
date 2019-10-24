import $axiosFormData from '@/apiformdata.js';
import $axios from '@/api.js';

const admin = {
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
        }
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
            state.message = null;
            state.statusCode = null;
            state.showNotification = null;
        }
    },
    actions: {
        indexAdmin({ commit }) {
            $axios.get('/admin/user/admin/index')
            .then(response => {
                commit('updateData', response);
                commit('clearPage');
            });
        },
        storeAdmin({ commit }, forms) {
            $axiosFormData.post(`/admin/user/admin/store`, forms)
            .then(response => {
                commit('updateData', response);
                commit('notification', response);
            })
        },
        destroyAdmin({ commit }, id) {
            $axios.delete(`/admin/user/admin/${id}`)
            .then(response => {
                commit('updateData', response);
                commit('notification', response);
            })
        },
        updateAdmin({ commit }, forms) {
            console.log(forms);
            $axiosFormData.put(`/admin/user/admin/${forms.id}`)
            .then(response => {
                console.log(response);
            })
            .catch(error => console.log(error));
        },
        clearPage({commit})
        {
            commit('clearPage');
        }
    }
}

export default admin;
