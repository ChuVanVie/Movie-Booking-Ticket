<script setup>

</script>
<template lang="">
    <div id="header">
        <a href="">
            <img src="../assets/img/teeiv-cinema-logo.png" alt="Logo" width="200" height="60" style="cursor: pointer">
        </a>
        <div class="home-search">
            <font-awesome-icon icon="fa-solid fa-magnifying-glass" />
            <input type="text" placeholder="Search">
        </div>
        <div class="flex gap-24">
            <p>Phim</p>
            <p>Rạp</p>
            <p>Thể Loại</p>
            <p>Quốc Gia</p>
            <p>Đặt vé</p>
        </div>
        <div class="home-user">
            <font-awesome-icon icon="fa-solid fa-user" />
            <p>Đăng nhập</p>
        </div>
        
    </div>
</template>

<style scoped>
    #header {
        height: 80px;
        background-color: antiquewhite;
        padding: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 64px;
        box-shadow: 0px 1px 2px 0px #bbb;
        position: sticky;
        top: 0;
        z-index: 2;
        /* backdrop-filter: blur(10px); */
    }
</style>