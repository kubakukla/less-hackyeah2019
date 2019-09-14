<template>
  <div class="panel">
    <div class="container">
      <div class="container container--inside">
        <h2>You bought 5 items</h2>
      </div>
      <Bannanas />
    </div>
  </div>
</template>

<script>
  // @ is an alias to /src
  import Bannanas from '@/components/Products/Bannanas.vue';

  export default {
    name: 'LastChoices',
    components: {
      Bannanas
    }
  }
</script>