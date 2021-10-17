<template>
  <div>
    Hello
    {{ count }}
    <button @click="count++">+</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      count: 0,
    };
  },
};
</script>

<style>
</style>