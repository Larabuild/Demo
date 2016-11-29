<template>
  <div v-bind:class="columnsize"  v-sortable="sortableOptions">
    <slot></slot>
  </div>
</template>

<script>
export default {
  props:["size"],
  computed:{
    columnsize: function(){
      return "col-md-" + this.size
    }
  },
  data(){ return {
    sortableOptions:{
      handle:".panel-heading",
      group:"template-grid"
    }
    }
  },
  mounted() {
    //var sortable = Sortable.create(document.getElementById('items'), {})
  }
}
</script>
