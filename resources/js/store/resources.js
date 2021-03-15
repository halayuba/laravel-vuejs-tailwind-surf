import axios from "axios";
import baseUrl from "../baseUrl";
import moment from "moment";

export default {
    namespaced: true,
/*=====================================
  ||||| STATE |||||
  =====================================*/
    state: {
        resources: null,
        sources: null,
        types: null,
        statuses: null,
        priorities: null
    },
/*=====================================
  ||||| GETTERS |||||
  =====================================*/
    getters: {
        resources(state) {
            return state.resources;
        },
        sources(state) {
            return state.sources;
        },
        types(state) {
            return state.types;
        },
        statuses(state) {
            return state.statuses;
        },
        priorities(state) {
            return state.priorities;
        }
    },
/*=====================================
  ||||| MUTATIONS |||||
  =====================================*/
    mutations: {
        /* == SET VALUES == */
        SET_RESOURCES(state, value) {
            state.resources = value;
        },
        SET_SOURCES(state, value) {
            state.sources = value;
        },
        SET_TYPES(state, value) {
            state.types = value;
        },
        SET_STATUSES(state, value) {
            state.statuses = value;
        },
        SET_PRIORITIES(state, value) {
            state.priorities = value;
        },

        /* == STORE == */
        STORE_RESOURCE(state, value) {
            state.resources.push(value); //== ERROR ABOUT "STATUS". IF USING THIS FUNCTION THEN WILL NEED TO FIGURE OUT HOW TO AUTOMATICALLY ASSIGN A VALUE FOR STATUS.NAME
        },

        /* == UPDATE == */
        UPDATE_RESOURCE_COMPLETION(state, resourceId) {
            let resource = state.resources.find(
                resource => resource.id === resourceId
            );

            if (resource) {
                resource.percentage_completed =
                    resource.percentage_completed === 100 ? 50 : 100; //== TEMPORARY - COME BACK
                resource.completed_at = moment().format("MM-DD-YYYY");
                resource.status_id = 1; //== STATUS IS COMPLETED
                let resourceIndex = state.resources.findIndex(
                    resource => resource.id === resourceId
                );
                state.resources.splice(resourceIndex, 1); //== REMOVE FROM THE CURRENT DISPLAY
            }
        },
        UPDATE_RESOURCE(state, resource) {
            let resourceIndex = state.resources.findIndex(
                resource => resource.id === resource.id
            ); // finds index
            state.resources[resourceIndex] = resource;
        },

        /* == DELETE == */
        DELETE_RESOURCE(state, resourceId) {
            let resourceIndex = state.resources.findIndex(
                resource => resource.id === resourceId
            );
            state.resources.splice(resourceIndex, 1);
        }
    },
/*=====================================
  ||||| ACTIONS |||||
  =====================================*/
    actions: {
        /* == ALL STATUSES == */
        async getStatuses({ commit }) {
            try {
                let response = await axios.get(
                    `${baseUrl.resourcesApiUrl}/statuses`
                );
                commit("SET_STATUSES", response.data.data);
                return Promise.resolve(response.data.data);
            } catch (error) {
                return Promise.reject(error);
            }
        },
        /* == ALL TYPES == */
        async getTypes({ commit }) {
            try {
                let response = await axios.get(
                    `${baseUrl.resourcesApiUrl}/types`
                );
                commit("SET_TYPES", response.data.data);
                return Promise.resolve(response.data.data);
            } catch (error) {
                return Promise.reject(error);
            }
        },
        /* == ALL SOURCES == */
        async getSources({ commit }) {
            try {
                let response = await axios.get(
                    `${baseUrl.resourcesApiUrl}/sources`
                );
                commit("SET_SOURCES", response.data.data);
                return Promise.resolve(response.data.data);
            } catch (error) {
                return Promise.reject(error);
            }
        },
        /* == ALL PRIORITIES == */
        async getPriorities({ commit }) {
            try {
                let response = await axios.get(
                    `${baseUrl.resourcesApiUrl}/priorities`
                );
                commit("SET_PRIORITIES", response.data.data);
                return Promise.resolve(response.data.data);
            } catch (error) {
                return Promise.reject(error);
            }
        },
        /* == ALL RESOURCES == */
        async getResources({ commit }) {
            try {
                let response = await axios.get(baseUrl.resourcesApiUrl);
                commit("SET_RESOURCES", response.data.data);
                return Promise.resolve(response.data.data);
            } catch (error) {
                return Promise.reject(error);
            }
        },
        /* == STORE A NEW LEARNING RESOURCE == */
        async storeResource({ commit }, { payload }) {
            try {
                let response = await axios.post(
                    baseUrl.resourcesApiUrl,
                    payload
                );
                commit("STORE_RESOURCE", payload); //== BECAUSE OF USING location = response.data.redirect IN "AddResourceModal.vue"
                return Promise.resolve(response);
            } catch (error) {
                return Promise.reject(error);
            }
        },
        /* == UPDATE A RESOURCE TO COMPLETED == */
        async updateResourceCompletion({ commit }, resourceId) {
          try {
              let response = await axios.put(
                `${baseUrl.resourcesApiUrl}/${resourceId}/update-completed`
              );
              commit("UPDATE_RESOURCE_COMPLETION", resourceId);
              return Promise.resolve(response);
          } catch (error) {
              return Promise.reject(error);
          }
        },
        /* == UPDATE A RESOURCE == */
        async updateResource({ commit, dispatch }, { resourceId, payload }) {
          try {
              let response = await axios.put(
                  `${baseUrl.resourcesApiUrl}/${resourceId}`, payload
              );
              dispatch('getResources')
              // commit("UPDATE_RESOURCE", payload);
              return Promise.resolve(response);
          } catch (error) {
              return Promise.reject(error);
          }
        },
        /* == REMOVE A RESOURCE == */
        async removeResource({ commit }, resourceId) {
            try {
                let response = await axios.delete(
                    `${baseUrl.resourcesApiUrl}/${resourceId}`
                );
                commit("DELETE_RESOURCE", resourceId);
                return Promise.resolve(response);
            } catch (error) {
                return Promise.reject(error);
            }
        }
    }
};
