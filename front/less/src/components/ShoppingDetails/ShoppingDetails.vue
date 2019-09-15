<template>
  <div class="panel">
    <div class="container">
      <div class="container container--inside">
        <h2>You bought 5 items</h2>
      </div>
      <Notebook />
    </div>
  </div>
</template>

<script>
  // @ is an alias to /src
  import Notebook from '@/components/Products/Notebook.vue';

  export default {
    name: 'LastChoices',
    components: {
      Notebook
    }
  }
</script>