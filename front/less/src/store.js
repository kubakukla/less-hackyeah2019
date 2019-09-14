import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    navActive: false
  },
  mutations: {
    changeNavActive(state) {
      state.navActive = !state.navActive
    },
  },
  getters: {
    getNavActive: state => state.navActive
  },
  actions: {

  }
})
