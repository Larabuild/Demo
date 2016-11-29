<template>
    <div class="gridcontainer">
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
