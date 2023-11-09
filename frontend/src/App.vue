<script setup>
const scrollToTop = () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
};
</script>

<template>
  <router-view></router-view>
  <button v-scroll-directive="200" @click="scrollToTop" class="btn-scroll-top">
    <font-awesome-icon icon="fa-solid fa-arrow-up" />
  </button>
</template>

<style scoped>
@import url(../src/css/style.css);
.btn-scroll-top {
  position: fixed;
  bottom: 30px;
  right: 30px;
  font-size: 20px;
  color: #000;
  padding: 10px;
  cursor: pointer;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}

.btn-scroll-top:hover {
    background: #FFF;
    color: #004999;
}
</style>