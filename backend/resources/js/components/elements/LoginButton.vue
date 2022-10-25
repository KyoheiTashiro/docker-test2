<template>
<!-- ★現在不使用 -->
  <div>
    <button type="submit" @click="setLoginState">login</button>
    <div>{{ $store.state.util.login }}</div>
  </div>
</template>

<script>
export default {
  methods: {
    setLoginState: function() {
      store.commit('statelogin');
      // store.commit('stateLogin', '1')
      // store.commit('stateLogin')
    },
  },
};


</script>
