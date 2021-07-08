import Vue from 'vue'
import Vuex from 'vuex'
import snack from './snack'
import auth from './auth'
import resources from './resources'
import filters from './filters'
import books from './books'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
  },
  getters: {
  },
  mutations: {
  },
  actions: {
  },
  modules: {
    snack,
    auth,
    resources,
    filters,
    books,

  }
})
