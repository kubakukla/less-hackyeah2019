<template>
  <section class="banner" :style="{ backgroundImage: `url(${bannerImage})` }">
    <div class="banner__content">
      <div class="container container--inside">
        <h1>You bought less<br> plastic than<br> a week ago!</h1>
      </div>
    </div>
  </section>
</template>

<script>
  import bannerImage from '@/assets/img/home/banner.jpg'

  export default {
    name: 'Banner',
    data() {
      return {
        bannerImage
      };
    }
  }
</script>

<style lang="scss">
  .banner {
    background-size: cover;
    min-height: 344px;
    padding: 52px 0;
  }
</style>