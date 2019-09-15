<template>
  <div class="panel">
    <div class="container">
      <div class="container container--inside">
        <h2>Latest choices</h2>
      </div>
      <LastChoice v-for="lastChoice in lastChoices.data"
                  v-bind:count="lastChoice.item_count"
                  v-bind:garbage="lastChoice.totals"
                  v-bind:date="lastChoice.created_at | formatDate"
                  v-bind:order_id="lastChoice.id"
      />
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
    },
    data: function () {
      return {
        lastChoices: []
      }
    },
    mounted () {
      this.axios.get('http://api.hackyeah.bluepaprica.ovh/user/1/orders').then((response) => {
        this.lastChoices = response;
      }).catch(error => {
        console.log(error);
      })
    },
    filters: {
      formatDate: function (value) {
        if (!value) {return ''}
        let data = new Date(value * 1000);
        let day = data.getUTCDay();
        day = day < 10 ? '0' + day : day;
        let month = data.getMonth();
        month = month < 10 ? '0' + month : month;
        let year = data.getFullYear();
        return day + "/" + month + "/" + year;
      }
    },
  }
</script>