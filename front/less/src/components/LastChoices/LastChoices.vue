<template>
  <div class="panel">
    <div class="container">
      <div class="container container--inside">
        <h2>Latest choices</h2>
      </div>
      <LastChoice />
      <LastChoice />
      <LastChoice />
      <LastChoice />
      <LastChoice />
      <LastChoice />
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