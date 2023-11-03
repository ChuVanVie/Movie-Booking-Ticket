<script setup>
    import {  reactive  } from 'vue'

    const items = reactive([
        {
          image: "../assets/img/p1.jpg",
          caption: "Slide 1",
        },
        {
          image: "../assets/img/p2.jpeg",
          caption: "Slide 2",
        },
        {
          image: "../assets/img/p3.jpeg",
          caption: "Slide 3",
        },
        {
          image: "../assets/img/p4.jpg",
          caption: "Slide 4",
        },
    ]);

</script>
<template>
    <div id="homepage">
        Đây là homepageee!
        <div v-for="(item, index) in items" :key="index">
        <div class="caption">{{ item.caption }}</div>
    </div>
    </div>
</template>

<style scoped>
    #homepage {
        height: 1800px;
    }

    .slide {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 300px;
        border: 1px solid #ccc;
    }

    .caption {
        text-align: center;
        padding: 10px;
    }
</style>