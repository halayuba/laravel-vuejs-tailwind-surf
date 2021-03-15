import axios from 'axios'

export default {
  namespaced: true,
  state: {
      filterPriority: '',
      filterStatus: '',
      filterSource: '',
      filterType: '',
      filterAssignee: '',
      filterCreator: '',
      filterProject: '',
      resetFilters: false
  },
  getters: {
    filterPriority(state){
      return state.filterPriority
    },
    filterStatus(state){
      return state.filterStatus
    },
    filterSource(state){
      return state.filterSource
    },
    filterType(state){
      return state.filterType
    },
    filterProject(state){
      return state.filterProject
    },
    filterAssignee(state){
      return state.filterAssignee
    },
    filterCreator(state){
      return state.filterCreator
    },
    resetFilters(state){
      return state.resetFilters
    }
  },
  mutations: {
    SET_PRIORITY(state, value){
      state.filterPriority = Number(value)
    },
    SET_STATUS(state, value){
      state.filterStatus = Number(value)
    },
    SET_SOURCES(state, value){
      state.filterSource = Number(value)
    },
    SET_TYPE(state, value){
      state.filterType = Number(value)
    },
    SET_PROJECT(state, value){
      state.filterProject = Number(value)
    },
    SET_ASSIGNEE(state, value){
      state.filterAssignee = Number(value)
    },
    SET_CREATOR(state, value){
      state.filterCreator = Number(value)
    },
    RESET_FILTERS(state, value){
      state.filterPriority = ''
      state.filterStatus = ''
      state.filterSource = ''
      state.filterType = ''
      state.filterProject = ''
      state.filterAssignee = ''
      state.filterCreator = ''
      state.resetFilters = true
    },
  },
  actions: {
    updateFilterPriority( {commit}, value ) {
      commit('SET_PRIORITY', value)
    },
    updateFilterStatus( {commit}, value ) {
      commit('SET_STATUS', value)
    },
    updateFilterSource( {commit}, value ) {
      commit('SET_SOURCES', value)
    },
    updateFilterType( {commit}, value ) {
      commit('SET_TYPE', value)
    },
    updatefilterProject( {commit}, value ) {
      commit('SET_PROJECT', value)
    },
    updatefilterAssignee( {commit}, value ) {
      commit('SET_ASSIGNEE', value)
    },
    updatefilterCreator( {commit}, value ) {
      commit('SET_CREATOR', value)
    },
    resetAllFilters( {commit} ){
      commit('RESET_FILTERS')
    }
  }
}
