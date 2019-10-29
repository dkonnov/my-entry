import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);
import { http } from "./../http";

export default new Vuex.Store({
  state: {
    currentUserName: ""
  },
  mutations: {
    setLogined(state) {
      state.logined = "true";
    },
    setCurrentUserName(state, payload) {
      state.currentUserName = payload;
    }
  },
  actions: {
    getCurrentUserName(context) {
      alert(123);
      http.get("getUserName").then(response => {
        if (response.data) {
          context.commit("setCurrentUserName", response.data);
        }
      });
    }
  }
});
