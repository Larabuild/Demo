<template>
  <div v-bind:class="[columnsize, parent ? 'parent' : '']">
    <div class="inner" v-sortable="sortableOptions">
    <slot></slot>
    <panel v-for="n in createdPanels" title="Title"></panel>
    </div>
    <div class="add" @click="create_panel">+</div>
    <hidden name="column[]">
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
  data(){
    return {
      createdPanels: 0,
      sortableOptions:{
        handle:".panel-heading",
        group:this.parent ? "template-grid" : ""
      }
    }
  },
  methods: {
    create_panel: function(){
      this.createdPanels ++;
    }
  }
}
</script>
