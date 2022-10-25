const getters = {};

const state = {
  login: false,
};

const mutations = {
  stateLogin(state) {
    state.login = true;
  },
};

const actions = {};

export default {
  namespaced: true,
  getters,
  state,
  mutations,
  actions,
};
