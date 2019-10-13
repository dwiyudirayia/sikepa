import Axios from 'axios';

const $axiosFormData = Axios.create({
    baseURL: '/api',
    headers: {
        'Authorization': localStorage.getItem('token') != 'null' ? 'Bearer ' + localStorage.getItem('token') :'',
        'Content-Type': 'multipart/form-data'
    }
});

export default $axiosFormData;
