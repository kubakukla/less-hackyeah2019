<template>
  <div class="panel">
    <div class="container">
      Last choices
      <LastChoice />
      <LastChoice />
      <LastChoice />
    </div>
  </div>
</template>

<script>
  // @ is an alias to /src
  import LastChoice from '@/components/LastChoices/LastChoice.vue';

  export default {
    name: 'LastChoices',
    components: {
      LastChoice
    }
  }
</script>