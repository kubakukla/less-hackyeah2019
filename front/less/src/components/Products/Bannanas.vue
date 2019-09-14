<template>
  <router-link to="/details" tag="article" class="last-buy">
    <div class="last-buy__header">
      <img alt="Vue logo" src="./../../assets/img/logos/spar.png"><em>|</em> 9 items
      <span class="date">one day ago</span>
    </div>
    <div class="sort-list">
      <span class="plastic">Plastic</span>
      <span class="paper">Paper</span>
      <span class="general">General</span>
      <span class="bio">Bio</span>
    </div>
  </router-link>
</template>

<script>


  export default {
    name: 'LastChoice'
  }
</script>