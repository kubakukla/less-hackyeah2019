<template>
  <main class="details">
    <Banner image="@/assets/img/home/banner.jpg">
      <span class="date">12/09/2019</span>
      <template v-if="store_id == 1">
        <img alt="Vue logo" src="./../assets/img/logos/spar.png">
      </template>
      <template v-if="store_id == 2">
        <img alt="Vue logo" src="./../assets/img/logos/leclerc.png">
      </template>
      <template v-if="store_id == 3">
        <img alt="Vue logo" src="./../assets/img/logos/spolem.png">
      </template>
      <h1>Shopping details</h1>
    </Banner>
    <ShoppingDetails />
  </main>
</template>

<script>
  // @ is an alias to /src
  import Banner from '@/components/Banner.vue';
  import ShoppingDetails from '@/components/ShoppingDetails/ShoppingDetails.vue';

  export default {
    name: 'detailsComponent',
    components: {
      Banner,
      ShoppingDetails
    },
    data() {
      return {
        store_id: null,
      }
    },
    mounted () {
      this.axios.get('http://api.hackyeah.bluepaprica.ovh/order/get/' + this.$route.params.id).then((response) => {
        console.log(response.data)
        this.store_id = response.data.store_id
      }).catch(error => {
        console.log(error);
      })
    },
  }
</script>
