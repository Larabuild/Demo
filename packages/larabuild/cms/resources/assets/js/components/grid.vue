<template>
    <div class="gridcontainer container">
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
