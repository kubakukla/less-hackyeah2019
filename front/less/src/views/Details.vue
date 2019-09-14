<template>
  <main class="details">
    <Banner image="@/assets/img/home/banner.jpg">
      <span class="date">12/09/2019</span>
      <img alt="Vue logo" src="./../assets/img/logos/spar.png">
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
    }
  }
</script>
