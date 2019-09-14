<template>
  <div id="app">
    <Header />
    <Nav />
    <router-view />
    <Footer />
    <button class="btn-generate" @click="getShopData">
      Simulate Shopping
      <i class="icomoon-shopping-cart"></i>
    </button>
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
    },
    methods: {
      getShopData() {
        this.axios.get('http://api.simulation.hackyeah.bluepaprica.ovh/simulate').then((response) => {
          console.log(response.data);
        }).catch(error => {
          console.log(error);
        })
      }
    }
  }
</script>

<style lang="scss">
  @import './assets/scss/main';
</style>
