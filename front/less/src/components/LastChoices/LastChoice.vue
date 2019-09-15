<template>
  <router-link to="/details" tag="article" class="last-buy">
    <div class="last-buy__header">
      <img alt="Vue logo" src="./../../assets/img/logos/spar.png"><em>|</em> Number of items: {{count}}
      <span class="date">{{date}}</span>
    </div>
    <div class="sort-list">
      <span class="plastic" v-if="garbage.plastic">Plastic</span>
      <span class="paper" v-if="garbage.paper">Paper</span>
      <span class="general" v-if="garbage.general">General</span>
      <span class="bio" v-if="garbage.bio">Bio</span>
      <span class="glass" v-if="garbage.glass">Glass</span>
    </div>
  </router-link>
</template>

<script>


  export default {
    name: 'LastChoice',
    props: ['count', 'garbage', 'date', 'order_id']
  }
</script>