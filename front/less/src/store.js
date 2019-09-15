import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    navActive: false,
    modalActive: false,
    simulateShopping: null,
  },
  mutations: {
    changeNavActive(state) {
      state.navActive = !state.navActive
    },
    changeModalActive(state) {
      state.modalActive = !state.modalActive
    },
    changeModalOff(state) {
      state.modalActive = false
    },
    changeSimulateShopping(state, number) {
      state.simulateShopping = number
    }
  },
  getters: {
    getNavActive: state => state.navActive,
    getModalActive: state => state.modalActive,
    getSimulateShopping: state => state.simulateShopping
  },
  actions: {

  }
})
