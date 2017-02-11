<template>
  <div class="panel panel-default list-group-item">
    <div class="panel-heading">{{title}}</div>
    <div class="panel-body">
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  props: ['title'],
  mounted() {
    this.rendered = 1;
  },
  computed:{
    coords: function(){
      return this.row + "," + this.column + "," + this.index;
    }
  },
  methods:{
    removePanel:function(){ 
      var tasks = {
        resolve:[
          ['remove_panel', {position:(this.coords + "," + this.$children.length).split()}]
        ]
      }
      this.$root.$emit('grid.save', tasks, this);
    }
  }
}
</script>
