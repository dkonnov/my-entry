import Vue from "vue";
import Vuelidate from "vuelidate";
import App from "./App.vue";
import VueRouter from "vue-router";
import router from "./router";
import store from "./store";
import "./css/material-kit.min.css";
import "./css/animate.min.css";
import VueFacebookPixel from "vue-analytics-facebook-pixel";
Vue.use(VueFacebookPixel);

Vue.use(VueRouter);
Vue.use(Vuelidate);

Vue.config.productionTip = false;

export const eventEmitter = new Vue();

/**
 * Init facebook tracking pixel
 * @param  {String} appId
 * @param  {object} [data={}]
 */
Vue.analytics.fbq.init("2394012147354021");

new Vue({
  router,
  store,
  render: h => h(App),
  created() {
    // получим первоначальные сведения о пользователе, вошедшем в систему
    this.$store.dispatch("getCurrentUser");
    this.$store.dispatch("getBackgrounds");
  }
}).$mount("#app");
