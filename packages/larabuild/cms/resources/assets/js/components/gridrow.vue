<template>
    <div id="id-1" class="row list-group">
      <slot></slot>
    </div>
</template>

<script>
    export default {
    
        mounted() {
            console.log('Component ready.')
        }
    }
</script>
