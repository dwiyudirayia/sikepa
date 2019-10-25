import $axios from './../../api';
import $axiosFormData from './../../apiformdata';

const page = {
    namespaced: true,
    state : {
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
        },
    },
    mutations: {
        notification(state, payload)
        {
            state.message = payload.data.messages;
            state.statusCode = payload.data.status;
            state.showNotification = true;
        },
        updateName(state, payload) {
            state.forms.name = payload;
        },
        updateId(state, payload) {
            state.forms.id = payload;
        },
        updateData(state, payload)
        {
            state.data = payload.data.data;
        },
        updateDataRelation(state, payload)
        {
            state.data = payload.data.categories;
        },
        updateDataForm(state, payload)
        {
            state.forms = payload.data.data;
        },
        clearPage(state)
        {
            state.statusCode = null;
            state.showNotification = null;
        },
    },
    actions: {
        indexSection({ commit }) {
            $axios.get('/admin/section/page')
            .then(response => {
                commit('updateData', response);
                commit('clearPage');
            })
        },
        storeSection({ commit }, data) {
            $axios.post('/admin/section/page', data)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            });
        },
        destroySection({ commit }, id) {
            $axios.delete('/admin/section/page/'+id)
            .then(response => {
                commit('notification', response);
                commit('updateData', response)
            })
            .catch(error => {
                commit('notification', error);
            })
        },
        editSection({ commit }, id) {
            $axios.get(`/admin/section/page/${id}/edit`)
            .then(response => {
                commit('clearPage');
                commit('updateDataForm', response);
            })
        },
        updateSection({ commit, state }) {
            $axios.put(`/admin/section/page/${state.forms.id}`, state.forms)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
        },
        listSectionCategory({ commit }, id) {
            $axios.get(`/admin/list/section/category/page/${id}`)
            .then(response => {
                commit('clearPage');
                commit('updateDataRelation', response.data);
            })
        },
        storeCategory({ commit }, form) {
            $axios.post('/admin/category/page', form)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            });
        },
        destroyCategory({ commit }, id) {
            $axios.delete('/admin/category/page/'+id)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            })
        },
        listCategoryPage({ commit }, id) {
            $axios.get(`/admin/list/category/page/${id}`)
            .then(response => {
                commit('clearPage');
                commit('updateData', response);
            });
        },
        storePage({ commit }, forms) {
            $axiosFormData.post('/admin/page', forms)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            });
        },
        destroyPage({ commit }, id) {
            $axios.delete(`/admin/page/${id}`)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            });
        },
        updatePage({ commit }, forms) {
            $axios.put(`/admin/page/${forms.id}`, forms)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            });
        },
        changePublishStatus({ commit }, id) {
            $axios.get(`/admin/change/page/publish/${id}`)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            })
        },
        changeApprovedStatus({ commit }, id) {
            $axios.get(`/admin/change/page/approve/${id}`)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            });
        },
        clearPage({commit})
        {
            commit('clearPage');
        }
    }
}

export default page;
