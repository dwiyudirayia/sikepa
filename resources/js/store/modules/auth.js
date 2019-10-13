import $axios from './../../api';
import router from '../../routes';

const auth = {
    namespaced: true,
    actions: {
        login({ commit }, payload) {
            localStorage.setItem('token', null) //RESET LOCAL STORAGE MENJADI NULL
            commit('setAuth', null, { root: true }) //RESET STATE TOKEN MENJADI NULL
            //KARENA MUTATIONS SET_TOKEN BERADA PADA ROOT STORES, MAKA DITAMBAHKAN PARAMETER
            //{ root: true }

            //KITA MENGGUNAKAN PROMISE AGAR FUNGSI SELANJUTNYA BERJALAN KETIKA FUNGSI INI SELESAI
            return new Promise((resolve, reject) => {
                //MENGIRIM REQUEST KE SERVER DENGAN URI /login
                //DAN PAYLOAD ADALAH DATA YANG DIKIRIMKAN DARI COMPONENT LOGIN.VUE
                $axios.post('/login', payload)
                .then((response) => {
                    //KEMUDIAN JIKA RESPONNYA SUKSES
                    if (response.data.status == 'success') {
                        //MAKA LOCAL STORAGE DAN STATE TOKEN AKAN DISET MENGGUNAKAN
                        //API DARI SERVER RESPONSE
                        localStorage.setItem('token', response.data.data)
                        commit('setAuth', response.data.data, { root: true })
                    } else {
                        commit('setError', { invalid: 'Email/Password Salah' }, { root: true })
                    }
                    //JANGAN LUPA UNTUK MELAKUKAN RESOLVE AGAR DIANGGAP SELESAI
                    resolve(response.data)
                    router.push({name: 'SectionArticleIndex'})
                })
                .catch((error) => {
                    if (error.response.status == 422) {
                        commit('setError', error.response.data.errors, { root: true })
                    }
                })
            })
        },
    }
}

export default auth;
