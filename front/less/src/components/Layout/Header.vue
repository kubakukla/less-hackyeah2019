<template>
  <header class="header">
    <div class="container">
      <div class="header__content">
        <a href="/" class="header__logo">
          <img alt="Vue logo" src="./../../assets/img/logo.png">
        </a>
        <div class="header__actions">
          <div class="avatar">
            <figure class="avatar__img" :style="{ backgroundImage: `url(${avatarImage})` }"></figure>
            <i class="icomoon-arrow"></i>
          </div>
          <div class="hamburger">
            <i class="icomoon-menu"></i>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
  import avatarImage from '@/assets/img/layout/avatar.jpg'
  export default {
    name: 'Header',
    data() {
      return {
        avatarImage
      };
    }
  }
</script>

<style>

</style>