import Vue from 'vue'
import axios from 'axios'

const http = axios.create({
  baseURL: '/api',
})

Vue.prototype.$http = http

export default http
