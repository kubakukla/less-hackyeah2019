<template>
  <div id="app">
    <Nav />
    <router-view/>
  </div>
</template>

<script>
  // @ is an alias to /src
  import Nav from '@/components/Layout/Nav.vue'

  export default {
    components: {
      Nav
    }
  }
</script>

<style lang="scss">
  @import './assets/scss/main';
</style>
