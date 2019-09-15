<template>
  <div class="panel">
    <div class="container">
      <h2>Latest choices</h2>
      <LastChoice v-for="lastChoice in lastChoices.data"
                  :count="lastChoice.item_count"
                  :garbage="lastChoice.totals"
                  :date="lastChoice.created_at | formatDate"
                  :order_id="lastChoice.id"
                  :store_id="lastChoice.store_id"
                  :key="lastChoice.id"
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
        return new Date(value * 1000).toLocaleDateString(
                'en-GB', {
                  day: "2-digit",
                  month: "2-digit",
                  year: "numeric",
                }
        );
      }
    },
  }
</script>