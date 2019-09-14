<template>
  <header class="header">
    <div class="container">
      <div class="header__content">
        <a href="/" class="header__logo">
          <img alt="Vue logo" src="./../../assets/img/logo.png">
        </a>
        <div class="avatar">
          <span class="avatar-img" :style="{ backgroundImage: `url(${avatarImage})` }"></span>
          <i class="icomoon-arrow"></i>
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