import Vue from "vue";
import Vuex from "vuex";
import objectAssign from "object-assign";

Vue.use(Vuex);
import { http } from "./../http";
import { eventEmitter } from "./../main";

export default new Vuex.Store({
  state: {
    currentUser: {},
    currentPage: {}
  },
  mutations: {
    setCurrentUser(state, payload) {
      state.currentUser = payload;
    },
    updateStateUser(state, payload) {
      objectAssign(state.currentUser, payload);
    },
    logout(state) {
      state.currentUser = {};
    }
  },
  actions: {
    getCurrentUser(context) {
      http.get("getCurrentUser").then(response => {
        if (response.data) {
          context.commit("setCurrentUser", response.data);
        }
      });
    },
    updateCurrentUser({ commit }, payload) {
      commit("updateStateUser", payload);
      http.get("saveCurrentUser", {
        params: this.state.currentUser
      });
    },
    logoutUser({ commit }) {
      http.get("logout").then(() => {
        commit("logout");
        eventEmitter.$emit("showMessage", "Надеемся вы скоро вернетесь!");
        this.$router.push("/");
      });
    }
  }
});
