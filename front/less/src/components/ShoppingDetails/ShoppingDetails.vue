<template>
  <div class="panel">
    <div class="container">
      <h2>You bought {{products_count}} items</h2>
      <Product v-for="product in products"
               :product_name="product.name"
               :totals="product.totals_trash"
               :tip="product.tip"
               :key="product.name"
      />
    </div>
  </div>
</template>

<script>
  // @ is an alias to /src
  import Product from '@/components/Products/Product.vue';

  export default {
    name: 'ShoppingDetails',
    components: {
      Product
    },
    data() {
      return {
        products: [],
        products_count: null
      }
    },
    mounted () {
      this.axios.get('http://api.hackyeah.bluepaprica.ovh/order/get/' + this.$route.params.id).then((response) => {
        console.log(response.data.items)
        this.products = response.data.items;
        this.products_count = Object.keys(this.products).length;
      }).catch(error => {
        console.log(error);
      })
    },
  }
</script>