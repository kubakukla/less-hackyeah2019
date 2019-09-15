<template>
  <article class="product">
    <div class="product__header">
      <h4>{{product_name}}</h4>
      <span class="icomoon-bag" v-if="product_name == 'Bag'"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span></span>
      <span class="icomoon-eggs" v-if="product_name == 'Eggs'"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
      <span class="icomoon-plant" v-if="product_name == 'Plant'"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span></span>
      <span class="icomoon-water" v-if="product_name == 'Water'"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
      <span class="icomoon-wine" v-if="product_name == 'Wine'"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span></span>
      <span class="icomoon-banana" v-if="product_name == 'Banana'"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span></span>
      <span class="icomoon-beauty" v-if="product_name == 'Beauty'"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span><span class="path17"></span><span class="path18"></span></span>
      <span class="icomoon-jam" v-if="product_name == 'Jam'"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span></span>
      <span class="icomoon-orange-juice" v-if="product_name == 'Orange juice'"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span></span>
      <span class="icomoon-notebook" v-if="product_name == 'Notebook'"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></span>
    </div>
    <div class="product__message">
      {{tip}} </div>
    <div class="product__info">
      <div class="product__info__item">
        <span class="icomoon-recycling-bin" v-if="getBin(this.totals) == 'BIO'"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span>
        <span class="icomoon-recycling-bin2" v-if="getBin(this.totals) == 'PAPER'"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span>
        <span class="icomoon-recycling-bin3" v-if="getBin(this.totals) == 'GENERAL'"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span>
        <span class="icomoon-recycling-bin4" v-if="getBin(this.totals) == 'PLASTIC'"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span>
        <span class="icomoon-recycling-bin5" v-if="getBin(this.totals) == 'GLASS'"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span>
        Recycle into : <strong>{{getBin(this.totals)}} bin</strong>
      </div>
      <div class="product__info__item">
        <span class="icomoon-triangle"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
        Remember, it needs to be <strong>clean and dry!</strong>
      </div>
    </div>
  </article>
</template>

<script>


  export default {
    name: 'Product',
    props: ['product_name', 'totals', 'tip'],
    methods: {
      getBin(totals) {
        return Object.keys(totals)[0].toUpperCase();
      }
    }
  }
</script>