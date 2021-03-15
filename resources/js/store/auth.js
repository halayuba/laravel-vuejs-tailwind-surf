import axios from 'axios'
import baseUrl from '../baseUrl'

export default {
  namespaced: true,
  state: {
    auth: false,
    user: null,
    users: null
  },
  getters: {
    auth(state){
      return state.auth
    },
    user(state){
      return state.user
    },
    users(state){
      return state.users
    }
  },
  mutations: {
    SET_AUTH(state, value){
      state.auth = value
    },
    SET_USER(state, value){
      state.user = value
    },
    SET_USERS(state, value){
      state.users = value
    }
  },
  actions: {
    async userAuth( {commit} ) {
      try {
        let response = await axios.get(baseUrl.authApiUrl)
        commit('SET_AUTH', true)
        commit('SET_USER', response.data.data)
      } catch (error) {
        commit('SET_AUTH', false)
        commit('SET_USER', null)
      }
    },
    /* == ALL USERS == */
    async getUsers({ commit }) {
        try {
            let response = await axios.get(
                `${baseUrl.usersApiUrl}`
            );
            commit("SET_USERS", response.data.data);
            return Promise.resolve(response.data.data);
        } catch (error) {
            return Promise.reject(error);
        }
    },
  }
}
