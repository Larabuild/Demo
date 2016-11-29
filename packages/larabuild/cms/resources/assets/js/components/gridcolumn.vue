<template>
  <div v-bind:class="[columnsize, parent ? 'parent' : '']"  v-sortable="sortableOptions">
    <slot></slot>
  </div>
</template>

<script>
export default {
  props:["size", "parent"],
  computed:{
    columnsize: function(){
      return "col-md-" + this.size
    }
  },
  data(){ return {
    sortableOptions:{
      handle:".panel-heading",
      group:this.parent ? "template-grid" : "",
    }
    }
  },
  mounted() {
    //var sortable = Sortable.create(document.getElementById('items'), {})
  }
}
</script>
