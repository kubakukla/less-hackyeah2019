<template>
  <footer class="footer">
    <div class="container container--inside">
      <div class="footer__content">
        <router-link to="/" class="btn-footer">
          <i class="icomoon-home"></i>
          <span>Home</span>
        </router-link>
        <router-link to="/about" class="btn-footer">
          <i class="icomoon-user"></i>
          <span>Profile</span>
        </router-link>
        <router-link to="/about" class="btn-footer">
          <i class="icomoon-chart"></i>
          <span>Statistics</span>
        </router-link>
        <router-link to="/about" class="btn-footer">
          <i class="icomoon-book"></i>
          <span>Blog</span>
        </router-link>
      </div>
    </div>
  </footer>
</template>

<script>
  export default {
    name: 'Footer'
  }
</script>

<style>

</style>