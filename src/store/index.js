import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);
import { http } from "./../http";

export default new Vuex.Store({
  state: {
    currentUser: {}
  },
  mutations: {
    setCurrentUser(state, payload) {
      state.currentUser = payload;
    }
  },
  actions: {
    getCurrentUser(context) {
      http.get("getCurrentUser").then(response => {
        if (response.data) {
          context.commit("setCurrentUser", response.data);
        }
      });
    }
  }
});
