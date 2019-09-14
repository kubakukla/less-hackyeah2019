<template>
  <main class="home">
    <Banner />
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
