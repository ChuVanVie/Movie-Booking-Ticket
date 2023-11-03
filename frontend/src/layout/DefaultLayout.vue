<script setup>
import TheHeader from '../components/TheHeader.vue'
import TheFooter from '../components/TheFooter.vue'

</script>

<template>
  <the-header/>
  <div id="main">
    <router-view></router-view>
  </div>
  <the-footer/>
</template>

<style scoped> 
  #main {
    position: relative;
  }
</style>