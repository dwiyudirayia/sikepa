import $axiosFormData from '@/apiformdata.js';
import $axios from '@/api.js';

const satker = {
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
        hideNotification(state) {
            state.showNotification = false;
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
            $axios.get('/admin/user/satker/index')
            .then(response => {
                commit('updateData', response);
                commit('clearPage');
            });
        },
        storeAdmin({ commit }, forms) {
            $axiosFormData.post(`/admin/user/satker/store`, forms)
            .then(response => {
                commit('updateData', response);
                commit('notification', response);
            })
        },
        destroyAdmin({ commit }, id) {
            $axios.delete(`/admin/user/satker/${id}`)
            .then(response => {
                commit('updateData', response);
                commit('notification', response);
            })
        },
        clearPage({commit})
        {
            commit('clearPage');
        }
    }
}

export default satker;
