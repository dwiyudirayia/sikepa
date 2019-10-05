import Axios from "axios";

const page = {
    namespaced: true,
    state : {
        data: [],
        forms: [],
        message: null,
        statusCode: null,
        showNotification: null,
        showNotificationLoginSuccess: null
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
        getShowNotificationLoginSuccess(state) {
            return state.showNotificationLoginSuccess
        },
        getData(state) {
            return state.data;
        },
        getRelationForm(state)
        {
            return state.relationForm;
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
            Axios.get('/admin/section/page')
            .then(response => {
                commit('updateData', response);
                commit('clearPage');
            })
        },
        storeSection({ commit }, data) {
            Axios.post('/admin/section/page', data)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            });
        },
        destroySection({ commit }, id) {
            Axios.delete('/admin/section/page/'+id)
            .then(response => {
                commit('notification', response);
                commit('updateData', response)
            })
            .catch(error => {
                commit('notification', error);
            })
        },
        editSection({ commit }, id) {
            Axios.get(`/admin/section/page/${id}/edit`)
            .then(response => {
                commit('clearPage');
                commit('updateDataForm', response);
            })
        },
        updateSection({ commit, state }) {
            Axios.put(`/admin/section/page/${state.forms.id}`, state.forms)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
        },
        listSectionCategory({ commit }, id) {
            Axios.get(`/admin/list/section/category/page/${id}`)
            .then(response => {
                commit('clearPage');
                commit('updateDataRelation', response.data);
            })
        },
        storeCategory({ commit }, form) {
            Axios.post('/admin/category/page', form)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            });
        },
        destroyCategory({ commit }, id) {
            Axios.delete('/admin/category/page/'+id)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            })
        },
        listCategoryPage({ commit }, id) {
            Axios.get(`/admin/list/category/page/${id}`)
            .then(response => {
                commit('clearPage');
                commit('updateData', response);
            });
        },
        storePage({ commit }, forms) {
            Axios.post('/admin/page', forms)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            });
        },
        destroyPage({ commit }, id) {
            Axios.delete(`/admin/page/${id}`)
            .then(response => {
                commit('notification', response);
                commit('updateData', response);
            })
            .catch(error => {
                commit('notification', error);
            });
        },
        updatePage({ commit }, forms) {
            Axios.put(`/admin/page/${forms.id}`, forms)
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
