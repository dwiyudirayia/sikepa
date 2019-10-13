import Axios from 'axios';

const $axios = Axios.create({
    baseURL: '/api',
    headers: {
        'Authorization': localStorage.getItem('token') != 'null' ? 'Bearer ' + localStorage.getItem('token') :'',
        'Content-Type': 'application/json'
    }
});

export default $axios;
