<template>
  <div v-bind:class="[columnsize, parent ? 'parent' : '']">
    <div class="inner" v-sortable="{group:'grid_panels', handle:'.panel-heading', onAdd:onAdd, onUpdate:onUpdate}">
      <slot></slot>
      <panel v-for="n in createdPanels" title="Untitled"></panel>
    </div>
    <div class="add" @click="create_panel">+</div>
  </div>
</template>

<script>
export default {
  props:["size", "parent", "row", "position"],
  computed:{
    columnsize: function(){
      return "col-md-" + this.size
    },
    coords: function(){
      return this.row + "," + this.position;
    }
  },
  data(){
    return {
      createdPanels: 0,
    }
  },
  methods: {
    onAdd: function(ev){
      var oldRow = $(ev.from).closest(".row").index();
      var oldColumn = $(ev.from).closest("[class^='col-']").index()
      var oldpos = [oldRow, oldColumn, ev.oldIndex];
      var newpos = (this.coords + "," + ev.newIndex).split(',').map(Number);
      this.update_panel_position(oldpos, newpos)
    },
    onUpdate: function(ev){
      var oldpos = (this.coords + "," + ev.oldIndex).split(",").map(Number);
      var newpos = (this.coords + "," + ev.newIndex).split(",").map(Number);
      this.update_panel_position(oldpos, newpos)
    },
    create_panel: function(){
      this.createdPanels ++;
      var newpos = this.coords + "," + $(this.$el).find(".panel").length;
      var tasks = {resolve:[
        ['create_panel', {position:(newpos).split(",").map(Number)}]
      ]}
      this.$root.$emit('grid.save', tasks, this);
    },
    update_panel_position:function(oldpos, newpos){
      var tasks = {resolve:[
        ['move_panel', {from: oldpos, to:newpos}]
      ]}
      this.$root.$emit('grid.save', tasks, this);
    }
  }
}
</script>
