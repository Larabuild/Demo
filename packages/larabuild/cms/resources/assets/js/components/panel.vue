<template>
  <div class="panel panel-default list-group-item">
    <div class="panel-heading">{{coords}} - {{title}} <small class="btn" style="float:right;" @click="removePanel" >remove</small></div>
    <div class="panel-body">
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  props: ['title', 'position'],
  mounted() {
    this.rendered = 1;
  },
  computed:{
    coords: function(){
      console.log(this.position);
      //var pos = this.position.split(',');
      return this.position //pos[0] + "," + pos[1] + "," + this.index;
    }
  },
  methods:{
    removePanel:function(){
      var tasks = {
        resolve:[
          ['remove_panel', { position:this.coords.split(',') }]
        ]
      }
      this.$root.$emit('grid.save', tasks, this);
      $(this.$el).remove()
      console.log(this);
    }
  }
}
</script>
