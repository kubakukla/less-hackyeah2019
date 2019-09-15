<template>
  <div :class="{active: isModalActive, modal: true}">
    <div class="container">
      <div class="modal__content">
        <button class="close" @click="modalClose"></button>
        <img alt="Vue logo" src="./../../assets/img/logo.png">
        <h1>Hey Sarah, you just bought 9 items…</h1>
        <p>If you would like to know how to recycle this items click button below. Let’s sort together!</p>
        <router-link :to="{ name: 'details', params: {id: detailsId } }" class="btn" @click="">How to recycle?</router-link>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'Modal',
    methods: {
      modalClose() {
        this.$store.commit('changeModalActive')
      }
    },
    computed: {
      isModalActive() {
        return this.$store.getters.getModalActive;
      },
      detailsId() {
        return this.$store.getters.getSimulateShopping;
      }
    }
  }
</script>

<style lang="scss">
  .modal {
    &__content {
      background-image: url('./../../assets/img/modal/background.png');
    }
  }
</style>