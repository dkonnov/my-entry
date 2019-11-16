import Vue from "vue";
import Vuex from "vuex";
import _ from "lodash";

Vue.use(Vuex);
import { http } from "./../http";
import { eventEmitter } from "./../main";

export default new Vuex.Store({
  state: {
    currentUser: {},
    currentPage: {},
    backgrounds: {}
  },
  getters: {
    thisCurrenBackground(state, value) {
      let rez;
      if (state.currentUser.background == value) {
        rez = true;
      } else {
        rez = false;
      }
      return rez;
    }
  },
  mutations: {
    setCurrentUser(state, payload) {
      state.currentUser = payload;
    },
    updateStateUser(state, payload) {
      _.assign(state.currentUser, payload);
    },
    logout(state) {
      state.currentUser = {};
    },
    setBackgrounds(state, payload) {
      state.backgrounds = payload;
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
    getBackgrounds(context) {
      http.get("getBackgrounds").then(response => {
        if (response.data) {
          context.commit("setBackgrounds", response.data);
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
