<template>
  <div class="panel panel-default list-group-item">
    <div class="panel-heading">Panel: {{title}}</div>
    <div class="panel-body">
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  props: ['title'],
  mounted() {
    console.log(this)

  }
}
</script>
