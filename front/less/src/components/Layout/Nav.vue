<template>
  <aside :class="{active: isNavActive, navigation: true}">
    <button class="close" @click="NavToggle"></button>
    <nav>
      <router-link to="/">
        <span>Home</span>
        <i class="icomoon-home"></i>
      </router-link>
      <router-link to="/">
        <span>My Profile</span>
        <i class="icomoon-user"></i>
      </router-link>
      <router-link to="/">
        <span>Statistics</span>
        <i class="icomoon-chart"></i>
      </router-link>
      <router-link to="/">
        <span>Blog</span>
        <i class="icomoon-book"></i>
      </router-link>
    </nav>
  </aside>
</template>

<script>
export default {
  name: 'Nav',
  methods: {
    NavToggle() {
      this.$store.commit('changeNavActive')
    }
  },
  computed: {
    isNavActive() {
      return this.$store.getters.getNavActive;
    }
  }
}
</script>

<style>

</style>
