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
    <Modal />
  </div>
</template>

<script>
  // @ is an alias to /src
  import Header from '@/components/Layout/Header.vue';
  import Nav from '@/components/Layout/Nav.vue';
  import Footer from '@/components/Layout/Footer.vue';
  import Modal from '@/components/Layout/Modal.vue';

  export default {
    components: {
      Header,
      Nav,
      Footer,
      Modal
    },
    methods: {
      getShopData() {
        this.axios.post('http://api.simulation.hackyeah.bluepaprica.ovh/simulate').then((response) => {
          this.$store.commit('changeModalActive');
          this.$store.commit('changeSimulateShopping', response.data.id);
          console.log(response.data);
        }).catch(error => {
          console.log(error);
        })
      }
    },
    updated() {
      this.$store.commit('changeModalOff');
    }
  }
</script>

<style lang="scss">
  @import './assets/scss/main';
</style>
