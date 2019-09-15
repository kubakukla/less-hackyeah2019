<template>
  <router-link :to="{ name: 'details', params: {id: order_id } }" tag="article" class="last-buy">
    <div class="last-buy__header">
      <template v-if="store_id == 1">
        <img alt="Vue logo" src="./../../assets/img/logos/spar.png"><em>|</em> {{count}} items
      </template>
      <template v-if="store_id == 2">
        <img alt="Vue logo" src="./../../assets/img/logos/leclerc.png"><em>|</em> {{count}} items
      </template>
      <template v-if="store_id == 3">
        <img alt="Vue logo" src="./../../assets/img/logos/spolem.png"><em>|</em> {{count}} items
      </template>
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
    props: ['count', 'garbage', 'date', 'order_id', 'store_id']
  }
</script>