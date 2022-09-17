<template>
  <div class="text-danger text-small">
    {{ props.message }}
  </div>
</template>

<script setup lang="ts">
  const props = defineProps({
    message:  String
  })
</script>
