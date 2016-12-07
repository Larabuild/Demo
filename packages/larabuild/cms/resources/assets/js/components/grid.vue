<template>
    <div class="gridcontainer">
      <slot></slot>
    </div>
</template>

<script>
    export default {
        mounted() {
          this.$root.$on('grid.save', this.save);
        },
        props:["layout"],
        methods: {
          save: function(data){
            data.layout_id = parseInt(this.layout);
            this.$http.post('/admin/layout/autosave', data).then((response) => {
              console.log(response);
            }, (response) => {
              alert("autosave layout failed!");
            })
          }
        }
    }
</script>
