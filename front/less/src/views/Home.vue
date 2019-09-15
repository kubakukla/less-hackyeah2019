<template>
  <main class="home">
    <Banner image="@/assets/img/home/banner.jpg">
      <h1>You bought less<br> plastic than<br> a week ago!</h1>
      <router-link to="/" class="btn-link">See statistics <i class="icomoon-left-arrow"></i></router-link>
    </Banner>
    <LastChoices />
  </main>
</template>

<script>
  // @ is an alias to /src
  import Banner from '@/components/Banner.vue';
  import LastChoices from '@/components/LastChoices/LastChoices.vue';

export default {
  name: 'home',
  components: {
    Banner,
    LastChoices
  }
}
</script>
