<template>
  <section class="banner">
    <div class="banner__content">
      <div class="container container--inside">
        <slot></slot>
      </div>
    </div>
  </section>
</template>

<script>

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
  .home {
    .banner {
      background-image: url('./../assets/img/home/banner.jpg');
    }
  }
  .details {
    .banner {
      background-image: url('./../assets/img/details/banner.jpg');
    }
  }
  .banner {
    background-size: cover;
    min-height: 344px;
    padding: 52px 0;
    .date {
      display: block;
      font-size: 10px;
      line-height: 12px;
      color: #A8A8A8;
      margin: 26px 0;
    }
    img{
      margin-bottom: -4px;
    }
  }
</style>