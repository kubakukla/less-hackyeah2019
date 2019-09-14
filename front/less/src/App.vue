<template>
  <div id="app">
    <Header />
    <Nav />
    <router-view />
    <Footer />
  </div>
</template>

<script>
  // @ is an alias to /src
  import Header from '@/components/Layout/Header.vue';
  import Nav from '@/components/Layout/Nav.vue';
  import Footer from '@/components/Layout/Footer.vue';

  export default {
    components: {
      Header,
      Nav,
      Footer
    }
  }
</script>

<style lang="scss">
  @import './assets/scss/main';
</style>
