import axios from 'axios';
window.axios = axios;

axios.defaults.baseURL = 'http://localhost:80/api/v1';
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
