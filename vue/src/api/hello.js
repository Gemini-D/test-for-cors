import axios from "axios";

export default {
    hello() {
        return axios.get('http://127.0.0.1:9501/');
    },
    hello404() {
        return axios.get('http://127.0.0.1:9501/404');
    },
    hi200() {
        return axios.get('/api/');
    },
    hi404() {
        return axios.get('/api/404');
    }
}
