import Axios from "axios";
import router from '../../routes';

const auth = {
    namespaced: true,
    actions: {
        login({ commit }, payload) {
            localStorage.setItem('token', null) //RESET LOCAL STORAGE MENJADI NULL
            commit('setAuth', null, { root: true });
            Axios.post('/login', payload)
            .then(response => {
                localStorage.setItem('token', response.data.data);
                commit('setAuth', response.data.data, { root: true });
                router.push({name: 'SectionIndex'})
            })
            .catch(error => {
                if (error.response.status == 422) {
                    commit('setError', error.response.data.errors, { root: true });
                }
            })
        }
    }
}

export default auth;
