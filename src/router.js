import Vue from 'vue'
import Router from 'vue-router'
import hollowCard from './views/hollowCard.vue'
import mainCard from './views/mainCard.vue'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      component: hollowCard
    },
    {
      path: '/dima',
      component: mainCard
    }
  ],
  mode: 'history'
})
