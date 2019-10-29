import $axios from '@/api.js';

const accessright = {
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
            state.statusCode = 200;
            state.showNotification = true;
        },
        anotherNotification(state, payload)
        {
            state.message = payload.messages;
            state.statusCode = payload.status;
            state.showNotification = true;
        },
        updateData(state, payload)
        {
            state.data = payload.data.data;
        },
        hideNotification(state) {
            state.showNotification = false;
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
            return new Promise((resolve, reject) => {
                $axios.get(`/access/right`)
                .then(response => {
                    commit('updateData', response);
                    commit('clearPage');
                })
            })
        }
    }
}

export default accessright;
